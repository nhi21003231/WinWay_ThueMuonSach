@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mb-4">Danh sách ấn phẩm</h2>

    <form action="" method="GET" class="hstack gap-2 mb-4">
        <div class="w-25">
            <input class="form-control me-2" type="text" name="tim-kiem" placeholder="Tìm kiếm..." aria-label="Search">
        </div>

        <button class="btn btn-primary me-auto" type="submit">Tìm kiếm</button>

        <a href="{{ route('route-cuahang-quanlykho-quanlyanpham-capnhattinhtrang') }}" class="btn btn-secondary">
            Cập nhật tình trạng ấn phẩm
        </a>

        <a href="{{ route('route-cuahang-quanlykho-quanlyanpham-thanhlyanpham') }}" class="btn btn-secondary">
            Thanh lý ấn phẩm
        </a>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Nhập ấn phẩm
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('route-cuahang-quanlykho-quanlyanpham-nhapanphammoi') }}">Nhập ấn phẩm mới</a></li>
                <li><a class="dropdown-item" href="{{ route('route-cuahang-quanlykho-quanlyanpham-nhapanphamdaco') }}">Nhập ấn phẩm đã có</a></li>
            </ul>
        </div>
    </form>


    <table class="table table-hover mb-3 text-center align-middle">
        <thead>
            <tr>
                <th scope="col">Mã ấn phẩm</th>
                <th scope="col">Tên ấn phẩm</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Đã thuê</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>row 1</td>
                <td>row 1</td>
                <td>row 1</td>
                <td>
                    <img src="{{ asset('img/anh-an-pham/nha-gia-kim.jpg') }}" width="100" height="100" alt="">
                </td>
                <td>row 1</td>
                <td>row 1</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>row 2</td>
                <td>row 2</td>
                <td>row 2</td>
                <td>
                    <img src="{{ asset('img/anh-an-pham/phat-hoa-chan-dung-ke-pham-toi.jpg') }}" width="100" height="100" alt="">
                </td>
                <td>row 2</td>
                <td>row 2</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>row 3</td>
                <td>row 3</td>
                <td>row 3</td>
                <td>
                    <img src="{{ asset('img/anh-an-pham/su-im-lang-cua-bay-cuu.jpg') }}" width="100" height="100" alt="">
                </td>
                <td>row 3</td>
                <td>row 3</td>
            </tr>
        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
