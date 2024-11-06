@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mt-5 mb-2 text-center">Cập nhật thông tin ấn phẩm</h2>

    <form
        action="{{ route('route-cuahang-quanlykho-quanlyanpham-capnhatthongtinanpham', ['mactanpham' => $CTAnPham->mactanpham]) }}"
        method="POST" class="px-5 w-75 mx-auto py-5" enctype="multipart/form-data">

        @csrf

        <div class="row g-5 mb-4">
            <div class="col-6">
                <label for="tenanpham" class="form-label h4">Tên ấn phẩm <span class="text-danger">*</span></label>
                <div class="position-relative">
                    <input type="text" class="form-control @error('tenanpham') is-invalid @enderror" name="tenanpham"
                        id="tenanpham" placeholder="Nhập tên ấn phẩm"
                        value="{{ old('tenanpham') ? old('tenanpham') : $CTAnPham->tenanpham }}">
                    @error('tenanpham')
                        <div class="text-danger position-absolute" style="top: 106%; left: 0; font-size: 11px">
                            {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <label for="tacgia" class="form-label h4">Tác giả <span class="text-danger">*</span></label>
                <div class="position-relative">
                    <input type="text" class="form-control @error('tacgia') is-invalid @enderror" name="tacgia"
                        id="tacgia" placeholder="Nhập vị trí"
                        value="{{ old('tacgia') ? old('tacgia') : $CTAnPham->tacgia }}">
                    @error('tacgia')
                        <div class="text-danger position-absolute" style="top: 106%; left: 0; font-size: 11px">
                            {{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row g-5 mb-4">
            <div class="col-6">
                <label for="madanhmuc" class="form-label h4">Danh mục <span class="text-danger">*</span></label>
                <div class="position-relative">
                    <select class="form-select @error('madanhmuc') is-invalid @enderror" name="madanhmuc" id="madanhmuc">
                        <option value="">Chưa chọn danh mục</option>
                        @foreach ($dsDanhMuc as $danhMuc)
                            <option value="{{ $danhMuc->madanhmuc }}"
                                {{ old('madanhmuc') ? (old('madanhmuc') == $danhMuc->madanhmuc ? 'selected' : '') : ($danhMuc->madanhmuc == $CTAnPham->madanhmuc ? 'selected' : '') }}>
                                {{ $danhMuc->tendanhmuc }}
                            </option>
                        @endforeach

                    </select>
                    @error('madanhmuc')
                        <div class="text-danger position-absolute" style="top: 106%; left: 0; font-size: 11px">
                            {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <label for="namxuatban" class="form-label h4">Năm xuất bản</label>
                <div class="position-relative">
                    <input type="text" class="form-control @error('namxuatban') is-invalid @enderror" name="namxuatban"
                        id="namxuatban" placeholder="Nhập vị trí"
                        value="{{ old('namxuatban') ? old('namxuatban') : $CTAnPham->namxuatban }}">
                    @error('namxuatban')
                        <div class="text-danger position-absolute" style="top: 106%; left: 0; font-size: 11px">
                            {{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row g-5 mb-4">
            <div class="col-6">
                <label for="fileanh" class="form-label h4">Ảnh ấn phẩm <span class="text-danger">*</span></label>
                <div class="position-relative">
                    <input type="file" class="form-control @error('fileanh') is-invalid @enderror" name="fileanh"
                        id="fileanh" accept="image/*">
                    @error('fileanh')
                        <div class="text-danger position-absolute" style="top: 106%; left: 0; font-size: 11px">
                            {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="ba-image-container py-1" style="width: 200px!important; height: 200px!important">
                    <img src="{{ asset('img/anh-an-pham/' . $CTAnPham->hinhanh) }}" class="img-fluid"
                        alt="{{ $CTAnPham->tenanpham }}">
                </div>
            </div>
        </div>

        <div class="row gx-5 gy-4 mb-3 pt-4">
            <div class="col-6">
                <a href="{{ route('route-cuahang-quanlykho-quanlyanpham') }}" class="btn btn-danger w-100">Hủy</a>
            </div>
            <div class="col-6">
                <button class="btn btn-success w-100" type="submit">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection
