@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mt-5 mb-3 text-center">Nhập ấn phẩm mới</h2>

    <form action="" method="GET" class="px-5 w-75 mx-auto py-5" enctype="multipart/form-data">

        <div class="row g-5 mb-4">
            <div class="col-6">
                <label for="ten-an-pham" class="form-label h4">Tên ấn phẩm <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="ten-an-pham" id="ten-an-pham"
                    placeholder="Nhập tên ấn phẩm" required>
            </div>
            <div class="col-6">
                <label for="vi-tri" class="form-label h4">Vị trí</label>
                <input type="text" class="form-control" name="vi-tri" id="vi-tri" placeholder="Nhập vị trí">
            </div>
        </div>

        <div class="row g-5 mb-4">
            <div class="col-6">
                <label for="tac-gia" class="form-label h4">Tác giả</label>
                <input type="text" class="form-control" name="tac-gia" id="tac-gia" placeholder="Nhập tên tác giả">
            </div>
            <div class="col-6">
                <label for="so-luong" class="form-label h4">Số lượng</label>
                <input type="number" class="form-control" name="so-luong" id="so-luong" placeholder="Nhập số lượng">
            </div>
        </div>

        <div class="row g-5 mb-4">
            <div class="col-6">
                <label for="nam-xuat-ban" class="form-label h4">Năm xuất bản</label>
                <input type="number" class="form-control" name="nam-xuat-ban" id="nam-xuat-ban"
                    placeholder="Nhập năm xuất bản">
            </div>
            <div class="col-6">
                <label for="tinh-trang" class="form-label h4">Tình trạng</label>
                <select class="form-select" name="tinh-trang" id="tinh-trang">
                    <option value="Mới" selected>Mới</option>
                    <option value="Cũ">Cũ</option>
                    <option value="Hư hỏng">Hư hỏng</option>
                </select>
            </div>
        </div>

        <div class="row g-5 mb-4">
            <div class="col-6">
                <label for="danh-muc" class="form-label h4">Danh mục</label>
                <select class="form-select" name="danh-muc" id="danh-muc">
                    <option value="1" selected>Không có danh mục</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class="col-6">
                <label for="file-anh" class="form-label h4">Ảnh ấn phẩm <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="file-anh" id="file-anh" accept="image/*" required>
            </div>
        </div>

        <div class="row g-5 mb-5 pt-4">
            <div class="col-6">
                <a href="{{ route('route-cuahang-quanlykho-quanlyanpham') }}" class="btn btn-danger w-100">Hủy</a>
            </div>
            <div class="col-6">
                <button class="btn btn-success w-100">Nhập</button>
            </div>
        </div>
    </form>
@endsection
