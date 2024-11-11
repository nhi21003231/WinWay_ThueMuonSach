@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mb-4">Danh sách danh mục</h2>

    <div class="hstack gap-2 mb-4">
        <div class="w-25">
            <input id="ba-timkiem" class="form-control me-2" type="text" placeholder="Tìm kiếm..." aria-label="Search">
        </div>

        <button id="ba-nuttimkiem" class="btn btn-primary me-auto">Tìm kiếm</button>

        <a href="{{ route('route-cuahang-quanlykho-quanlydanhmuc-themdanhmuc') }}" class="btn btn-secondary">
            Thêm danh mục
        </a>
    </div>

    <div class="ba-scroll-container ba-fixed-header-table mb-4">
        <table class="table mb-3 text-center align-middle" id="ba-danhsach">
            <thead>
                <tr class="table-primary align-middle">
                    <th scope="col" width="15%">Mã danh mục</th>
                    <th scope="col" width="15%">Tên danh mục</th>
                    <th scope="col" width="40%">Mô tả</th>
                    <th scope="col" width="15%">Số lượng ấn phẩm</th>
                    <th scope="col" width="15%">Chỉnh sửa</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($dsDanhMuc as $danhMuc)
                    <tr>
                        <td class="search-column">{{ $danhMuc->madanhmuc }}</td>
                        <td class="search-column">{{ $danhMuc->tendanhmuc }}</td>
                        <td class="search-column">{{ $danhMuc->mota }}</td>
                        <td>
                            {{ $danhMuc->chiTietAnPham->sum(function ($chiTietAnPham) {
                                return $chiTietAnPham->anPham->count();
                            }) }}
                        </td>
                        <td>
                            <a href="{{ route('route-cuahang-quanlykho-quanlydanhmuc-capnhatdanhmuc', ['madanhmuc' => $danhMuc->madanhmuc]) }}"
                                class="btn btn-outline-primary">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="20" class="py-5">Không có danh mục nào.</td>
                    </tr>
                @endforelse
            </tbody>

            <tfoot id="khong-an-pham" style="display: none">
                <tr>
                    <td colspan="20" class="py-5">Không tìm thấy danh mục nào.
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dsDanhMuc = @json($dsDanhMuc);

        if (dsDanhMuc.length !== 0) {
            timKiemAnPham();
        }
    });
</script>
