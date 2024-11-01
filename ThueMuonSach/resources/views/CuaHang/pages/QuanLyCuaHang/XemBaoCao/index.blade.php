@extends('CuaHang.layouts.index')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Báo cáo hóa đơn thuê tháng {{ $month }} năm {{ $year }}</h2>

    <!-- Form chọn tháng và năm -->
    <form action="{{ route('route-cuahang-quanlycuahang-xembaocao') }}" method="GET" class="form-inline mb-3 justify-content-center">
        <div class="form-group mx-2">
            <label for="month">Chọn tháng:</label>
            <select name="month" id="month" class="form-control">
                @for ($m = 1; $m <= 12; $m++)
                    <option value="{{ $m }}" {{ $m == $month ? 'selected' : '' }}>{{ $m }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group mx-2">
            <label for="year">Chọn năm:</label>
            <select name="year" id="year" class="form-control">
                @for ($y = date('Y'); $y >= date('Y') - 5; $y--)
                    <option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Xem báo cáo</button>
    </form>

    <!-- Bảng hiển thị hóa đơn -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Khách hàng</th>
                    <th>Ngày thuê</th>
                    <th>Ngày trả</th>
                    <th>Trạng thái</th>
                    <th>Sản phẩm thuê</th>
                    <th>Số lượng</th>
                    <th>Thành tiền (VND)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hoaDonThue as $hoaDon)
                    @foreach ($hoaDon->chiTietHoaDons as $chiTiet)
                        <tr>
                            @if ($loop->first) <!-- Chỉ hiển thị tên khách hàng và thông tin hóa đơn 1 lần -->
                                <td>{{ $hoaDon->khachHang->hoten }}</td>
                                <td>{{ \Carbon\Carbon::parse($hoaDon->ngaythue)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($hoaDon->ngaytra)->format('d/m/Y') }}</td>
                                <td>{{ $hoaDon->trangthai }}</td>
                                <td>{{ $chiTiet->dsAnPham->tenanpham }}</td>
                                <td>{{ $chiTiet->soluongthue }}</td>
                                <td>{{ number_format($chiTiet->tienthue, 2) }}</td>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $chiTiet->dsAnPham->tenanpham }}</td>
                                <td>{{ $chiTiet->soluongthue }}</td>
                                <td>{{ number_format($chiTiet->tienthue, 2) }}</td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection