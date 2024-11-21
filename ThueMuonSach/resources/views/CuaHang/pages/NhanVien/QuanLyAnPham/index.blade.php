{{-- @extends('CuaHang.layouts.index')

@section('content')
<h1>Nhân viên - Quản lý ấn phẩm</h1>
@endsection --}}
{{-- // cường --}}
@extends('CuaHang.layouts.index')

@section('content')
<div class="container">
    <h2 class="mb-4">Danh sách Hóa Đơn Thuê Ấn Phẩm</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="scroll-container mb-4">
        <table class="table mb-3 text-center align-middle">
            <thead>
                <tr class="table-primary align-middle">
                    <th scope="col">Mã Hóa Đơn</th>
                    <th scope="col">Ngày Thuê</th>
                    <th scope="col">Ngày Dự Kiến</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Xem Chi Tiết</th>
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
                            <a href="{{ route('quanlyanpham.chitiethoadon', ['mahoadon' => $hoaDon->mahoadon]) }}" class="btn btn-info btn-sm">Xem Chi Tiết</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-5">Không có thông tin hóa đơn nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection