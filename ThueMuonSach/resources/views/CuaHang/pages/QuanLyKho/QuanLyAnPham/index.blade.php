@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mb-4">Danh sách ấn phẩm</h2>

    <div class="hstack gap-2 mb-4">
        <div class="w-25">
            <input id="ba-timkiem" class="form-control me-2" type="text" placeholder="Tìm kiếm..." aria-label="Search">
        </div>

        <button id="ba-nuttimkiem" class="btn btn-primary me-auto">Tìm kiếm</button>

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
                <li><a class="dropdown-item" href="{{ route('route-cuahang-quanlykho-quanlyanpham-nhapanphammoi') }}">Nhập
                        ấn phẩm mới</a></li>
                <li><a class="dropdown-item" href="{{ route('route-cuahang-quanlykho-quanlyanpham-nhapanphamdaco') }}">Nhập
                        ấn phẩm đã có</a></li>
            </ul>
        </div>
    </div>

    <table class="table table-hover mb-0 text-center align-middle">
        <thead>
            <tr>
                <th scope="col" width="12%">Tên ấn phẩm</th>
                <th scope="col" width="9%">Tác giả</th>
                <th scope="col" width="9%">Danh mục</th>
                <th scope="col" width="15%">Năm xuất bản</th>
                <th scope="col" width="9%">Hình ảnh</th>
                <th scope="col" width="9%">Giá thuê</th>
                <th scope="col" width="9%">Giá cọc</th>
                <th scope="col" width="9%">Vị trí</th>
                <th scope="col" width="10%">Tình trạng</th>
                <th scope="col" width="9%">Đã thuê</th>
            </tr>
        </thead>
    </table>

    <div style="overflow-y: auto; max-height: 60vh;" class="scroll-container-ba">
        <table class="table table-hover mb-3 text-center align-middle" id="ba-danhsach">
            <tbody>
                @foreach ($anPhams as $anPham)
                    <tr>
                        <td>{{ $anPham->chiTietAnPham->tenanpham }}</td>
                        <td>{{ $anPham->chiTietAnPham->tacgia }}</td>
                        <td>{{ $anPham->chiTietAnPham->danhMuc->tendanhmuc }}</td>
                        <td>{{ $anPham->chiTietAnPham->namxuatban }}</td>
                        <td>
                            <img src="{{ asset('img/anh-an-pham/' . $anPham->chiTietAnPham->hinhanh) }}" class="img-fluid"
                                width="100" height="100" alt="" data-bs-toggle="modal"
                                data-bs-target="#modalAnhPhongTo" style="cursor: pointer"
                                onclick="document.getElementById('imgPhongTo').src = '{{ asset('img/anh-an-pham/' . $anPham->chiTietAnPham->hinhanh) }}';">
                        </td>
                        <td>{{ number_format($anPham->giathue, 0, ',', '.') }} VNĐ</td>
                        <td>{{ number_format($anPham->giacoc, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $anPham->vitri }}</td>
                        <td>{{ $anPham->tinhtrang }}</td>
                        <td>{{ $anPham->dathue ? 'Đã thuê' : 'Chưa thuê' }}</td>
                    </tr>
                @endforeach
                <tr id="khong-an-pham" style="display: none;">
                    <td colspan="10" class="py-5">Không có ấn phẩm nào.</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        timKiemAnPham();
    });
</script>
