@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mb-4">Cập nhật tình trạng ấn phẩm</h2>

    <div class="hstack gap-2 mb-4">
        <div class="w-25">
            <input id="ba-timkiem" class="form-control me-2" type="text" placeholder="Tìm kiếm..." aria-label="Search">
        </div>

        <button id="ba-nuttimkiem" class="btn btn-primary me-auto">Tìm kiếm</button>
    </div>


    <form method="POST" action="{{ route('route-cuahang-quanlykho-quanlytonkho-capnhattinhtrang') }}">

        @csrf

        <div class="ba-scroll-container ba-fixed-header-table mb-4">
            <table class="table mb-3 text-center align-middle" id="ba-danhsach">
                <thead>
                    <tr class="table-primary align-middle">
                        <th scope="col" width="9%">Mã ấn phẩm</th>
                        <th scope="col" width="13%">Tên ấn phẩm</th>
                        <th scope="col" width="8%">Tác giả</th>
                        <th scope="col" width="10%">Danh mục</th>
                        <th scope="col" width="14%">Năm xuất bản</th>
                        <th scope="col" width="8%">Hình ảnh</th>
                        <th scope="col" width="8%">Giá thuê</th>
                        <th scope="col" width="8%">Giá cọc</th>
                        <th scope="col" width="12%">Vị trí</th>
                        <th scope="col" width="12%">Tình trạng</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($anPhams as $anPham)
                        <tr style="cursor: pointer">
                            <td class="search-column">{{ $anPham->maanpham }}</td>
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
                                {{ $anPham->chiTietAnPham->giathue > 0 ? number_format($anPham->chiTietAnPham->giathue, 0, ',', '.') . 'VNĐ' : 'Chưa định giá' }}
                            </td>
                            <td class="search-column">
                                {{ $anPham->chiTietAnPham->giacoc > 0 ? number_format($anPham->chiTietAnPham->giacoc, 0, ',', '.') . 'VNĐ' : 'Chưa định giá' }}
                            </td>
                            <td class="search-column">{{ $anPham->vitri }}</td>
                            <td>
                                <input type="hidden" name="anpham_ids[]" value="{{ $anPham->maanpham }}">
                                <select class="form-select" name="tinh_trang[{{ $anPham->maanpham }}]">
                                    <option value="Mới" {{ $anPham->tinhtrang === 'Mới' ? 'selected' : '' }}>Mới
                                    </option>
                                    <option value="Cũ" {{ $anPham->tinhtrang === 'Cũ' ? 'selected' : '' }}>Cũ</option>
                                    <option value="Hư hỏng" {{ $anPham->tinhtrang === 'Hư hỏng' ? 'selected' : '' }}>Hư
                                        hỏng</option>
                                </select>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="20" class="py-5">Không có ấn phẩm tồn kho nào để cập nhật.</td>
                        </tr>
                    @endforelse
                </tbody>

                <tfoot id="khong-an-pham" style="display: none">
                    <tr>
                        <td colspan="20" class="py-5">Không có ấn phẩm nào.
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="row g-5 mb-3 w-75 mx-auto">
            <div class="col-6">
                <a href="{{ route('route-cuahang-quanlykho-quanlytonkho') }}" class="btn btn-danger w-100">Hủy</a>
            </div>
            <div class="col-6">
                <button class="btn btn-success w-100">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var anPhams = @json($anPhams);

        if (anPhams.length !== 0) {
            toMauDong();
            timKiemAnPham();
        }
    });
</script>
