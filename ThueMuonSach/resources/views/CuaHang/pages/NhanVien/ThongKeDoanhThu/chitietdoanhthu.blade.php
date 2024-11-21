@extends('CuaHang.layouts.index')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Chi tiết doanh thu ngày {{ $date }}</h2>

    <!-- Bảng chi tiết hóa đơn -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Mã Hóa Đơn</th>
                    <th>Mã Khách Hàng</th>
                    <th>Tiền Thuê ($)</th>
                    <th>Tiền Cọc ($)</th>
                </tr>
            </thead>
            <tbody>
                @if($hoaDonThue->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center">Không có hóa đơn cho ngày này.</td>
                    </tr>
                @else
                    @foreach ($hoaDonThue as $hoaDon)
                        @foreach ($hoaDon->chiTietHoaDons as $chiTiet)
                            <tr>
                                <td>{{ $hoaDon->mahoadon }}</td>
                                <td>{{ $hoaDon->khachHang->makhachhang }}</td>
                                <td>${{ number_format($chiTiet->tienthue, 2, '.', ',') }}</td> <!-- Đổi thành $ -->
                                <td>${{ number_format($chiTiet->tiencoc, 2, '.', ',') }}</td> <!-- Đổi thành $ -->
                            </tr>
                        @endforeach
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="text-center">
        {{-- <a href="{{ route('thongke.doanhthu') }}" class="btn btn-primary">Trở về</a> --}}
    </div>
</div>
@endsection