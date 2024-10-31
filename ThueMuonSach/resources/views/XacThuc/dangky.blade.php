@extends('app')

@section('main')

    <div class="min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-md-8">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <a href="{{route('route-khachhang-trangchu')}}">
                                    <img src="{{ asset('img/logo1.png') }}" alt="Logo" style="width: 100%; max-width: 150px;">
                                </a>
                                
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="text-center text-black mb-4">
                                        <h4><i class="fas fa-user-plus"></i> Đăng ký tài khoản</h4>
                                    </div>

                                    
                                    <form method="POST" action="{{ route('route-dangky') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Tên đăng nhập</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                                <input type="text" name="tendangnhap" class="form-control" id="username"
                                                    placeholder="Tên đăng nhập" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="fullname" class="form-label">Họ tên</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                                <input type="text" name="hoten" class="form-control" id="fullname"
                                                    placeholder="Nhập họ tên" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Số điện thoại</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-phone"></i></span>
                                                <input type="text" name="sodienthoai" class="form-control" id="phone"
                                                    placeholder="Số điện thoại" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Mật khẩu</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                                                <input type="password" name="matkhau" class="form-control" id="password"
                                                    placeholder="Nhập mật khẩu" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                                                <input type="password" name="xacnhanmatkhau" class="form-control" id="confirm_password"
                                                    placeholder="Nhập lại mật khẩu" required>
                                            </div>
                                        </div>

                                        @if ($errors->any())
                                            <div class="alert alert-danger text-center">
                                                <strong>{{ $errors->first() }}</strong>
                                            </div>
                                        @endif

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-xacthuc btn-block">
                                                <i class="fas fa-user-plus"></i> Đăng ký
                                            </button>
                                        </div>

                                        <div class="text-center mt-3">
                                            <small>Đã có tài khoản? <a href="{{ route('route-dangnhap') }}" class="text-link">Đăng nhập</a></small>
                                        </div>
                                    </form>
                                </div>
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
