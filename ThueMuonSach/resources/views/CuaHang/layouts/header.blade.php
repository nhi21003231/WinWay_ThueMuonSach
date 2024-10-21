{{-- <h1>Header</h1> --}}

<nav class="navbar navbar-expand-lg p-0">
    <div class="container-fluid p-0">

        <!-- Logo và tên website -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ URL::asset('app/logo_windway.jpg') }}" alt="Logo" width="70" height="70"
                class="d-inline-block align-text-top">
            <h3 class="ms-3 my-0">{{ config('app.name') }}</h3>
        </a>

        <!-- Phần hiển thị vai trò tài khoản -->
        <div class="d-flex align-items-center">
            <span class="me-3">
                <h5>
                    <!-- Hiển thị vai trò từ session -->
                    {{-- {{ session('vai_tro') ?? 'Khách' }}  --}}
                    Quản lý kho
                </h5>
            </span>
        </div>

    </div>
</nav>


{{-- <a href="{{ route('route-dangnhap') }}">Đăng nhập</a><br>
<a href="{{ route('route-dangky') }}">Đăng ký</a><br>
<hr>
<a href="{{ route('route-khachhang-trangchu') }}">Trang Chủ</a><br>
<a href="{{ route('route-khachhang-giohang') }}">Giỏ hàng</a><br>
<a href="{{ route('route-khachhang-thueanpham') }}">Thuê ấn phẩm</a><br>
<a href="{{ route('route-khachhang-chitietanpham') }}">Chi tiết ấn phẩm</a>
<hr>
<a href="{{ route('route-cuahang-nhanvien') }}">Nhân viên</a><br>
<a href="{{ route('route-cuahang-quanlycuahang') }}">Quản lý cửa hàng</a><br>
<a href="{{ route('route-cuahang-quanlykho') }}">Quản lý kho</a> --}}
