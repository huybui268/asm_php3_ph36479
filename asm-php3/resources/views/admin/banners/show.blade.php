@extends('admin.layouts.master')

@section('title')
    Chi tiết banner
@endsection

@section('content')
<ul class="list-unstyled">
    <li class="mb-2">ID: {{$banner->id}}</li>
    <li class="mb-2">Tiêu đề: {{$banner->title}}</li>
    <li class="mb-2">Ảnh:
        @if(!empty($banner->image))
            <span width="100px" height="50px">
                <img src="{{ Storage::url($banner->image) }}" alt="" width="100px" height="50px">
            </span>
        @else
            <span class="text-danger">Chưa cập nhập ảnh!</span>
        @endif
    </li>
    <li>Mô tả: {{ $banner->description }}</li>
    <li class="mb-2">Trạng thái: {!! $banner->is_active ? '<span class="">Hoạt động</span>' : '<span class="">Không hoạt động</span>' !!}</li>
</ul>
@endsection