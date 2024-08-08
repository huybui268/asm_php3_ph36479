@extends('admin.layouts.master')

@section('title')
    Danh sách sản phẩm
@endsection

@section('style-libs')
    <!-- Custom styles for this page -->
    <link href="{{asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('script-libs')
    <!-- Page level plugins -->
    <script src="{{asset('theme/admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('theme/admin/js/demo/datatables-demo.js')}}"></script>
@endsection

@section('content')
    @if(session('message'))
        <p class="alert alert-success">{{session('message')}}</p>
    @endif

    <a href="{{route('admin.products.create')}}" class="mb-3">
        <button class="btn btn-success">Tạo mới</button>
    </a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Giá sale</th>
                        <th>Danh mục</th>
                        <th>Ảnh</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Giá sale</th>
                            <th>Danh mục</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{number_format($item->price, 0, ",", ".")}} VND</td>
                                <td>{{number_format($item->price_sale, 0, ",", ".")}} VND</td>
                                <td>{{$item->category->name}}</td>
                                <td>
                                    @if(!empty($item->image))
                                        <div style="width: 100px;height: 100px;">
                                            <img src="{{Storage::url($item->image)}}"
                                                style="max-width: 100%; max-height: 100%;" alt="">
                                        </div>
                                    @endif
                                </td>
                                <td>{!! $item->is_active ? '<span class="badge bg-success text-white">Hoạt động</span>' : '<span class="badge bg-danger text-white">Không hoạt động</span>' !!}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.products.show', $item) }}" class="btn btn-primary mr-2">Xem</a>
                                    <a href="{{ route('admin.products.edit', $item) }}" class="btn btn-success mr-2">Sửa</a>
                                    <form action="{{ route('admin.products.destroy', $item) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection