@extends('KhachHang.layouts.index')
@section('content')
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {{-- <div class="hero__item set-bg" data-setbg="./img/bganpham1.jpg"> --}}
                    {{-- <div class="hero__item set-bg" data-setbg="{{ asset('img/bganpham1.jpg') }}">
                        <div class="hero__text">
                            <span>chưa nghĩ ra?</span>
                            <h2>ẤN PHẨM<br>TRI THỨC SINH VIÊN</h2>
                            <p>Có sẵn nhận và giao hàng miễn phí</p>
                            <a href="{{ route('route-khachhang-danhsachanpham') }}" class="primary-btn">XEM NGAY</a>
                        </div>
                    </div> --}}
                    <div class="owl-carousel owl-theme">
                        <div class="hero__item"
                            style="background-image: url('{{ asset('img/bganpham8.png') }}'); background-size: cover; background-position: center;">
                            <div class="hero__text">
                                <span>chưa nghĩ ra?</span>
                                <h2>ẤN PHẨM<br>TRI THỨC SINH VIÊN</h2>
                                <p>Có sẵn nhận và giao hàng miễn phí</p>
                                <a href="{{ route('route-khachhang-danhsachanpham') }}" class="primary-btn">XEM NGAY</a>
                            </div>
                        </div>
                        <div class="hero__item"
                            style="background-image: url('{{ asset('img/bganpham6.png') }}'); background-size: cover; background-position: center;">
                            <div class="hero__text">
                                <span>chưa nghĩ ra?</span>
                                <h2>ẤN PHẨM<br>TRI THỨC SINH VIÊN</h2>
                                <p>Có sẵn nhận và giao hàng miễn phí</p>
                                <a href="{{ route('route-khachhang-danhsachanpham') }}" class="primary-btn">XEM NGAY</a>
                            </div>
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
                    <div class="section-title mb-3">
                        <h2>Ấn phẩm nổi bật</h2>
                    </div>
                </div>
            </div>
    </section>
    @php
        $chitietanpham = \App\Models\ChiTietAnPham::paginate(4);
    @endphp
    <!-- Danh sách ấn phẩm -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                @if (isset($keyword) && $keyword)
                    <div class="col-lg-12">
                        <h5>Kết quả tìm kiếm cho "{{ $keyword }}"</h5>
                    </div>
                @endif

                @forelse ($chitietanpham as $anPham)
                    <div class="col-lg-3 col-md-4 mb-5">
                        <div class="product__details__pic">
                            {{-- <img src="{{ asset('/img/anh-an-pham/' . $anPham->hinhanh) }}" alt="{{ $anPham->tenanpham }}"
                                class="product__image"
                                onerror="this.onerror=null; this.src='{{ asset('/img/anh-an-pham/default.jpg') }}';"> --}}
                            <a href="{{ route('route-khachhang-chitietanpham', ['mactanpham' => $anPham->mactanpham]) }}">
                                <img src="{{ asset('/img/anh-an-pham/' . $anPham->hinhanh) }}"
                                    alt="{{ $anPham->tenanpham }}" class="product__image"
                                    onerror="this.onerror=null; this.src='{{ asset('/img/anh-an-pham/default.jpg') }}';">
                            </a>
                            <div class="product__details__text">
                                {{-- <a href="{{ route('route-khachhang-chitietanpham') }}"
                                    class="primary-btn">{{ $anPham->tenanpham }}</a> --}}
                                <a href="{{ route('route-khachhang-chitietanpham', ['mactanpham' => $anPham->mactanpham]) }}"
                                    class="primary-btn">{{ $anPham->tenanpham }}</a>
                                {{-- <a href="{{ route('route-khachhang-chitietanpham') }}"
                                    class="primary-btn">{{ $ds_anpham->giathue }}</a> --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <p>Không tìm thấy sản phẩm nào.</p>
                    </div>
                @endforelse
            </div>

            <div class="row mt-4 mb-5">
                <div class="col-12">
                    <a href="{{ route('route-khachhang-danhsachanpham') }}" class="primary-btn rounded-5 mx-auto text-center" style="width: 200px">Xem thêm</a>
                </div>
            </div>
        </div>
    </section>
@endsection
