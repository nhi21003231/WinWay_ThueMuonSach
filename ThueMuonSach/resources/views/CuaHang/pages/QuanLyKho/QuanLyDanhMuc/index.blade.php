@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mb-4">Danh sách danh mục</h2>

    <form action="" method="GET" class="hstack gap-2 mb-4">
        <div class="w-25">
            <input class="form-control me-2" type="text" name="tim-kiem" placeholder="Tìm kiếm..." aria-label="Search">
        </div>

        <button class="btn btn-primary me-auto" type="submit">Tìm kiếm</button>

        <a href="{{ route('route-cuahang-quanlykho-quanlydanhmuc-themdanhmuc') }}" class="btn btn-secondary">
            Thêm danh mục
        </a>
    </form>


    <table class="table table-hover mb-3 text-center align-middle">
        <thead>
            <tr>
                <th scope="col">Mã danh mục</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Số lượng ấn phẩm</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>row 1</td>
                <td>row 1</td>
                <td>row 1</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>row 2</td>
                <td>row 2</td>
                <td>row 2</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>row 3</td>
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
