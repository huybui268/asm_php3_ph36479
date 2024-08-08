@extends('admin.layouts.master')

@section('title')
    Chi tiết danh mục
@endsection

@section('content')
<ul class="list-unstyled">
    <li class="mb-2">ID: {{$category->id}}</li>
    <li class="mb-2">Tên: {{$category->name}}</li>
    <li class="mb-2">Ảnh:
        @if(!empty($category->image))
            <span width="45px" height="65px">
                <img src="{{ Storage::url($category->image) }}" alt="" width="100" height="100">
            </span>
        @else
            <span class="text-danger">Chưa cập nhập ảnh!</span>
        @endif
    </li>
</ul>
@endsection