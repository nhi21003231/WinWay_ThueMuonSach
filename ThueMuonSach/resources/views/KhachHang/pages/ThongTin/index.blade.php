{{-- <!-- resources/views/KhachHang/pages/ThongTin/index.blade.php -->
@extends('KhachHang.layouts.index')
@section('content')
<div class="container">
    <h2>Thông Tin Cá Nhân</h2>
    <div class="row">
        <div class="col-md-6">
            @if($khachHang)
                <form action="{{ route('route-khachhang-capnhatthongtin') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="hoten">Họ tên:</label>
                        <input type="text" class="form-control" id="hoten" name="hoten" value="{{ $khachHang->hoten }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $khachHang->email }}">
                    </div>
                    <div class="form-group">
                        <label for="dienthoai">Điện thoại:</label>
                        <input type="text" class="form-control" id="dienthoai" name="dienthoai" value="{{ $khachHang->dienthoai }}">
                    </div>
                    <div class="form-group">
                        <label for="diachi">Địa chỉ:</label>
                        <input type="text" class="form-control" id="diachi" name="diachi" value="{{ $khachHang->diachi }}">
                    </div>
                    <div class="form-group">
                        <label for="lathanhvien">Là thành viên:</label>
                        <input type="text" class="form-control" id="lathanhvien" name="lathanhvien" value="{{ $khachHang->lathanhvien ? 'Là Thàn Viên' : 'Không Là Thàn Viên' }}" readonly>
                    </div>
                    <button type="close" class="btn btn-secondary">Hủy</button>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            @else
                <p>Không tìm thấy thông tin khách hàng.</p>
            @endif
        </div>
    </div>
</div>
@endsection --}}


<!-- resources/views/KhachHang/pages/ThongTin/index.blade.php -->
@extends('KhachHang.layouts.index')
@section('content')
<div class="container">
    <h2>Thông Tin Cá Nhân</h2>
    <div class="row">
        <div class="col-md-6">
            @if($khachHang)
                <!-- Hiển thị thông tin khách hàng -->
                <div id="info">
                    <p><strong>Họ tên:</strong> {{ $khachHang->hoten }}</p>
                    <p><strong>Email:</strong> {{ $khachHang->email }}</p>
                    <p><strong>Điện thoại:</strong> {{ $khachHang->dienthoai }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $khachHang->diachi }}</p>
                    <p><strong>Là thành viên:</strong> {{ $khachHang->lathanhvien ? 'Là Thành Viên' : 'Không Là Thành Viên' }}</p>
                    <button class="btn btn-primary" onclick="showEditForm()">Cập nhật thông tin cá nhân</button>
                </div>

                <!-- Form chỉnh sửa thông tin khách hàng -->
                <div id="editForm" style="display: none;">
                    <form action="{{ route('route-khachhang-capnhatthongtin') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="hoten">Họ tên:</label>
                            <input type="text" class="form-control" id="hoten" name="hoten" value="{{ $khachHang->hoten }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $khachHang->email }}">
                        </div>
                        <div class="form-group">
                            <label for="dienthoai">Điện thoại:</label>
                            <input type="text" class="form-control" id="dienthoai" name="dienthoai" value="{{ $khachHang->dienthoai }}">
                        </div>
                        <div class="form-group">
                            <label for="diachi">Địa chỉ:</label>
                            <input type="text" class="form-control" id="diachi" name="diachi" value="{{ $khachHang->diachi }}">
                        </div>
                        <div class="form-group">
                            <label for="lathanhvien">Là thành viên:</label>
                            <input type="text" class="form-control" id="lathanhvien" name="lathanhvien" value="{{ $khachHang->lathanhvien ? 'Là Thành Viên' : 'Không Là Thành Viên' }}" readonly>
                        </div>
                        <button type="button" class="btn btn-secondary" onclick="hideEditForm()">Hủy</button>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            @else
                <p>Không tìm thấy thông tin khách hàng.</p>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
    </div>
</div>

<script>
    function showEditForm() {
        document.getElementById('info').style.display = 'none';
        document.getElementById('editForm').style.display = 'block';
    }

    function hideEditForm() {
        document.getElementById('info').style.display = 'block';
        document.getElementById('editForm').style.display = 'none';
    }
</script>
@endsection