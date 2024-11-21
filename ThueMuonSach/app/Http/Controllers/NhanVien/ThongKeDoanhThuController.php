<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoaDonThueAnPham;
use App\Models\ChiTietHoaDonThue;
use App\Models\ChiTietAnPham;

class ThongKeDoanhThuController extends Controller
{
    public function hienThiThongKeDoanhThu(Request $request)
{
    // Lấy tháng và năm từ request, mặc định là tháng hiện tại và năm hiện tại
    $month = $request->input('month', date('n'));
    $year = $request->input('year', date('Y'));

    // Lấy danh sách hóa đơn thuê trong tháng và năm đã chọn
    $hoaDonThue = HoaDonThueAnPham::whereYear('ngaythue', $year)
        ->whereMonth('ngaythue', $month)
        ->with(['khachHang', 'chiTietHoaDons.dsAnPham'])
        ->get();

        return view('CuaHang.pages.NhanVien.ThongKeDoanhThu.index',compact('hoaDonThue', 'month', 'year'));
}
}