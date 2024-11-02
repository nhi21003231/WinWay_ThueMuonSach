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

    <div class="ba-scroll-container ba-fixed-header-table mb-4">
        <table class="table text-center align-middle" id="ba-danhsach">
            <thead>
                <tr class="table-primary align-middle">
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

            <tbody>
                @forelse ($anPhams as $anPham)
                    <tr>
                        <td class="search-column">{{ $anPham->chiTietAnPham->tenanpham }}</td>
                        <td class="search-column">{{ $anPham->chiTietAnPham->tacgia }}</td>
                        <td class="search-column">{{ $anPham->chiTietAnPham->danhMuc->tendanhmuc }}</td>
                        <td class="search-column">{{ $anPham->chiTietAnPham->namxuatban }}</td>
                        <td>
                            <div class="ba-image-container">
                                <img src="{{ asset('img/anh-an-pham/' . $anPham->chiTietAnPham->hinhanh) }}"
                                    class="img-fluid" alt="{{ $anPham->chiTietAnPham->tenanpham }}">
                            </div>
                        </td>
                        <td class="search-column">
                            {{ $anPham->giathue > 0 ? number_format($anPham->giathue, 0, ',', '.') . 'VNĐ' : 'Chưa định giá' }}
                        </td>
                        <td class="search-column">
                            {{ $anPham->giacoc > 0 ? number_format($anPham->giacoc, 0, ',', '.') . 'VNĐ' : 'Chưa định giá' }}
                        </td>
                        <td class="search-column">{{ $anPham->vitri }}</td>
                        <td class="search-column">{{ $anPham->tinhtrang }}</td>
                        <td class="search-column">{{ $anPham->dathue ? 'Đã thuê' : 'Chưa thuê' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="py-5">Không có ấn phẩm tồn kho nào để thanh lý.</td>
                    </tr>
                @endforelse
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="10" class="py-5" id="khong-an-pham" style="display: none">Không có ấn phẩm nào.
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        timKiemAnPham();
    });
</script>
