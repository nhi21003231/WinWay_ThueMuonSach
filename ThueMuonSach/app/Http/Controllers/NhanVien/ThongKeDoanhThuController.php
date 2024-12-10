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
    
        // Lấy danh sách hóa đơn thuê trong tháng và năm đã chọn, cùng với chi tiết hóa đơn
        $hoaDonThue = HoaDonThueAnPham::whereYear('ngaythanhtoan', $year)
            ->whereMonth('ngaythanhtoan', $month)
            ->with('chiTietHoaDons') // Eager load chi tiết hóa đơn
            ->get();
    
        // Kiểm tra nếu không có hóa đơn
        if ($hoaDonThue->isEmpty()) {
            return view('CuaHang.pages.NhanVien.ThongKeDoanhThu.index', compact('month', 'year', 'hoaDonThue'));
        }
    
        // Khởi tạo mảng doanh thu theo ngày
        $tongDoanhThu = [];
    
        // Tính doanh thu cho từng ngày
        foreach ($hoaDonThue as $hoaDon) {
            foreach ($hoaDon->chiTietHoaDons as $chiTiet) {
                // Chuyển đổi ngày thành đối tượng Carbon
                $currentDate = \Carbon\Carbon::parse($hoaDon->ngaythanhtoan)->format('Y-m-d');
                $doanhThu = abs($chiTiet->dsAnPham->chiTietAnPham->giathue); // Tính doanh thu từ chi tiết
    
                if (!isset($tongDoanhThu[$currentDate])) {
                    $tongDoanhThu[$currentDate] = 0; // Khởi tạo nếu chưa có
                }
                $tongDoanhThu[$currentDate] += $doanhThu; // Cộng dồn doanh thu cho ngày đó
            }
        }
    
        return view('CuaHang.pages.NhanVien.ThongKeDoanhThu.index', compact('tongDoanhThu', 'month', 'year', 'hoaDonThue'));
    }
public function chiTietDoanhThu(Request $request)
{
    $date = $request->input('date');

    // Lấy danh sách hóa đơn cho ngày được chọn, cùng với các quan hệ
    $hoaDonThue = HoaDonThueAnPham::with(['khachHang', 'chiTietHoaDons.dsAnPham.chiTietAnPham'])
        ->whereDate('ngaythanhtoan', $date)
        ->get();

    // Tính tổng tiền cọc và tiền thuê từ các chi tiết hóa đơn


    // Trả về view với các biến cần thiết
    return view('CuaHang.pages.NhanVien.ThongKeDoanhThu.chiTietDoanhThu', compact('hoaDonThue', 'date'));
}
}