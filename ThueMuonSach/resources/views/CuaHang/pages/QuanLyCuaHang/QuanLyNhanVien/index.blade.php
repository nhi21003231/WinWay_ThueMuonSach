
@extends('CuaHang.layouts.index')

@section('content')
<!-- Content -->
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center border-bottom py-3">
        <h1>Quản lý cửa hàng - Quản lý nhân viên</h1>
        <div class="d-flex align-items-center">
            <i class="fas fa-user me-2"></i> Admin
            <div class="ms-4">Thứ 6, 20/09/2024</div>
        </div>
    </div>
    
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalID">
        Thêm nhân viên
    </button>

    <!-- Form Tìm Kiếm -->
    <form action="{{ route('route-cuahang-quanlycuahang-quanlynhanvien') }}" method="GET" class="d-flex my-3">
        <input type="text" name="keyword" class="form-control w-50" placeholder="Tìm kiếm nhân viên...">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>

    <!-- Form thêm nhân viên -->
    <div class="modal fade" id="modalID">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h3 class="text-uppercase text-danger">Thêm nhân viên mới</h3>
                </div>
                <form class="modal-body" action="{{ route('route-cuahang-quanlycuahang-quanlynhanvien.themNhanVien') }}" method="POST">
                    @csrf
                    <div class="d-flex gap-3 justify-content-around align-content-around">
                        <div class="w-100">
                            <div class="mb-3">
                                <label for="hoTen" class="form-label">Họ tên <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" id="hoTen" name="hoTen" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="soDienThoai" class="form-label">Điện thoại</label>
                                <input type="text" class="form-control" id="soDienThoai" name="soDienThoai" required>
                            </div>
                        </div>
                        <div class="w-100">
                            <div class="mb-3">
                                <label for="tenTaiKhoan" class="form-label">Tài khoản <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" id="tenTaiKhoan" name="tenTaiKhoan" required>
                            </div>
                            <div class="mb-3">
                                <label for="matKhau" class="form-label">Mật khẩu <span class="text-danger">(*)</span></label>
                                <input type="password" class="form-control" id="matKhau" name="matKhau" required>
                            </div>
                            <div class="mb-3">
                                <label for="chucVu" class="form-label">Chức vụ <span class="text-danger">(*)</span></label>
                                <select class="form-select" id="chucVu" name="chucVu" required>
                                    <option value="">Chọn chức vụ</option>
                                    <option value="quanlycuahang">Quản lý cửa hàng</option>
                                    <option value="quanlykho">Nhân viên kho</option>
                                    <option value="nhanvien">Thuê trả</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="w-25 btn btn-danger" id="btnCancelAdd" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="w-25 btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h2>Danh sách nhân viên</h2>
        <form action="{{ route('route-cuahang-quanlycuahang-quanlynhanvien.suaNhanVien') }}" method="POST">
            @csrf
            <div class="scrollable-container"> <!-- Container cuộn -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Mã NV</th>
                                <th>Họ tên</th>
                                <th>Chức vụ</th>
                                <th>Tài khoản</th>
                                <th>Mật khẩu</th>
                                <th>Email</th>
                                <th>SDT</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nhanvienList as $nhanvien)
                            <tr>
                                <td>{{ $nhanvien->manhanvien }}</td>
                                <td class="truncate">
                                    <input type="hidden" name="id[]" value="{{ $nhanvien->manhanvien }}"> <!-- Trường ẩn cho ID -->
                                    <input type="text" class="form-control" name="hoten[]" value="{{ $nhanvien->hoten }}" required>
                                </td>
                                <td>
                                    <select class="form-select" name="ghinhan[]">
                                        <option value="quanlycuahang" {{ $nhanvien->taikhoan->vaitro == 'quanlycuahang' ? 'selected' : '' }}>Quản lý cửa hàng</option>
                                        <option value="quanlykho" {{ $nhanvien->taikhoan->vaitro == 'quanlykho' ? 'selected' : '' }}>Quản lý kho</option>
                                        <option value="nhanvien" {{ $nhanvien->taikhoan->vaitro == 'nhanvien' ? 'selected' : '' }}>Thuê trả</option>
                                    </select>
                                </td>
                                <td>{{ $nhanvien->taikhoan->tentaikhoan }}</td>
                                <td class="truncate">
                                    <input type="text" class="form-control" name="matkhau[]" value="{{ optional($nhanvien->taikhoan)->matkhau }}" required>
                                </td>
                                <td class="truncate">
                                    <input type="email" class="form-control" name="email[]" value="{{ $nhanvien->email }}" required>
                                </td>
                                <td class="truncate">
                                    <input type="text" class="form-control" name="sodienthoai[]" value="{{ $nhanvien->sodienthoai }}" required>
                                </td>
                                <td>
                                    <button 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#delete{{ $nhanvien->manhanvien }}" 
                                        style="outline: none; border: none;" 
                                        type="button" 
                                        data-id="{{ $nhanvien->manhanvien }}"
                                        class="btnDelete">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button> 
                                </td>
                                <!-- Modal Xóa -->
                                <div class="modal fade" id="delete{{ $nhanvien->manhanvien }}" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Xóa nhân viên</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn muốn xóa nhân viên này?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                <form action="{{ route('route-cuahang-quanlycuahang-quanlynhanvien.xoaNhanVien', $nhanvien->manhanvien) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="bg-danger btn btn-primary">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </div> 
        </form>
    </div> 
@endsection