@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mt-5 mb-3 text-center">Cập nhật danh mục</h2>

    <form action="{{ route('route-cuahang-quanlykho-quanlydanhmuc-capnhatdanhmuc', ['madanhmuc' => $danhMuc->madanhmuc]) }}" method="POST"
        class="px-5 w-75 mx-auto py-5" enctype="multipart/form-data">

        @csrf

        <div class="row g-5 mb-4">
            <div class="col-12">
                <label for="tendanhmuc" class="form-label h4">Tên danh mục <span class="text-danger">*</span></label>
                <div class="position-relative">
                    <input type="text" class="form-control @error('tendanhmuc') is-invalid @enderror" name="tendanhmuc"
                        id="tendanhmuc" placeholder="Nhập tên ấn phẩm" value="{{ old('tendanhmuc') ? old('tendanhmuc') : $danhMuc->tendanhmuc }}">
                    @error('tendanhmuc')
                        <div class="text-danger position-absolute" style="top: 106%; left: 0; font-size: 11px">
                            {{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row g-5 mb-4">
            <div class="col-12">
                <label for="mota" class="form-label h4">Mô tả</label>
                <div class="position-relative">
                    <textarea class="form-control @error('mota') is-invalid @enderror" name="mota" id="mota" rows="6"
                        placeholder="Nhập mô tả">{{ old('mota') ? old('mota') : $danhMuc->mota }}</textarea>
                    @error('mota')
                        <div class="text-danger position-absolute" style="top: 106%; left: 0; font-size: 11px">
                            {{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row g-5 mb-5 pt-4">
            <div class="col-6">
                <a href="{{ route('route-cuahang-quanlykho-quanlydanhmuc') }}" class="btn btn-danger w-100">Hủy</a>
            </div>
            <div class="col-6">
                <button class="btn btn-success w-100" type="submit">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection
