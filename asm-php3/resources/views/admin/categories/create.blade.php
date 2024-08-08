@extends('admin.layouts.master')

@section('title')
Thêm danh mục
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
<form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Main product information -->
                <a href="#collapseProductInfo" class="d-block card-header py-3" data-toggle="collapse"
                   role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin danh mục</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseProductInfo">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="name" placeholder="Nhập tên danh mục..." name="name" required>
                        </div>
                    </div>
                </div>
            </div>
            <!--    gallery -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseProductGallery" class="d-block card-header py-3" data-toggle="collapse"
                   role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Hình ảnh</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseProductGallery">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">Thêm hình ảnh</h5>
                            <p class="text-muted">Hình ảnh cho danh mục</p>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                     
                    </div>
                </div>
            </div>
            <!--                        Button -->
            <div class="d-flex justify-content-center mb-3">
                <button class="btn btn-success w-sm" type="submit">Thêm</button>
            </div>
        </div>

    </div>
</form>
@endsection