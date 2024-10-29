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
                    <th scope="col" width="9%">Thanh lý</th>
                </tr>
            </thead>
        </table>

        <div style="overflow-y: auto; max-height: 60vh;" class="scroll-container-ba">
            <table class="table table-hover mb-3 text-center align-middle" id="ba-danhsach">
                <tbody>
                    @forelse($anPhams as $anPham)
                        <tr>
                            <td>{{ $anPham->chiTietAnPham->tenanpham }}</td>
                            <td>{{ $anPham->chiTietAnPham->tacgia }}</td>
                            <td>{{ $anPham->chiTietAnPham->danhMuc->tendanhmuc }}</td>
                            <td>{{ $anPham->chiTietAnPham->namxuatban }}</td>
                            <td>
                                <img src="{{ asset('img/anh-an-pham/' . $anPham->chiTietAnPham->hinhanh) }}" width="100"
                                    height="100">
                            </td>
                            <td>{{ number_format($anPham->giathue, 0, ',', '.') }} VNĐ</td>
                            <td>{{ number_format($anPham->giacoc, 0, ',', '.') }} VNĐ</td>
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
            </table>
            <div class="text-center py-5" id="khong-an-pham" style="display: none;">
                Không có ấn phẩm nào.
            </div>
        </div>

        <div class="row g-5 mb-3 pt-4 w-75 mx-auto">
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
