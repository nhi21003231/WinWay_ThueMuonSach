@extends('app')

@section('main')
    <div class="min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-md-8">
                    <div class="card shadow-lg p-4 mb-5 bg-white rounded">
                        <div class="row">
                            <div class="col-md-5 d-flex justify-content-center align-items-center">
                                <a href="{{ route('route-khachhang-trangchu') }}">
                                    <img src="{{ asset('img/logo1.png') }}" alt="Logo" class="img-fluid"
                                        style="max-width: 70%;">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="text-center text-black mb-4">
                                    <h4><i class="fas fa-user-lock"></i> Đăng nhập</h4>
                                </div>
                                <div class="card-body p-0">
                                    <form method="POST" action="{{ route('route-dangnhap') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="tentaikhoan" class="form-label">Tài khoản</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                                <input type="text" name="tentaikhoan" class="form-control" id="tentaikhoan"
                                                    placeholder="Nhập tên tài khoản" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="matkhau" class="form-label">Mật khẩu</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                                                <input type="password" name="matkhau" class="form-control" id="matkhau"
                                                    placeholder="Nhập mật khẩu" required>
                                            </div>
                                        </div>

                                        @if ($errors->has('dangnhap'))
                                            <div class="alert alert-danger text-center">
                                                <strong>{{ $errors->first('dangnhap') }}</strong>
                                            </div>
                                        @endif

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-xacthuc btn-block text-white">
                                                <i class="fas fa-sign-in-alt"></i> Đăng nhập
                                            </button>
                                        </div>

                                        <div class="text-center mt-3">
                                            <small>Chưa có tài khoản? <a href="{{ route('route-dangky') }}"
                                                    class="text-link">Đăng ký</a></small>
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
