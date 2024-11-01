@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mb-4">Cập nhật tình trạng ấn phẩm</h2>

    <div class="hstack gap-2 mb-4">
        <div class="w-25">
            <input id="ba-timkiem" class="form-control me-2" type="text" placeholder="Tìm kiếm..." aria-label="Search">
        </div>

        <button id="ba-nuttimkiem" class="btn btn-primary me-auto">Tìm kiếm</button>
    </div>


    <form method="POST" action="{{ route('route-cuahang-quanlykho-quanlyanpham-capnhattinhtrang') }}">

        @csrf

        <div class="ba-scroll-container ba-fixed-header-table mb-4">
            <table class="table mb-3 text-center align-middle align-middle" id="ba-danhsach">
                <thead>
                    <tr class="table-success">
                        <th scope="col" width="14%">Tên ấn phẩm</th>
                        <th scope="col" width="9%">Tác giả</th>
                        <th scope="col" width="11%">Danh mục</th>
                        <th scope="col" width="13%">Năm xuất bản</th>
                        <th scope="col" width="9%">Hình ảnh</th>
                        <th scope="col" width="9%">Giá thuê</th>
                        <th scope="col" width="9%">Giá cọc</th>
                        <th scope="col" width="13%">Vị trí</th>
                        <th scope="col" width="13%">Tình trạng</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($anPhams as $anPham)
                        <tr style="cursor: pointer">
                            <td width="12%">{{ $anPham->chiTietAnPham->tenanpham }}</td>
                            <td width="9%">{{ $anPham->chiTietAnPham->tacgia }}</td>
                            <td width="11%">{{ $anPham->chiTietAnPham->danhMuc->tendanhmuc }}</td>
                            <td width="13%">{{ $anPham->chiTietAnPham->namxuatban }}</td>
                            <td width="9%">
                                <img src="{{ asset('img/anh-an-pham/' . $anPham->chiTietAnPham->hinhanh) }}"
                                    class="img-fluid" width="100" height="100"
                                    alt="{{ $anPham->chiTietAnPham->tenanpham }}">
                            </td>
                            <td>{{ $anPham->giathue > 0 ? number_format($anPham->giathue, 0, ',', '.') . 'VNĐ' : 'Chưa định giá' }}
                            </td>
                            <td>{{ $anPham->giacoc > 0 ? number_format($anPham->giacoc, 0, ',', '.') . 'VNĐ' : 'Chưa định giá' }}
                            </td>
                            <td width="13%">{{ $anPham->vitri }}</td>
                            <td width="15%">
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
                            <td colspan="10" class="py-5">Không có ấn phẩm tồn kho nào để cập nhật.</td>
                        </tr>
                    @endforelse
                </tbody>

                <tfoot id="khong-an-pham" style="display: none">
                    <tr>
                        <td colspan="10" class="py-5">Không có ấn phẩm nào.
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="row g-5 mb-3 w-75 mx-auto">
            <div class="col-6">
                <a href="{{ route('route-cuahang-quanlykho-quanlyanpham') }}" class="btn btn-danger w-100">Hủy</a>
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
