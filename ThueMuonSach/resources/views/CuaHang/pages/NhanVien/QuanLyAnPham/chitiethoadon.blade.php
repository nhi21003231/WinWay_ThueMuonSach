{{-- cường --}}
@extends('CuaHang.layouts.index')
@section('content')
<div class="container">
    <h2 class="mb-4">Chi tiết Hóa Đơn</h2>

    <div class="mb-4">
        <strong>Mã Hóa Đơn:</strong> {{ $hoaDon->mahoadon }}<br>
        <strong>Ngày Thuê:</strong> {{ $hoaDon->ngaythue }}<br>
        <strong>Ngày Trả:</strong> {{ $hoaDon->ngaytra }}<br>   
        <strong>Tên Khách Hàng:</strong> {{ $hoaDon->khachHang->hoten }}<br>
        <strong>Trạng Thái:</strong> {{ $hoaDon->trangthai }}<br>   
        
        @php
            $today = \Carbon\Carbon::now();
            $dueDate = \Carbon\Carbon::parse($hoaDon->ngaytra);
            $isOverdue = $today->isAfter($dueDate);
            $tongTienThue = $hoaDon->chiTietHoaDons->sum('tienthue'); // Tính tổng tiền thuê
            $tienPhat = $isOverdue ? $tongTienThue * 0.05 : 0; // Tính tiền phạt 5%
            $tongTienPhaiTra = $tongTienThue + $tienPhat; // Tính tổng tiền phải trả
        @endphp
        
        <strong>Trạng Thái Hạn Trả:</strong> 
        @if ($isOverdue)
            <span class="text-danger">Quá Hạn</span>
        @else
            <span class="text-success">Đúng Hạn</span>
        @endif
        <br>
    </div>

    <h5 class="mb-3">Các Ấn Phẩm Đang Thuê:</h5>
    <ul class="list-group">
        @if ($hoaDon->chiTietHoaDons->isNotEmpty())
            @foreach ($hoaDon->chiTietHoaDons as $chiTiet)
                <li class="list-group-item d-flex align-items-start">
                    @if ($chiTiet->dsAnPham->chiTietAnPham->hinhanh)
                        <img src="{{ asset('img/anh-an-pham/' . $chiTiet->dsAnPham->chiTietAnPham->hinhanh) }}" alt="{{ $chiTiet->dsAnPham->tenanpham }}" class="me-3" style="max-width: 150px; height: auto;" />
                    @endif
                    <div>
                        <strong>Mã Ấn Phẩm:</strong> {{ $chiTiet->dsAnPham->maanpham ?? 'Không có mã' }} <br>
                        <strong>Tên Ấn Phẩm:</strong> {{ $chiTiet->dsAnPham->chiTietAnPham->tenanpham ?? 'Không có tên' }} <br>
                        <strong>Số lượng:</strong> {{ $chiTiet->soluongthue }} <br>
                        <strong>Giá:</strong> ${{ number_format($chiTiet->tienthue, 2, '.', ',') }} USD<br>
                        <strong>Trạng Thái:</strong> {{ $hoaDon->trangthai ?? 'Không có trạng thái' }}
                    </div>
                </li>
            @endforeach
        @else
            <li class="list-group-item">Không có ấn phẩm nào đang thuê.</li>
        @endif
    </ul>

    <!-- Hiển thị tổng tiền phải trả ở cuối trang -->
    <div class="mt-4">
        <strong>Tổng Tiền Thuê:</strong> ${{ number_format($tongTienThue, 2, '.', ',') }} USD<br>
        <strong>Tiền Phạt (5%):</strong> ${{ number_format($tienPhat, 2, '.', ',') }} USD<br>
        <strong>Tổng Tiền Phải Trả:</strong> ${{ number_format($tongTienPhaiTra, 2, '.', ',') }} USD<br>
    </div>

    <!-- Nút Quay lại và Trả Sách -->
    <div class="mt-4">
        <a href="{{ URL::to('nhan-vien/quan-ly-an-pham') }}" class="btn btn-secondary">Quay lại</a>
        <form action="{{ route('traSach', ['mahoadon' => $hoaDon->mahoadon]) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger" {{ $hoaDon->trangthai === 'Đã Trả' ? 'disabled' : '' }}>Trả Sách</button>
        </form>
    </div>
</div>
@endsection