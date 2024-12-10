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
                <th>Tiền Thuê</th>
                <th>Tiền Cọc </th>
                {{-- <th>Trạng thái</th> --}}
                <th>Phí Trả Chậm</th>
            </tr>
        </thead>
        <tbody>
            @if($hoaDonThue->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Không có hóa đơn cho ngày này.</td>
                </tr>
            @else
            @foreach ($hoaDonThue as $hoaDon)
            @php
                // Lấy tổng tiền thuê và tiền cọc cho hóa đơn
                $tongTienThue = 0;
                $tongTienCoc = 0;
                $phiTraCham = 0; // Khởi tạo phí trả chậm
                $today = now(); // Ngày hiện tại
                $dueDate = \Carbon\Carbon::parse($hoaDon->ngaytra); // Ngày hết hạn
            @endphp
            @foreach ($hoaDon->chiTietHoaDons as $chiTiet)
                @php
                    $tongTienThue += $chiTiet->dsAnPham->chiTietAnPham->giathue;
                    $tongTienCoc += $chiTiet->dsAnPham->chiTietAnPham->giacoc;
                @endphp
            @endforeach
            @php
               // Kiểm tra xem hóa đơn đã quá hạn hay chưa
            if ($today->gt($dueDate)) {
                // Nếu quá hạn, tính phí trả chậm (giả sử phí trả chậm là một tỷ lệ phần trăm của tiền thuê)
                $phiTraCham = $hoaDon->phitracham; // Ví dụ: 10% tiền thuê
            }
            @endphp
            <tr>
                <td>{{ $hoaDon->mahoadon }}</td>
                <td>{{ $hoaDon->khachHang->makhachhang }}</td>
                <td>{{ number_format($tongTienThue, 0, '.', ',')}} VND</td>
                <td>{{ number_format($tongTienCoc, 0, '.', ',')}} VND</td>
                {{-- <td>{{ $hoaDon->trangthai }}</td> --}}
                <td>{{ number_format($phiTraCham, 0, '.', ',') }} VND</td> <!-- Hiển thị phí trả chậm -->
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

<div class="text-center">
    <a href="{{ route('route-cuahang-nhanvien-thongkedoanhthu') }}" class="btn btn-primary">Trở về</a>
</div>
</div>

@endsection