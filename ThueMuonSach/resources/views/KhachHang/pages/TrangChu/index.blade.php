@extends('KhachHang.layouts.index')
@section('content')
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
                    <form action="#">
                        <input type="text" name="search" placeholder="Nhập ấn phẩm cần tìm.">
                        <button type="submit" class="site-btn">TÌM</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-12">
                <nav class="header__menu">
                    <ul>
                        <li><a href="{{ route('route-khachhang-trangchu') }}">Trang Chủ</a></li>
                        <li><a href="{{ route('route-khachhang-chitietanpham') }}">Ấn phẩm</a> </li>
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
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__item set-bg" data-setbg="./img/bganpham1.jpg">
                        <div class="hero__text">
                            <span>chưa nghĩ ra?</span>
                            <h2>ẤN PHẨM<br>TRI THỨC SINH VIÊN</h2>
                            <p>Có sẵn nhận và giao hàng miễn phí</p>
                            <a href="{{ route('route-khachhang-chitietanpham') }}" class="primary-btn">XEM NGAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Ấn phẩm nổi bật</h2>
                    </div>
                </div>
        </div>
    </section>
@endsection
