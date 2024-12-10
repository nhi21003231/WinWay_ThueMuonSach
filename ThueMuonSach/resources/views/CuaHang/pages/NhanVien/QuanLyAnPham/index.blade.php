{{-- @extends('CuaHang.layouts.index')

@section('content')
<h1>Nhân viên - Quản lý ấn phẩm</h1>
@endsection --}}
{{-- // cường --}}
@extends('CuaHang.layouts.index')

@section('content')
    <div class="container">
        <h2 class="mb-4">Danh sách Hóa Đơn Thuê Ấn Phẩm</h2>

        {{-- @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif --}}

        <div class="scroll-container mb-4">
            <table class="table mb-3 text-center align-middle">
                <thead>
                    <tr class="table-primary align-middle">
                        <th scope="col">Mã Hóa Đơn</th>
                        <th scope="col">Ngày Thuê</th>
                        <th scope="col">Ngày Dự Kiến</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Xem Chi Tiết</th>
                        <th scope="col">Cập Nhật Trạng Thái</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($hoadon as $hoaDon)
                        <tr>
                            <td>{{ $hoaDon->mahoadon }}</td>
                            <td>{{ $hoaDon->ngaythue }}</td>
                            <td>{{ $hoaDon->ngaytra }}</td>
                            <td>{{ $hoaDon->trangthai }}</td>
                            <td>
                                <a href="{{ route('route-cuahang-nhanvien-quanlyanpham-chitiethoadon', ['mahoadon' => $hoaDon->mahoadon]) }}"
                                    class="btn btn-info btn-sm">Xem Chi Tiết</a>
                            </td>
                            <td>
                                <form action="{{ route('updateStatus', ['mahoadon' => $hoaDon->mahoadon]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <select name="trangthai" class="form-control" onchange="this.form.submit()"
                                            {{ $hoaDon->trangthai != 'Đang xử lý' ? 'disabled' : '' }}>
                                            @if ($hoaDon->trangthai == 'Đang xử lý' || $hoaDon->trangthai == 'Đang thuê')
                                                <option value="Đang xử lý"
                                                    {{ $hoaDon->trangthai == 'Đang xử lý' ? 'selected' : '' }}>Đang xử lý
                                                </option>
                                                <option value="Đang thuê"
                                                    {{ $hoaDon->trangthai == 'Đang thuê' ? 'selected' : '' }}>Đang thuê
                                                </option>
                                            @elseif ($hoaDon->trangthai == 'Đã trả')
                                                <option value="Đã Trả"
                                                    {{ $hoaDon->trangthai == 'Đã trả' ? 'selected' : '' }}>Đã Trả</option>
                                            @endif
                                        </select>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-5">Không có thông tin hóa đơn nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Hiển thị các liên kết phân trang -->
            <div class="d-flex justify-content-center">
                {{ $hoadon->links() }}
            </div>
        </div>
    </div>
@endsection
