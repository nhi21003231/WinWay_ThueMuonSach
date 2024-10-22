@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mb-4">Nhập ấn phẩm đã có</h2>

    <form action="" method="GET" class="hstack gap-2 mb-4">
        <div class="w-25">
            <input class="form-control me-2" type="text" name="tim-kiem" placeholder="Tìm kiếm..." aria-label="Search">
        </div>

        <button class="btn btn-primary me-auto" type="submit">Tìm kiếm</button>
    </form>


    <form method="GET" action="">
        <table class="table text-center mb-0">
            <thead>
                <tr>
                    <th scope="col" width="">Chọn</th>
                    <th scope="col" width="">Mã ấn phẩm</th>
                    <th scope="col" width="">Tên ấn phẩm</th>
                    <th scope="col" width="">Tác giả</th>
                    <th scope="col" width="">Danh mục</th>
                    <th scope="col" width="">Hình ảnh</th>
                    <th scope="col" width="">Tình trạng</th>
                    <th scope="col" width="">Số lượng</th>
                </tr>
            </thead>
        </table>

        <div style="overflow-y: auto; max-height: 500px;"  class="scroll-container">
            <table class="table table-hover mb-3 text-center align-middle">
                <tbody>
                    <tr>
                        <td><input class="form-check-input " type="checkbox" value=""></td>
                        <th scope="row">1</th>
                        <td>row 1</td>
                        <td>row 1</td>
                        <td>row 1</td>
                        <td>
                            <img src="{{ asset('img/anh-an-pham/nha-gia-kim.jpg') }}" width="100" height="100"
                                alt="">
                        </td>
                        <td width="200">
                            <select class="form-select" name="tinh-trang" id="tinh-trang">
                                <option value="Mới" selected>Mới</option>
                                <option value="Cũ">Cũ</option>
                                <option value="Hư hỏng">Hư hỏng</option>
                            </select>
                        </td>
                        <td width="100">
                            <input type="number" class="form-control text-center" name="so-luong" id="so-luong"
                                value="0">
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
        </div>

        <div class="row g-5 mb-5 pt-4 w-75 mx-auto">
            <div class="col-6">
                <a href="{{ route('route-cuahang-quanlykho-quanlyanpham') }}" class="btn btn-danger w-100">Hủy</a>
            </div>
            <div class="col-6">
                <button class="btn btn-success w-100">Nhập</button>
            </div>
        </div>
    </form>
@endsection
