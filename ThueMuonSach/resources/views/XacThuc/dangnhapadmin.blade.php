@extends('app')

@section('main')
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Đăng nhập cửa hàng</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('route-dangnhap') }}">

                        @csrf

                        <div class="mb-3">
                            <label for="tentaikhoan" class="form-label">Tài khoản</label>
                            <input type="text" name="tentaikhoan" class="form-control" id="tentaikhoan"
                                placeholder="Nhập tên tài khoản" required>
                        </div>

                        <div class="mb-3">
                            <label for="matkhau" class="form-label">Mật khẩu</label>
                            <input type="password" name="matkhau" class="form-control" id="matkhau"
                                placeholder="Nhập mật khẩu" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
