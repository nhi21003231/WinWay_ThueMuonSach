{{-- @extends('KhachHang.layouts.index')

@section('content')
    <h1>Chi tiết ấn phẩm</h1>
@endsection --}}
{{-- lộc --}}

@extends('KhachHang.layouts.index')
@section('content')
    <div class="section-title mt-4 pt-3 mb-5">
        <h2 class="text-center fw-bold">Chi tiết ấn phẩm</h2>
    </div>

    <div class="container book-detail-container pt-4 mb-5">
        <div class="row justify-content-center">
            <!-- Phần bên trái: Hình ảnh của ấn phẩm -->
            <div class="col-md-5 text-center">
                <div style="width:400px; height: 400px; margin: auto">
                    <img src="{{ asset('img/anh-an-pham/' . $anPham->chiTietAnPham->hinhanh) }}"
                        alt="{{ $anPham->chiTietAnPham->tenanpham }}" class="" style="object-fit: contain; width: 100%;">
                </div>
            </div>

            <!-- Phần bên phải: Thông tin ấn phẩm -->
            <div class="col-md-7 book-info">
                <h1 class="book-title">{{ $anPham->chiTietAnPham->tenanpham }}</h1>
                {{-- <p class="book-author"><strong>Tác giả:</strong> {{ $anPham->chiTietAnPham->tacgia }}</p>
               <p class="book-year"><strong>Năm xuất bản:</strong> {{ $anPham->chiTietAnPham->namxuatban }}</p>
               <p class="book-catagory"><strong>Danh mục:</strong> {{ $anPham->chiTietAnPham->danhMuc->tendanhmuc }}</p> --}}
                <p class="book-price"><strong>Giá cọc:</strong>
                    {{ number_format($anPham->chiTietAnPham->giacoc, 0, ',', '.') }} VND</p>
                <p class="book-price"><strong>Giá thuê:</strong>
                    {{ number_format($anPham->chiTietAnPham->giathue, 0, ',', '.') }} VND</p>
                <p class="book-status">
                    <strong>Trạng thái:</strong>
                    @if ($soLuongChuaThue > 0)
                        <span class="stock-status text-success"><strong>Còn hàng</strong></span>
                    @else
                        <span class="stock-status text-danger"><strong>Hết hàng</strong></span>
                    @endif
                </p>

                <!-- Nút thêm vào giỏ hàng hoặc đặt trước tùy theo tình trạng -->
                @if ($soLuongChuaThue > 0)
                    <form action="{{ route('route-khachhang-themvaogiohang', ['mactanpham' => $anPham->mactanpham]) }}"
                        method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn-custom btn-add-to-cart mt-3">
                            <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                        </button>
                    </form>
                @else
                    <a href="{{ URL::to('dat-truoc-an-pham/' . $anPham->mactanpham . '') }}"
                        class="btn-custom btn-preorder mt-3">
                        Đặt trước
                    </a>
                @endif

                <div class="a1 mt-5">
                    <div class="product-info">
                        <div class="tab-buttons">
                            <button id="info-tab" class="tab-btn active" onclick="showTab('info')">Thông tin</button>
                            <button id="review-tab" class="tab-btn" onclick="showTab('review')">Đánh giá</button>
                        </div>

                        <!-- Nội dung Thông tin -->
                        <div id="info-content" class="tab-content active mt-3">
                            {{-- <h3>MÔ TẢ SẢN PHẨM</h3> --}}
                            <h1 class="book-title">Mô tả sản phẩm</h1>

                            <p class="tab-book-catagory"><strong>Danh mục:</strong>
                                {{ $anPham->chiTietAnPham->danhMuc->tendanhmuc }}</p>
                            <p class="tab-book-author"><strong>Tác giả:</strong> {{ $anPham->chiTietAnPham->tacgia }}</p>
                            <p class="tab-book-year"><strong>Năm xuất bản:</strong> {{ $anPham->chiTietAnPham->namxuatban }}
                            </p>
                            <div class="tab-book-description">
                                <p><strong>Mô tả: </strong>{!! nl2br(e($anPham->chiTietAnPham->danhMuc->mota)) !!}</p>
                                {{-- <p>{!! nl2br(e($anPham->chiTietAnPham->danhMuc->mota)) !!}</p> --}}
                            </div>
                        </div>
                        {{-- nhí làm cái này --}}
                        <!-- Nội dung Đánh giá -->
                        <div id="review-content" class="tab-content">
                            <h3>Đánh giá từ người dùng</h3>
                            @php
                                $visibleDanhgias = $danhGias->where('trangthai', 1);
                            @endphp

                            @if ($visibleDanhgias->isEmpty())
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
            </div>
        </div>
    @endsection
