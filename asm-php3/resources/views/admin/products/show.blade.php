@extends('admin.layouts.master')

@section('title')
    Chi tiết sản phẩm
@endsection

@section('content')
<ul class="list-unstyled">
    <li class="mb-2">ID: {{$product->id}}</li>
    <li class="mb-2">Tên: {{$product->name}}</li>
    <li class="mb-2">Ảnh:
        @if(!empty($product->image))
            <span width="45px" height="65px">
                <img src="{{ Storage::url($product->image) }}" alt="" width="100" height="100">
            </span>
        @else
            <span class="text-danger">Chưa cập nhập ảnh!</span>
        @endif
    </li>
    <li class="mb-2">Mô tả: {{$product->description}}</li>
    <li class="mb-2">Giá: {{number_format($product->price, 0, ",", ".")}} VND</li>
    <li class="mb-2">Giá KM: {{number_format($product->price_sale, 0, ",", ".")}} VND</li>
    <li class="mb-2">Kích thước: {{$product->size}}</li>
    <li class="mb-2">Màu: {{$product->color}}</li>
    <li class="mb-2">Danh mục: {{$product->category->name}}</li>
    <li class="mb-2">Trạng thái: {!! $product->is_active ? '<span class="">Hoạt động</span>' : '<span class="">Không hoạt động</span>' !!}</li>
</ul>
@endsection