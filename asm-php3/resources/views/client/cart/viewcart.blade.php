@extends('client.layouts.master')

@section('content')
<h1 class="text-center mt-3">Giỏ hàng của bạn</h1>

        @if (!empty($cart) && count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td><img src="{{ Storage::url($item['image']) }}" alt="" width="50"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ number_format($item['price'], 0, ",", ".") }} VND</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($item['price'] * $item['quantity'], 0, ",", ".") }} VND</td>
                        <td>
                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Bạn có muốn xóa không?')" type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right"><strong>Tổng:</strong></td>
                    <td colspan="2">{{ number_format($total, 0, ",", ".") }} VND</td>
                </tr>
            </tfoot>
        </table>
        <div class="d-flex justify-content-center mb-3">
            <a href="{{ route('index') }}" class="btn btn-primary mr-2">Tiếp tục mua</a>
            @auth
                <a href="{{ route('checkout') }}" class="btn btn-success mr-2">Đặt hàng</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-success mr-2">Đăng nhập để đặt hàng</a>
            @endauth
            <form action="{{ route('cart.clear') }}" method="POST" class="text-center">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Bạn có muốn xóa không?')" type="submit" class="btn btn-danger">Xóa giỏ hàng</button>
            </form>
        </div>
    @else
        <p class="mb-5 mt-5 text-danger text-center">Bạn chưa có sản phẩm nào trong giỏ hàng!</p>
    @endif
@endsection