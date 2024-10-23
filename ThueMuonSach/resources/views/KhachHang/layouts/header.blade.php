<!-- <h1>Header</h1> -->
<!-- <a href="{{ route('route-dangnhap') }}">Đăng nhập</a><br>
<a href="{{ route('route-dangky') }}">Đăng ký</a><br>
<hr>
<a href="{{ route('route-khachhang-trangchu') }}">Trang Chủ</a><br>
<a href="{{ route('route-khachhang-giohang') }}">Giỏ hàng</a><br>
<a href="{{ route('route-khachhang-thueanpham') }}">Thuê ấn phẩm</a><br>
<a href="{{ route('route-khachhang-chitietanpham') }}">Chi tiết ấn phẩm</a>
<hr>
<a href="{{ route('route-cuahang-nhanvien') }}">Nhân viên</a><br>
<a href="{{ route('route-cuahang-quanlycuahang') }}">Quản lý cửa hàng</a><br>
<a href="{{ route('route-cuahang-quanlykho') }}">Quản lý kho</a> -->
<head>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}  ">
</head>
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li style="font-family: Cairo, sans-serif; font-size: 15px;"><i class="fa fa-envelope"></i>WindWayShop.com</li>
                            <li style="font-family: Cairo, sans-serif; font-size: 15px;">Miễn phí vận chuyển và các ưu đãi đặc biệt khi đăng ký thành viên</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="{{ route('route-dangnhap') }}"><i class="fa fa-user"></i></a>
                            <a href="{{ route('route-khachhang-lienhe')}}"><i class="fa fa-phone"></i></a>
                            <a href="{{ route('route-khachhang-giohang') }}"><i class="fa fa-shopping-bag"></i></a>
                            <a href="{{ route('route-dangnhap') }}">Đăng nhập</a><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
