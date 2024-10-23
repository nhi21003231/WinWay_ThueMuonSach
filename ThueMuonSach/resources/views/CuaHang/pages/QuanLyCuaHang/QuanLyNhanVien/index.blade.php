{{-- phát 23/10 --}}
@extends('CuaHang.layouts.index')

@section('content')
<h1>Quản lý cửa hàng - Quản lý nhân viên</h1>

<!-- Content -->
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center border-bottom py-3">
        <h1>Quản lý cửa hàng - Chấm công</h1>
        <div class="d-flex align-items-center">
            <i class="fas fa-user me-2"></i> Admin
            <div class="ms-4">Thứ 6, 20/09/2024</div>
        </div>
    </div>

    <!-- Table -->
    <div class="mt-4">
        <h2>Danh sách nhân viên</h2> 
        <form action="" method="POST">
            @csrf <!-- Token CSRF để bảo mật -->

            <div class="table-responsive ">
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
                            <td>{{ $NhanVien->hoTen }}</td>
                            <td>{{ $NhanVien->chucVu }}</td>
                            <td>{{ $NhanVien->maNhanVien }}</td>
                            <td>{{ $NhanVien->maNhanVien }}</td>
                            <td>{{ $NhanVien->email }}</td>
                            <td>{{ $NhanVien->soDienThoai }}</td> 
                            <td>
                                <i class="fas fa-edit text-warning"></i>
                                <i class="fas fa-trash text-danger"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật trạng thái</button>
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </nav>
        </form>
    </div>

@endsection