@extends('KhachHang.layouts.index')
@section('content')
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
