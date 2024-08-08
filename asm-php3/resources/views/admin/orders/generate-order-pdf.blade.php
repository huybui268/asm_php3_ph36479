<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: Dejavu Sans; 
        }
        p{
        font-size: 1.25rem;
        }
    </style>
</head>
<body>
    <p>{{ $title }}</p>
    <p>Ngày: {{ $date }}</p>
    <p>Chi tiết đơn hàng</p>
    <ul class="list-unstyled">
        <li class="mb-2">ID: {{$order->id}}</li>
        <li class="mb-2">Tài khoản: {{ $order->user->name }}</li>
        <li class="mb-2">Tên người đặt: {{$order->name}}</li>
        <li class="mb-2">Email: {{$order->email}}</li>
        <li class="mb-2">Địa chỉ: {{$order->address}}</li>
        <li class="mb-2">Tổng tiền: {{ number_format($order->total, 0, ",", ".") }} VND</li>
        <li class="mb-2">
            PTTT:
            @if($order->payment_method == 1)
                <span>Thanh toán trực tiếp</span>
            @elseif($order->payment_method == 2)
                <span>Thanh toán online</span>
            @endif
        </li>
        <li class="mb-2">
            Trạng thái đơn hàng:
            @if ($order->status == 0)
            <span>Đơn hàng mới</span>
            @elseif ($order->status == 1)
            <span>Đang xử lí</span>
            @elseif ($order->status == 2)
            <span>Đang giao hàng</span>
            @elseif ($order->status == 3)
            <span>Đã giao hàng</span>
            @elseif ($order->status == 4)
            <span>Đã bị hủy</span>
            @else
            <span>Không xác định</span>
            @endif
        </li>
    </ul>
    <p>Danh sách sản phẩm</p>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->product_name }}</td>
                <td><img src="{{ Storage::url($item->image) }}" alt="" width="70px" height="60px"></td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->product_price, 0, ",", ".") }} VND</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>