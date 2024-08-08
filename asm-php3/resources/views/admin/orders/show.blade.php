@extends('admin.layouts.master')

@section('title')
Chi tiết đơn hàng
@endsection

@section('content')
<a href="{{ route('gerenate', $order) }}" target="_blank">In hóa đơn</a>
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
<h4>Danh sách sản phẩm</h4>
<table class="table">
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
@endsection