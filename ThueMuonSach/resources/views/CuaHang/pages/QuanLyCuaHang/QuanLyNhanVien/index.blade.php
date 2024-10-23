

@extends('CuaHang.layouts.index')

<head>
    <link rel="stylesheet" href="{{ asset('css/quanlycuahang.css') }}">
    <script src="{{ asset('js/QuanLyCuaHang/quanlycuahang.js') }}"></script>

</head>

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

    <!-- Form thêm nhân viên -->
    <div class="modal fade" id="modalID">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h3 class="text-uppercase text-danger">Thêm nhân viên mới</h3>
                </div>
                <form class="modal-body" action="" method="POST">
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
                                    <option value="Quản lý cửa hàng">Quản lý cửa hàng</option>
                                    <option value="Nhân viên kho">Nhân viên kho</option>
                                    <option value="Thuê trả">Thuê trả</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="w-25 btn btn-danger" id="btnCancelAdd">Hủy</button>
                        <button type="submit" class="w-25 btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="mt-4">
        <h2>Danh sách nhân viên</h2>
        <form action="" method="POST">
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
                            @foreach ($nhanVienList as $NhanVien)
                            <tr>
                                <td>{{ $NhanVien->maNhanVien }}</td>
                                <td class="truncate">{{ $NhanVien->hoTen }}</td>
                                <td>
                                    <select class="form-select" name="ghiNhan[]">
                                        <option value="Quản lý cửa hàng" {{ $NhanVien->chucVu == 'Quản lý cửa hàng' ? 'selected' : '' }}>Quản lý cửa hàng</option>
                                        <option value="Quản lý kho" {{ $NhanVien->chucVu == 'Quản lý kho' ? 'selected' : '' }}>Quản lý kho</option>
                                        <option value="Thuê trả" {{ $NhanVien->chucVu == 'Thuê trả' ? 'selected' : '' }}>Thuê trả</option>
                                    </select>
                                </td>
                                <td>{{ $NhanVien->maNhanVien }}</td>
                                <td>{{ $NhanVien->maNhanVien }}</td>
                                <td class="truncate">{{ $NhanVien->email }}</td>
                                <td class="truncate">{{ $NhanVien->soDienThoai }}</td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#update" style="outline: none; border: none;" type="button"><i class="fas fa-edit text-warning"></i></button>
                                    <button 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#delete" 
                                        style="outline: none; border: none;" 
                                        type="button" 
                                        data-id="{{ $NhanVien->maNhanVien }}"
                                        class="btnDelete">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                </td>
                                <!-- Modal Xóa -->
                                <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
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
                                                {{-- Đang sửa --}}
                                                <form id="deleteForm" action="{{ route('route-cuahang-quanlycuahang-quanlynhanvien.deleteOneNhanVien', $NhanVien->maNhanVien) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
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
                </div>
            </div> 
        </form>
    </div> 
@endsection