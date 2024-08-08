@extends('admin.layouts.master')

@section('title')
Sửa đơn hàng
@endsection

@section('style-libs')
<!-- Plugins css -->
<link href="{{asset('theme/admin/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('script-libs')
<!-- ckeditor -->
<script src="{{asset('theme/admin/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
<!-- dropzone js -->
<script src="{{asset('theme/admin/libs/dropzone/dropzone-min.js')}}"></script>

<script src="{{asset('theme/admin/js/create-product.init.js')}}"></script>
@endsection

@section('content')
<form action="{{route('admin.orders.update', $order)}}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Main product information -->
                <a href="#collapseProductInfo" class="d-block card-header py-3" data-toggle="collapse"
                   role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin banner</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseProductInfo">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Đơn hàng mới</option>
                                <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đang xử lí</option>
                                <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Đang giao hàng</option>
                                <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Đã giao hàng</option>
                                <option value="4" {{ $order->status == 4 ? 'selected' : '' }}>Đã bị hủy</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!--                        Button -->
            <div class="d-flex justify-content-center mb-3">
                <button class="btn btn-success w-sm" type="submit">Sửa</button>
            </div>
        </div>

    </div>
</form>
@endsection