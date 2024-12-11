{{-- @extends('KhachHang.layouts.index')
@section('content')
<div class="container">
    <h2>Danh Sách Ấn Phẩm</h2>
    @if(isset($danhMuc))
        <h3>Danh mục: {{ $danhMuc->tendanhmuc }}</h3>
    @endif
    <div class="row">
        @foreach($chitietanpham as $anpham)
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ asset('img/' . $anpham->hinhanh) }}" class="card-img-top" alt="{{ $anpham->tenanpham }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $anpham->tenanpham }}</h5>
                        <p class="card-text">{{ $anpham->tacgia }}</p>
                        @php
                            $dsAnPham = $anpham->dsAnPham;
                            $hoaDonThue = $dsAnPham->chitiethoadonthue->last();
                        @endphp
                        @if($hoaDonThue && $hoaDonThue->hoaDonThue->isHetHang())
                            <form action="{{ route('route-khachhang-dattruocanpham', $dsAnPham->maanpham) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">Đặt trước</button>
                            </form>
                        @else
                            <a href="#" class="btn btn-primary">Chi tiết</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $chitietanpham->links() }}
    </div>
</div>
@endsection --}}
{{-- @extends('KhachHang.layouts.index')

@section('content')
    <h1>Thuê ấn phẩm</h1>
@endsection
 --}}

 @extends('KhachHang.layouts.index')

@section('content')
<style>
    .card-header h4 {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-label i {
        margin-right: 8px;
        color: #0d6efd; /* Màu xanh của Bootstrap */
    }

    .btn-submit {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-submit i {
        margin-right: 8px;
    }

    @media (max-width: 576px) {
        .card-body h5 {
            font-size: 1.2rem;
        }

        .btn-submit {
            width: 100%;
        }
    }
</style>

<h1>Đặt trước ấn phẩm</h1>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Card Xác Nhận Thông Tin Thuê -->
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0 d-flex align-items-center justify-content-center">
                        <i class="fas fa-info-circle me-2"></i> Xác Nhận Thông Tin Đặt Trước
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Hướng Dẫn -->
                    <div class="mb-4">
                        <h5><i class="fas fa-hand-point-right me-2 text-warning"></i> Hướng Dẫn</h5>
                        <p>Vui lòng kiểm tra và xác nhận thông tin cá nhân của bạn trước khi tiếp tục thanh toán.</p>
                    </div>

                    <!-- Form Xác Nhận Thông Tin -->
                    {{-- <form action="{{ route('update-info.post') }}" method="POST" class="needs-validation" novalidate> --}}
                        {{-- <form action="{{ route('dattruoc-suathongtindattruoc', ['mactanpham' => $anPham->mactanpham]) }}" method="POST" class="needs-validation" novalidate> --}}
                            <form action="{{ route('route-khachhang-hoadondattruoc', ['mactanpham' => $anPham->mactanpham]) }}" method="POST" class="needs-validation" novalidate>
                            {{-- <form action="{{ route('route-khachhang-thueanpham-xulyhoadon') }}" method="POST"> --}}
                            @csrf
                            <div class="mb-3">
                                <label for="hoten" class="form-label">
                                    <i class="fas fa-user"></i> Họ và tên
                                </label>
                                <input type="text" id="hoten" name="hoten" class="form-control" value="{{ $khachHang->hoten ?? '' }}" readonly placeholder="Nhập họ và tên của bạn">
                            </div>  
                            <div class="mb-3">
                                <label for="diachi" class="form-label">
                                    <i class="fas fa-map-marker-alt"></i> Địa chỉ
                                </label>
                                <input type="text" id="diachi" name="diachi" class="form-control" value="{{ $khachHang->diachi ?? '' }}" required placeholder="Nhập địa chỉ của bạn">
                            </div>
                            <div class="mb-4">
                                <label for="sdt" class="form-label">
                                    <i class="fas fa-phone"></i> Số điện thoại
                                </label>
                                <input type="text" id="dienthoai" name="dienthoai" class="form-control" value="{{ $khachHang->dienthoai ?? '' }}" required placeholder="Nhập số điện thoại">
                            </div>
                        <div>
                        </div>
                            <!-- Nút Gửi -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-submit btn-lg">
                                    <i class="fas fa-check-circle me-2"></i> Cập nhật và tiếp tục thanh toán
                                </button>
                            </div>
                        </form>
                </div>
                <div class="card-footer text-muted text-center">
                    <small>Chúng tôi cam kết bảo mật thông tin của bạn.</small>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @if($khachHang)
    <p>Khách hàng: {{ $khachHang->hoten }}</p>
@else
    <p>Không tìm thấy thông tin khách hàng.</p>
@endif --}}
    
@endsection

