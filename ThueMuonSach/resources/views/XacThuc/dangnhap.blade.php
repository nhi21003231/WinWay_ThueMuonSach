@extends('app')

@section('main')
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Đăng nhập</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('route-dang-nhap') }}">

                        @csrf

                        <div class="mb-3">
                            <label for="taikhoan" class="form-label">Tài khoản</label>
                            <input type="text" name="ten_tai_khoan" class="form-control" id="taikhoan"
                                placeholder="Nhập tên tài khoản">
                        </div>

                        <div class="mb-3">
                            <label for="matkhau" class="form-label">Mật khẩu</label>
                            <input type="password" name="mat_khau" class="form-control" id="matkhau"
                                placeholder="Nhập mật khẩu">
                        </div>

                        @if ($errors->has('dangnhap'))
                            <div class="mb-3">
                                <strong>{{ $errors->first('dangnhap') }}</strong>
                            </div>
                        @endif

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
