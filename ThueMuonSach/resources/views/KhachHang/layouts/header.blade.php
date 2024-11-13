<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li style="font-family: Cairo, sans-serif; font-size: 15px;"><i
                                    class="fa fa-envelope"></i>WindWayShop.com</li>
                            <li style="font-family: Cairo, sans-serif; font-size: 15px;">Miễn phí vận chuyển và các ưu
                                đãi đặc biệt khi đăng ký thành viên</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="{{ route('route-dangnhap') }}"><i class="fa fa-user"></i></a>
                            <a href="{{ route('route-khachhang-lienhe') }}"><i class="fa fa-phone"></i></a>
                            <a href="{{ route('route-khachhang-giohang') }}"><i class="fa fa-shopping-bag"></i></a>
                            @auth
                                <a href="{{ route('route-dangxuat') }}">Đăng xuất</a><br>
                            @else
                                <a href="{{ route('route-dangnhap') }}">Đăng nhập</a><br>
                                <!-- <a href="{{ route('route-dangky') }}">Đăng ký</a><br> -->
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Hero Section Begin -->
<div class="container">
    <div class="row">

        <!-- <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.php"><img src="./img/logo1.png" alt="" width="40%" style="margin-left: 170px;"></a>
                </div>
            </div> -->
        <div class="hero__search">
            <div class="hero__search__form">
                <form action="{{ route('route-khachhang-timkiem') }}"method="GET">
                    <input type="text" name="search" placeholder="Nhập ấn phẩm cần tìm.">
                    <button type="submit" class="site-btn">TÌM</button>
                </form>
            </div>
        </div>

        <div class="col-lg-12">
            <nav class="header__menu">
                <ul>
                    <li><a href="{{ route('route-khachhang-trangchu') }}">Trang Chủ</a></li>
                    <li><a href="{{ route('route-khachhang-danhsachanpham') }}">Ấn phẩm</a> </li>
                    <li><a href="{{ route('route-khachhang-lienhe') }}">Liên hệ</a></li>
                    <li><a href="{{ route('route-khachhang-chinhsach') }}">Chính sách</a></li>
                    <li><a href="{{ route('route-khachhang-giohang') }}">Quản lý mua hàng</a>
                        <ul class="header__menu__dropdown">
                            <li><a href="{{ route('route-khachhang-giohang') }}">Đặt hàng</a></li>
                            <li><a href="{{ route('route-khachhang-lichsumuahang') }}">Xem lịch sử mua hàng</a></li>
                        </ul>
            </nav>
        </div>
    </div>
</div>
