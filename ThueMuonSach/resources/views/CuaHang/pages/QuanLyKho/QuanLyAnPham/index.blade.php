@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mb-4">Danh sách thông tin ấn phẩm</h2>

    <div class="hstack gap-2 mb-4">
        <div class="w-25">
            <input id="ba-timkiem" class="form-control me-2" type="text" placeholder="Tìm kiếm..." aria-label="Search">
        </div>

        <button id="ba-nuttimkiem" class="btn btn-primary me-auto">Tìm kiếm</button>
    </div>


    <form method="POST" action="{{ route('route-cuahang-quanlykho-quanlytonkho-nhapanphamdaco') }}">

        @csrf

        <div class="ba-scroll-container ba-fixed-header-table mb-4">
            <table class="table mb-3 text-center align-middle" id="ba-danhsach">
                <thead>
                    <tr class="table-primary align-middle">
                        <th scope="col" width="18%">Mã chi tiết ấn phẩm</th>
                        <th scope="col" width="15%">Tên ấn phẩm</th>
                        <th scope="col" width="10%">Tác giả</th>
                        <th scope="col" width="10%">Danh mục</th>
                        <th scope="col" width="16%">Năm xuất bản</th>
                        <th scope="col" width="11%">Hình ảnh</th>
                        <th scope="col" width="10%">Số lượng</th>
                        <th scope="col" width="10%">Chỉnh sửa</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($dsCTAnPham as $index => $CTAnPham)
                        <tr>
                            <input type="hidden" name="ctanpham_ids[]" value="{{ $CTAnPham->mactanpham }}">
                            <td class="search-column">{{ $CTAnPham->mactanpham }}</td>
                            <td class="search-column">{{ $CTAnPham->tenanpham }}</td>
                            <td class="search-column">{{ $CTAnPham->tacgia }}</td>
                            <td class="search-column">{{ $CTAnPham->danhMuc->tendanhmuc }}</td>
                            <td class="search-column">{{ $CTAnPham->namxuatban }}</td>
                            <td>
                                <div class="ba-image-container">
                                    <img src="{{ asset('img/anh-an-pham/' . $CTAnPham->hinhanh) }}" class="img-fluid"
                                        alt="{{ $CTAnPham->tenanpham }}">
                                </div>
                            </td>
                            <td>
                                {{ $CTAnPham->anPham->count() }}
                            </td>
                            <td>
                                <a href="{{ route('route-cuahang-quanlykho-quanlyanpham-capnhatthongtinanpham', ['mactanpham' => $CTAnPham->mactanpham]) }}"
                                    class="btn btn-outline-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="20" class="py-5">Không có thông tin ấn phẩm nào.</td>
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
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dsCTAnPham = @json($dsCTAnPham);

            if (dsCTAnPham.length !== 0) {
                timKiemAnPham();
            }
        })
    </script>
@endsection
