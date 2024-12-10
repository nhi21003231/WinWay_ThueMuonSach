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
                $tongTienThue = 0; // Khởi tạo biến tổng tiền thuê
                $tongTienCoc = 0; // Khởi tạo biến tổng tiền cọc

                // Tính tổng tiền thuê
                foreach ($hoaDon->chiTietHoaDons as $chiTiet) {
                    $giaThue = $chiTiet->dsAnPham->chiTietAnPham->giathue ?? 0;
                    $giaCoc = $chiTiet->dsAnPham->chiTietAnPham->giacoc ?? 0;
                    $tongTienThue += $giaThue; // Tính tổng tiền thuê
                    $tongTienCoc += $giaCoc; // Tính tổng tiền cọc
                }

                $tienPhat = $isOverdue ? $tongTienThue * 0.05 : 0; // Tính tiền phạt (5%)
                $tongTienPhaiTra = abs($tongTienThue + $tienPhat - $tongTienCoc); // Tổng tiền phải trả
                $tongTienPhaiThu = abs($tongTienThue + $tienPhat - $tongTienCoc); // Tổng tiền phải trả
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
                            <img src="{{ asset('img/anh-an-pham/' . $chiTiet->dsAnPham->chiTietAnPham->hinhanh) }}"
                                alt="{{ $chiTiet->dsAnPham->tenanpham }}" class="me-3"
                                style="max-width: 150px; height: auto;" />
                        @endif
                        <div>
                            <strong>Mã Ấn Phẩm:</strong> {{ $chiTiet->dsAnPham->maanpham ?? 'Không có mã' }} <br>
                            <strong>Tên Ấn Phẩm:</strong>
                            {{ $chiTiet->dsAnPham->chiTietAnPham->tenanpham ?? 'Không có tên' }} <br>
                            <strong>Giá Thuê:</strong>
                            {{ number_format($chiTiet->dsAnPham->chiTietAnPham->giathue, 0, '.', ',') }} VND<br>
                        </div>
                    </li>
                @endforeach
            @else
                <li class="list-group-item">Không có ấn phẩm nào đang thuê.</li>
            @endif
        </ul>

        <!-- Hiển thị tổng tiền phải trả ở cuối trang -->
        <div class="mt-4">
            <strong>Số lượng:</strong> {{ $hoaDon->soluongthue }} <br>
            <strong>Tổng Tiền Cọc:</strong> {{ number_format($tongTienCoc, 0, '.', ',') }} VND<br>
            <!-- Thay đổi thành VND -->
            <strong>Tổng Tiền Thuê:</strong> {{ number_format($tongTienThue, 0, '.', ',') }} VND<br>
            <!-- Thay đổi thành VND -->
            <strong>Tiền Phạt (5%):</strong> {{ number_format($tienPhat, 0, '.', ',') }} VND<br>
            <!-- Thay đổi thành VND -->

            @if ($tongTienCoc >= $tongTienThue)
                <strong>Tổng Tiền Phải Trả:</strong> {{ number_format($tongTienPhaiTra, 0, '.', ',') }} VND<br>
                <!-- Hiển thị tổng tiền phải trả -->
            @else
                <strong>Tổng Tiền Phải Thu:</strong> {{ number_format($tongTienThue, 0, '.', ',') }} VND<br>
                <!-- Hiển thị tổng tiền phải thu -->
            @endif
        </div>

        <!-- Nút Quay lại và Trả Sách -->
        <div class="mt-4">
            <a href="{{ URL::to('nhan-vien/quan-ly-an-pham') }}" class="btn btn-secondary">Quay lại</a>
            <form action="{{ route('traSach', ['mahoadon' => $hoaDon->mahoadon]) }}" method="POST"
                style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger" {{ $hoaDon->trangthai === 'Đã Trả' ? 'disabled' : '' }}>Trả
                    Sách</button>
            </form>
        </div>
    </div>
@endsection
