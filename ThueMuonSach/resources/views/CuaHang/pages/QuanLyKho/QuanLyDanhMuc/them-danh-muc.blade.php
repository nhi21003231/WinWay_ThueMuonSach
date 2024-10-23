@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mt-5 mb-3 text-center">Thêm danh mục</h2>

    <form action="" method="GET" class="px-5 w-75 mx-auto py-5" enctype="multipart/form-data">

        <div class="row g-5 mb-4">
            <div class="col-12">
                <label for="ten-danh-muc" class="form-label h4">Tên danh mục <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="ten-danh-muc" id="ten-danh-muc"
                    placeholder="Nhập tên ấn phẩm" required>
            </div>
        </div>

        <div class="row g-5 mb-4">
            <div class="col-12">
                <label for="mo-ta" class="form-label h4">Mô tả</label>
                <textarea class="form-control" name="mo-ta" id="mo-ta" rows="6" placeholder="Nhập mô tả"></textarea>
            </div>
        </div>

        <div class="row g-5 mb-5 pt-4">
            <div class="col-6">
                <a href="{{ route('route-cuahang-quanlykho-quanlydanhmuc') }}" class="btn btn-danger w-100">Hủy</a>
            </div>
            <div class="col-6">
                <button class="btn btn-success w-100">Thêm</button>
            </div>
        </div>
    </form>
@endsection
