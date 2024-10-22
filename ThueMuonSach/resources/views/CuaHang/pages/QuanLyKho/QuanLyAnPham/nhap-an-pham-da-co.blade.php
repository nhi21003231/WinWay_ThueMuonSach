@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mb-4">Danh sách ấn phẩm</h2>

    <form action="" method="GET" class="hstack gap-2 mb-4">
        <div class="w-25">
            <input class="form-control me-2" type="text" name="tim-kiem" placeholder="Tìm kiếm..." aria-label="Search">
        </div>

        <button class="btn btn-primary me-auto" type="submit">Tìm kiếm</button>
    </form>


    <table class="table table-hover mb-3 text-center">
        <thead>
            <tr>
                <th scope="col">Chọn</th>
                <th scope="col">Mã ấn phẩm</th>
                <th scope="col">Tên ấn phẩm</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Số lượng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input class="form-check-input " type="checkbox" value=""></td>
                <th scope="row">1</th>
                <td>row 1</td>
                <td>row 1</td>
                <td>row 1</td>
                <td>
                    <img src="{{ asset('img/anh-an-pham/nha-gia-kim.jpg') }}" width="100" height="100" alt="">
                </td>
                <td width="200">
                    <select class="form-select" name="tinh-trang" id="tinh-trang">
                        <option value="Mới" selected>Mới</option>
                        <option value="Cũ">Cũ</option>
                        <option value="Hư hỏng">Hư hỏng</option>
                    </select>
                </td>
                <td width="100">
                    <input type="number" class="form-control text-center" name="so-luong" id="so-luong" value="0">
                </td>
            </tr>
            <tr>
                <td><input class="form-check-input " type="checkbox" value=""></td>
                <th scope="row">2</th>
                <td>row 2</td>
                <td>row 2</td>
                <td>row 2</td>
                <td>
                    <img src="{{ asset('img/anh-an-pham/phat-hoa-chan-dung-ke-pham-toi.jpg') }}" width="100"
                        height="100" alt="">
                </td>
                <td>row 2</td>
                <td>row 2</td>
            </tr>
            <tr>
                <td><input class="form-check-input " type="checkbox" value=""></td>
                <th scope="row">3</th>
                <td>row 3</td>
                <td>row 3</td>
                <td>row 3</td>
                <td>
                    <img src="{{ asset('img/anh-an-pham/su-im-lang-cua-bay-cuu.jpg') }}" width="100" height="100"
                        alt="">
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
