@extends('CuaHang.layouts.index')

@section('content')
    <h2 class="mb-4">Nhập ấn phẩm đã có</h2>

    <div class="hstack gap-2 mb-4">
        <div class="w-25">
            <input id="ba-timkiem" class="form-control me-2" type="text" placeholder="Tìm kiếm..." aria-label="Search">
        </div>

        <button id="ba-nuttimkiem" class="btn btn-primary me-auto">Tìm kiếm</button>
    </div>


    <form method="POST" action="{{ route('route-cuahang-quanlykho-quanlyanpham-nhapanphamdaco') }}">

        @csrf

        <div class="ba-scroll-container ba-fixed-header-table mb-4">
            <table class="table mb-3 text-center align-middle" id="ba-danhsach">
                <thead>
                    <tr class="table-primary align-middle">
                        <th scope="col" width="14%">Tên ấn phẩm</th>
                        <th scope="col" width="10%">Tác giả</th>
                        <th scope="col" width="11%">Danh mục</th>
                        <th scope="col" width="15%">Năm xuất bản</th>
                        <th scope="col" width="11%">Hình ảnh</th>
                        <th scope="col" width="16%">Vị trí</th>
                        <th scope="col" width="13%">Tình trạng</th>
                        <th scope="col" width="10%">Số lượng</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($dsCTAnPham as $index => $CTAnPham)
                        <tr style="cursor: pointer">
                            <input type="hidden" name="ctanpham_ids[]" value="{{ $CTAnPham->mactanpham }}">

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
                                <input type="text"
                                    class="form-control @error("vitri.$index") is-invalid bg-warning-subtle @enderror"
                                    name="vitri[{{ $index }}]" placeholder="Nhập vị trí"
                                    value="{{ old("vitri.$index") }}">
                            </td>
                            <td>
                                <select class="form-select @error("tinhtrang.$index") is-invalid @enderror"
                                    name="tinhtrang[{{ $index }}]">
                                    <option value="Mới" {{ old("tinhtrang.$index") == 'Mới' ? 'selected' : '' }}>Mới
                                    </option>
                                    <option value="Cũ" {{ old("tinhtrang.$index") == 'Cũ' ? 'selected' : '' }}>Cũ
                                    </option>
                                    <option value="Hư hỏng" {{ old("tinhtrang.$index") == 'Hư hỏng' ? 'selected' : '' }}>Hư
                                        hỏng</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control @error("soluong.$index") is-invalid @enderror"
                                    name="soluong[{{ $index }}]" value="{{ old("soluong.$index", 0) }}" required
                                    min="0">
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="py-5">Không có thông tin ấn phẩm nào.</td>
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
                <button class="btn btn-success w-100">Nhập</button>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dsCTAnPham = @json($dsCTAnPham);

            if (dsCTAnPham.length !== 0) {
                toMauDongNhapAnPham();
                timKiemAnPham();
            }
        })

        @if ($errors->any())
            document.addEventListener("DOMContentLoaded", function() {
                toastr.error("{{ $errors->first() }}", "Lỗi!", {
                    positionClass: "toast-bottom-right",
                    timeOut: "3000",
                    closeButton: true,
                    newestOnTop: false,
                });
            })
        @endif
    </script>
@endsection
