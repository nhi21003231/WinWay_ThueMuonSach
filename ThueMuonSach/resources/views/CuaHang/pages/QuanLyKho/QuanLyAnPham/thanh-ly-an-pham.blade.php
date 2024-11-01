@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mb-4">Thanh lý ấn phẩm</h2>

    <div class="hstack gap-2 mb-4">
        <div class="w-25">
            <input id="ba-timkiem" class="form-control me-2" type="text" placeholder="Tìm kiếm..." aria-label="Search">
        </div>

        <button id="ba-nuttimkiem" class="btn btn-primary me-auto">Tìm kiếm</button>
    </div>

    <form method="POST" action="{{ route('route-cuahang-quanlykho-quanlyanpham-thanhlyanpham') }}">
        @csrf

        <div class="ba-scroll-container ba-fixed-header-table mb-4">
            <table class="table text-center align-middle" id="ba-danhsach">
                <thead>
                    <tr class="table-success table-bordered align-middle">
                        <th scope="col" width="12%">Tên ấn phẩm</th>
                        <th scope="col" width="9%">Tác giả</th>
                        <th scope="col" width="9%">Danh mục</th>
                        <th scope="col" width="15%">Năm xuất bản</th>
                        <th scope="col" width="9%">Hình ảnh</th>
                        <th scope="col" width="9%">Giá thuê</th>
                        <th scope="col" width="9%">Giá cọc</th>
                        <th scope="col" width="9%">Vị trí</th>
                        <th scope="col" width="10%">Tình trạng</th>
                        <th scope="col" width="9%">Thanh lý</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($anPhams as $anPham)
                        <tr style="cursor: pointer">
                            <td>{{ $anPham->chiTietAnPham->tenanpham }}</td>
                            <td>{{ $anPham->chiTietAnPham->tacgia }}</td>
                            <td>{{ $anPham->chiTietAnPham->danhMuc->tendanhmuc }}</td>
                            <td>{{ $anPham->chiTietAnPham->namxuatban }}</td>
                            <td>
                                <img src="{{ asset('img/anh-an-pham/' . $anPham->chiTietAnPham->hinhanh) }}"
                                    class="img-fluid" width="100" height="100"
                                    alt="{{ $anPham->chiTietAnPham->tenanpham }}">
                            </td>
                            <td>{{ $anPham->giathue > 0 ? number_format($anPham->giathue, 0, ',', '.') . 'VNĐ' : 'Chưa định giá' }}
                            </td>
                            <td>{{ $anPham->giacoc > 0 ? number_format($anPham->giacoc, 0, ',', '.') . 'VNĐ' : 'Chưa định giá' }}
                            </td>
                            <td>{{ $anPham->vitri }}</td>
                            <td>{{ $anPham->tinhtrang }}</td>
                            <td>
                                <input type="checkbox" name="anpham_ids[]" value="{{ $anPham->maanpham }}"
                                    class="form-check-input ba-form-check-input">
                            </td>
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

        <div class="row g-5 mb-3 w-75 mx-auto">
            <div class="col-6">
                <a href="{{ route('route-cuahang-quanlykho-quanlyanpham') }}" class="btn btn-danger w-100">Hủy</a>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-success w-100">Thanh lý</button>
            </div>
        </div>
    </form>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var anPhams = @json($anPhams);

        if (anPhams.length !== 0) {
            chonDongThanhLy();
            timKiemAnPham();
        }
    });
</script>
