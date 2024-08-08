<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Promotion;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Lấy dữ liệu từ request
        $productId = $request->input('id');
        $productName = $request->input('name');
        $productPrice = $request->input('price');
        $productPriceSale = $request->input('price_sale');
        $productImage = $request->input('image');
        $productQuantity = $request->input('quantity', 1); // Nếu không có số lượng thì mặc định là 1

        // Tạo một mảng sản phẩm
        $product = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPriceSale <= 0 ? $productPrice : $productPriceSale,
            'image' => $productImage,
            'quantity' => $productQuantity
        ];

        // Lấy giỏ hàng từ session, nếu chưa có thì tạo mảng rỗng
        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
        if (isset($cart[$productId])) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $cart[$productId]['quantity'] += $productQuantity;
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
            $cart[$productId] = $product;
        }

        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);

        return redirect()->route('cart.show');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        // Tính tổng tiền
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('client.cart.viewcart', compact('cart', 'total'));
    }

    public function removeCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('cart.show');
    }

    public function checkout()
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);
        $totalAmount = 0;

        // Tính tổng số tiền
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Tính tổng số tiền sau khi áp dụng mã giảm giá
        $total = $totalAmount;
        $discount = session('coupon')['discount'] ?? 0;
        $totalDiscount = $total - $discount;
        $finalTotal = $totalDiscount > 0 ? $totalDiscount : 0;

        return view('client.cart.checkout', compact('cart', 'totalAmount', 'discount', 'finalTotal'));
    }

    public function thankyou()
    {
        return view('client.cart.thankyou');
    }

    public function placeOrder(Request $request)
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);
        $totalAmount = 0;
        $discount = session('coupon')['discount'] ?? 0;

        // Tính tổng số tiền
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        $totalAmount -= $discount;

        // Tạo đơn hàng mới
        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'total' => $totalAmount > 0 ? $totalAmount : 0,
            'payment_method' => $request->input('payment_method'),
        ]);

        // Thêm sản phẩm vào đơn hàng
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'image' => $item['image'],
                'product_price' => $item['price'] * $item['quantity'],
                'quantity' => $item['quantity'],
            ]);
        }

        // Xóa giỏ hàng
        session()->forget('cart');
        //Xóa mã
        session()->forget('coupon');

        return redirect()->route('thankyou');
    }

    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');
        $promotion = Promotion::where('code', $couponCode)->where('is_active', 1)->first();

        if ($promotion) {
            // Kiểm tra ngày bắt đầu và kết thúc của mã giảm giá
            $currentDate = now();
            if ($currentDate < $promotion->start_date || $currentDate > $promotion->end_date) {
                return back()->with('message', 'Mã giảm giá đã hết hạn hoặc chưa bắt đầu.');
            }

            $discount = 0;
            $cart = session()->get('cart', []);
            $totalAmount = 0;

            // Tính tổng tiền giỏ hàng
            foreach ($cart as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }

            // Tính toán giảm giá
            if ($promotion->discount_percentage) {
                $discount = $totalAmount * ($promotion->discount_percentage / 100);
            } elseif ($promotion->discount_amount) {
                $discount = $promotion->discount_amount;
            }

            // Lưu mã giảm giá và số tiền giảm vào session
            session()->put('coupon', [
                'code' => $promotion->code,
                'discount' => $discount,
            ]);

            return back()->with('message', 'Áp dụng mã giảm giá thành công');
        }

        return back()->with('message', 'Mã giảm giá không hợp lệ');
    }
}
