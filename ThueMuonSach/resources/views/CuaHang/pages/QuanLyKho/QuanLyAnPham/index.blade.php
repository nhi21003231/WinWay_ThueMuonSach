@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mb-4">Danh sách ấn phẩm</h2>

    <form action="" method="GET" class="hstack gap-2 mb-3">
        <div class="w-25">
            <input class="form-control me-2" type="text" name="tim_kiem" placeholder="Tìm kiếm..." aria-label="Search">
        </div>
        <button class="btn btn-primary me-auto" type="submit">Tìm kiếm</button>
        <a href="{{ route('route-cuahang-quanlykho-quanlyanpham-nhapanpham') }}" class="btn btn-outline-secondary">
            Cập nhật tình trạng ấn phẩm
        </a>
        <a href="{{ route('route-cuahang-quanlykho-quanlyanpham-nhapanpham') }}" class="btn btn-outline-secondary">
            Thanh lý ấn phẩm
        </a>
        <a href="{{ route('route-cuahang-quanlykho-quanlyanpham-nhapanpham') }}" class="btn btn-outline-secondary">
            Nhập ấn phẩm
        </a>
    </form>


    <table class="table table-hover mb-3">
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
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
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
