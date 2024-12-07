{{-- @extends('KhachHang.layouts.index')

@section('content')
    <h1>Chi tiết ấn phẩm</h1>
@endsection --}}
{{-- lộc --}}

@extends('KhachHang.layouts.index')
@section('content')
    <h1>Chi tiết ấn phẩm</h1>
    <div class="container book-detail-container mb-5">
        <div class="row">
            <!-- Phần bên trái: Hình ảnh của ấn phẩm -->
            <div class="col-md-5 text-center">
                <img src="{{ asset('img/anh-an-pham/' . $anPham->chiTietAnPham->hinhanh) }}"
                    alt="{{ $anPham->chiTietAnPham->tenanpham }}" class="chitiet-image">
            </div>

            <!-- Phần bên phải: Thông tin ấn phẩm -->
            <div class="col-md-7 book-info">
                <h1 class="book-title">{{ $anPham->chiTietAnPham->tenanpham }}</h1>
                {{-- <p class="book-author"><strong>Tác giả:</strong> {{ $anPham->chiTietAnPham->tacgia }}</p>
               <p class="book-year"><strong>Năm xuất bản:</strong> {{ $anPham->chiTietAnPham->namxuatban }}</p>
               <p class="book-catagory"><strong>Danh mục:</strong> {{ $anPham->chiTietAnPham->danhMuc->tendanhmuc }}</p> --}}
                <p class="book-price"><strong>Giá cọc:</strong> {{ number_format($anPham->chiTietAnPham->giathue, 0, ',', '.') }} VND</p>
                <p class="book-price"><strong>Giá thuê:</strong> {{ number_format($anPham->chiTietAnPham->giacoc, 0, ',', '.') }} VND</p>
                <p class="book-status">
                    <strong>Trạng thái:</strong>
                    {{-- <span class="{{ $anPham->dathue ? 'text-danger' : 'text-success' }}">
                               {{ $anPham->dathue ? 'Đã thuê' : 'Chưa thuê' }}
                   </span> --}}
                    <!-- Hiển thị trạng thái "Còn hàng" nếu có ít nhất 1 cuốn chưa thuê -->
                    @if ($soLuongChuaThue > 0)
                        <span class="stock-status text-success"><strong>Còn hàng</strong></span>
                    @else
                        <span class="stock-status text-danger"><strong>Hết hàng</strong></span>
                    @endif
                </p>

                <!-- Nút thêm vào giỏ hàng hoặc đặt trước tùy theo tình trạng -->
                @if ($soLuongChuaThue > 0)
                    <form action="{{ route('route-khachhang-themvaogiohang', ['maanpham' => $anPham->maanpham]) }}"
                        method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn-custom btn-add-to-cart mt-3">
                            <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                        </button>
                    </form>
                @else
                    {{-- <form id="preorder-form-{{ $anpham->maanpham }}" action="{{ route('preorder.save', ['maanpham' => $anpham->maanpham]) }}" method="POST" class="d-inline"> --}}
                    {{-- @csrf
                    <button type="button" class="btn-custom btn-preorder mt-3">
                        Đặt trước
                    </button>
                    </form> --}}
                    {{-- <form action="{{ route('route-khachhang-hienthiformdattruoc', ['mactanpham' => $anPham->mactanpham]) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn-custom btn-preorder mt-3">
                            Đặt trước
                        </button>
                    </form> --}}
                    <a href="{{ route('route-khachhang-hienthiformdattruoc', ['mactanpham' => $anPham->mactanpham]) }}" class="btn-custom btn-preorder mt-3">
                        Đặt trước
                    </a>
                @endif
            </div>
        </div>

        <div class="a1">
            <div class="product-info">
                <div class="tab-buttons">
                    <button id="info-tab" class="tab-btn active" onclick="showTab('info')">Thông tin</button>
                    <button id="review-tab" class="tab-btn" onclick="showTab('review')">Đánh giá</button>
                </div>

                <!-- Nội dung Thông tin -->
                <div id="info-content" class="tab-content active">
                    <h3>MÔ TẢ SẢN PHẨM</h3>

                    <p class="tab-book-catagory"><strong>Danh mục:</strong>
                        {{ $anPham->chiTietAnPham->danhMuc->tendanhmuc }}</p>
                    <p class="tab-book-author"><strong>Tác giả:</strong> {{ $anPham->chiTietAnPham->tacgia }}</p>
                    <p class="tab-book-year"><strong>Năm xuất bản:</strong> {{ $anPham->chiTietAnPham->namxuatban }}</p>
                    <div class="tab-book-description">
                        <p><strong>Mô tả:</strong></p>
                        <p>{!! nl2br(e($anPham->chiTietAnPham->danhMuc->mota)) !!}</p>
                    </div>
                </div>
                {{-- nhí làm cái này --}}
                <!-- Nội dung Đánh giá -->
                <div id="review-content" class="tab-content">
                    <h3>Đánh giá từ người dùng</h3>
                    @php
                        $visibleDanhgias = $danhGias->where('trangthai', 1);
                    @endphp

                    @if($visibleDanhgias->isEmpty())
                        <p>Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá sản phẩm này!</p>
                    @else
                        @foreach ($visibleDanhgias as $danhGia)
                            <div class="review p-3 mb-3 border rounded">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-1"><strong>{{ $danhGia->khachHang->hoten }}</strong></p>
                                    <p class="mb-1 text-muted">{{ $danhGia->created_at->format('d/m/Y') }}</p>
                                </div>
                                <p class="mb-1">{{ $danhGia->binhluan }}</p>
                                <div class="text-warning">
                                    @for ($i = 0; $i < $danhGia->sosao; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                    @for ($i = $danhGia->sosao; $i < 5; $i++)
                                        <i class="far fa-star"></i>
                                    @endfor
                                </div>
                                <hr>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @endsection
