@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mb-4">Nhập ấn phẩm</h2>

    <form action="" method="GET" class="mb-3">
        <div class="w-25">
            <input class="form-control me-2" type="text" name="tim_kiem" placeholder="Tìm kiếm..." aria-label="Search">
        </div>
        <div class="me-auto">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </div>
        <div class="">
            <a href="{{ route('route-cuahang-quanlykho-quanlyanpham-nhapanpham') }}" class="btn btn-outline-secondary">
                Cập nhật tình trạng ấn phẩm
            </a>
        </div>
        <div class="">
            <a href="{{ route('route-cuahang-quanlykho-quanlyanpham-nhapanpham') }}" class="btn btn-outline-secondary">
                Thanh lý ấn phẩm
            </a>
        </div>
        <div class="">
            <a href="{{ route('route-cuahang-quanlykho-quanlyanpham-nhapanpham') }}" class="btn btn-outline-secondary">
                Nhập ấn phẩm
            </a>
        </div>
    </form>
@endsection
