@extends('CuaHang.layouts.index')

@section('content')
<div class="container">
    <h2 class="mb-4">Chỉnh sửa Bài Báo</h2>

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

    <form action="{{ route('route-cuahang-nhanvien-dangbaibao-sua') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="tieude" class="form-label">Tiêu Đề</label>
            <input type="text" class="form-control" id="tieude" name="tieude" value="{{ old('tieude', $baiBao->tieude) }}" required>
        </div>

        <div class="mb-3">
            <label for="noidung" class="form-label">Nội Dung</label>
            <textarea class="form-control" id="noidung" name="noidung" rows="5" required>{{ old('noidung', $baiBao->noidung) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="manhanvien" class="form-label">Mã Nhân Viên</label>
            <input type="text" class="form-control" id="manhanvien" name="manhanvien" value="{{ old('manhanvien', $baiBao->manhanvien) }}" required>
        </div>

        <div class="mb-3">
            <label for="hinhanh" class="form-label">Hình Ảnh</label>
            @if ($baiBao->hinhanh)
                <div class="mb-2">
                    <strong>Hình Ảnh Hiện Tại:</strong><br>
                    <img src="{{ asset('img/anh-bai-bao/' . $baiBao->hinhanh) }}" alt="Hình ảnh bài báo" style="width: 100px; height: auto; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px;">
                </div>
            @endif
            <input type="file" class="form-control" id="hinhanh" name="hinhanh" accept="image/*">
            <small class="form-text text-muted">Chọn hình ảnh mới nếu bạn muốn thay đổi.</small>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ URL::to('nhan-vien/dang-bai-bao') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection