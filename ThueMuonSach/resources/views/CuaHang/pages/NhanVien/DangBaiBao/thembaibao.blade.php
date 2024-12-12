@extends('CuaHang.layouts.index')

@section('content')
    <style>
    </style>

    <div class="container">
        <h2 class="mb-4">Thêm Bài Báo Mới</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('route-cuahang-nhanvien-dangbaibao-store') }}" method="POST" enctype="multipart/form-data">
            <!-- Thêm enctype -->
            @csrf
            <div class="mb-3">
                <label for="tieude" class="form-label">Tiêu Đề</label>
                <input type="text" class="form-control" id="tieude" name="tieude" required>
            </div>
            <div class="mb-3">
                <label for="noidung" class="form-label">Nội Dung</label>
                <textarea class="form-control" id="noidung" name="noidung" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="manhanvien" class="form-label">Tên Nhân Viên</label>
                <input type="text" class="form-control" id="manhanvien" name="manhanvien" required
                    value="{{ Auth::user()->nhanvien->hoten }}">
            </div>
            <div class="mb-3">
                <label for="hinhanh" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" id="hinhanh" name="hinhanh" accept="image/*" required>
                <!-- Thêm thuộc tính required -->.
            </div>
            <button type="submit" class="btn btn-primary">Đăng Bài Báo</button>
            <a href="{{ URL::to('nhan-vien/dang-bai-bao') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
