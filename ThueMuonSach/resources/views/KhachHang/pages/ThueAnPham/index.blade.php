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


<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Card Xác Nhận Thông Tin Thuê -->
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0 d-flex align-items-center justify-content-center">
                        <i class="fas fa-info-circle me-2"></i> Xác Nhận Thông Tin Thuê
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Hướng Dẫn -->
                    <div class="mb-4">
                        <h5><i class="fas fa-hand-point-right me-2 text-warning"></i> Hướng Dẫn</h5>
                        <p>Vui lòng kiểm tra và xác nhận thông tin cá nhân của bạn trước khi tiếp tục thanh toán.</p>
                    </div>

                    <!-- Form Xác Nhận Thông Tin -->
    
                        <form action="{{ route('route-khachhang-thueanpham-suathongtinthue') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="hoten" class="form-label">
                                <i class="fas fa-user"></i> Họ và tên
                            </label>
                            <input type="text" id="hoten" name="hoten" class="form-control" value="{{ $khachHang->hoten ?? '' }}"  readonly placeholder="Nhập họ và tên của bạn">
                        </div>

                        <div class="mb-3">
                            <label for="diachi" class="form-label">
                                <i class="fas fa-map-marker-alt"></i> Địa chỉ
                            </label>
                            <input type="text" id="diachi" name="diachi" class="form-control" value="{{ old('diachi', $khachHang->diachi ?? '') }}" required placeholder="Nhập địa chỉ của bạn">
                            @if ($errors->has('diachi'))
                                <span class="text-danger">{{ $errors->first('diachi') }}</span>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="dienthoai" class="form-label">
                                <i class="fas fa-phone"></i> Số điện thoại
                            </label>
                            <input type="text" id="dienthoai" name="dienthoai" class="form-control" value="{{ old('dienthoai', $khachHang->dienthoai ?? '') }}" required placeholder="Nhập số điện thoại">
                            @if ($errors->has('dienthoai'))
                                <span class="text-danger">{{ $errors->first('dienthoai') }}</span>
                            @endif
                        </div>

                        <!-- Nút Gửi -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-submit btn-lg" >
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
    
@endsection

