@extends('admin.layouts.master')

@section('title')
Thêm banner
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
<form action="{{route('admin.banners.store')}}" method="post" enctype="multipart/form-data">
    @csrf
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
                            <label for="title" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề..." name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Ảnh banner</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Đường dẫn</label>
                            <input type="url" class="form-control" id="link" placeholder="https://example.com" name="link" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea name="description" class="form-control" id="description" cols="30" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Trạng thái</label>
                            <input class="form-check-input ml-2" value="1" type="checkbox" checked name="is_active" id="is_active">
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