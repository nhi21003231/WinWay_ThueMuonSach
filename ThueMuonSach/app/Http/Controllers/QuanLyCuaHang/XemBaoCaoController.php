<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\HoaDonThueAnPham;
use Illuminate\Http\Request;

class XemBaoCaoController extends Controller
{
    public function hienThiXemBaoCao(Request $request)
    {
        // Lấy tháng và năm từ request, mặc định là tháng hiện tại và năm hiện tại
        $month = $request->input('month', date('n'));
        $year = $request->input('year', date('Y'));

        // Lấy danh sách hóa đơn thuê trong tháng và năm đã chọn
        $hoaDonThue = HoaDonThueAnPham::whereYear('ngaythue', $year)
            ->whereMonth('ngaythue', $month)
            ->with(['khachHang', 'chiTietHoaDons.dsAnPham'])
            ->get();

            return view('CuaHang.pages.QuanLyCuaHang.XemBaoCao.index',compact('hoaDonThue', 'month', 'year'));
    }
}
