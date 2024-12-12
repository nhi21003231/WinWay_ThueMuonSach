{{-- @extends('KhachHang.layouts.index')

@section('content')
<section class="breadcrumb-section set-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Danh Sách Ấn Phẩm</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">

                    @foreach ($chitietanpham as $anPham)
                    <img src="{{ asset('/img/anh-an-pham/' . $anPham->hinhanh) }}" alt="{{ $anPham->tenanpham }}"
                        width="50" onerror="this.onerror=null; this.src='{{ asset('/img/anh-an-pham/default.jpg') }}';">
                    {{ $anPham->tenanpham }}
                    @endforeach
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection --}}

{{-- @extends('KhachHang.layouts.index')

@section('content')
<!-- Tiêu đề Trang -->
<section class="breadcrumb-section set-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Danh Sách Ấn Phẩm</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Danh sách ấn phẩm -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            @foreach ($chitietanpham as $anPham)
            <div class="col-lg-3 col-md-4 mb-4">
                <!-- Mỗi sản phẩm chiếm 3 cột trên màn hình lớn -->
                <div class="product__details__pic">
                    <img src="{{ asset('/img/anh-an-pham/' . $anPham->hinhanh) }}" alt="{{ $anPham->tenanpham }}"
                        class="product__image"
                        onerror="this.onerror=null; this.src='{{ asset('/img/anh-an-pham/default.jpg') }}';">
                    <div class="product__details__text">
                        <a href="{{ route('route-khachhang-chitietanpham') }}" class="primary-btn">{{ $anPham->tenanpham
                            }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection --}}

{{-- @extends('KhachHang.layouts.index')

@section('content')
<!-- Tiêu đề Trang -->
<section class="breadcrumb-section set-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Danh Sách Ấn Phẩm</h2>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- Danh sách ấn phẩm -->
{{-- <section class="product-details spad">
    <div class="container">
        <div class="row">
            @if (isset($keyword) && $keyword)
            <div class="col-lg-12">
                <h5>Kết quả tìm kiếm cho "{{ $keyword }}"</h5>
            </div>
            @endif

            @forelse ($chitietanpham as $anPham)
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="product__details__pic">
                    <img src="{{ asset('/img/anh-an-pham/' . $anPham->hinhanh) }}" alt="{{ $anPham->tenanpham }}"
                        class="product__image"
                        onerror="this.onerror=null; this.src='{{ asset('/img/anh-an-pham/default.jpg') }}';">
                    <div class="product__details__text">
                        <a href="{{ route('route-khachhang-chitietanpham') }}" class="primary-btn">{{ $anPham->tenanpham
                            }}</a> --}}
{{-- <a href="{{ route('route-khachhang-chitietanpham') }}" class="primary-btn">{{
                            $ds_anpham->giathue }}</a> --}}
{{--
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-12">
                <p>Không tìm thấy sản phẩm nào.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection --}}



{{-- @extends('KhachHang.layouts.index')

@section('content')
<section class="product-details spad">
    <div class="container">
        <div class="row">
            @if (isset($keyword) && $keyword)
            <div class="col-lg-12">
                <h5>Kết quả tìm kiếm cho "{{ $keyword }}"</h5>
            </div>
            @endif

            @forelse ($chitietanpham as $anPham)
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="product__details__pic">
                    <img src="{{ asset('/img/anh-an-pham/' . $anPham->hinhanh) }}" alt="{{ $anPham->tenanpham }}"
                        class="product__image"
                        onerror="this.onerror=null; this.src='{{ asset('/img/anh-an-pham/default.jpg') }}';">
                    <div class="product__details__text">
                        <a href="{{ route('route-khachhang-chitietanpham') }}" class="primary-btn">{{ $anPham->tenanpham
                            }}</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-12">
                <p>Không tìm thấy sản phẩm nào.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination Links -->
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                {{ $chitietanpham->links() }}
            </div>
        </div>
    </div>
</section>
@endsection --}}




@extends('KhachHang.layouts.index')
@section('content')
    <section class="product spad py-5">
        <div class="container">
            <div class="section-title mb-5">
                @isset($danhMuc)
                    <h2>Danh Mục: {{ $danhMuc->tendanhmuc }}</h2>
                @else
                    <h2>Tất Cả Ấn Phẩm</h2>
                @endisset
            </div>
            <div class="row py-2">
                @forelse($chitietanpham as $anPham)
                    <div class="col-lg-3 col-md-4 mb-5">
                        <div class="product__details__pic">
                            <a href="{{ route('route-khachhang-chitietanpham', ['mactanpham' => $anPham->mactanpham]) }}">
                                <img src="{{ asset('/img/anh-an-pham/' . $anPham->hinhanh) }}" alt="{{ $anPham->tenanpham }}"
                                    class="product__image"
                                    onerror="this.onerror=null; this.src='{{ asset('/img/anh-an-pham/default.jpg') }}';">
                            </a>
                            {{-- <img src="{{ asset('/img/anh-an-pham/' . $anPham->hinhanh) }}" alt="{{ $anPham->tenanpham }}"
                        class="product__image"
                        onerror="this.onerror=null; this.src='{{ asset('/img/anh-anh-pham/default.jpg') }}';"> --}}
                            <div class="product__details__text">
                                {{-- <a href="{{ route('route-khachhang-chitietanpham', ['id' => $anPham->mactanpham]) }}"
                            class="primary-btn">{{ $anPham->tenanpham }}</a> --}}
                                <a href="{{ route('route-khachhang-chitietanpham', ['mactanpham' => $anPham->mactanpham]) }}"
                                    class="primary-btn">{{ $anPham->tenanpham }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <p>Không tìm thấy sản phẩm nào.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Links -->
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    {{ $chitietanpham->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
