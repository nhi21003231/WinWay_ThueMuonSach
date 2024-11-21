<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\ChiTietHoaDonThue;
use App\Models\HoaDonThueAnPham;
use Carbon\Carbon;
use Illuminate\Http\Request;

class XemBaoCaoController extends Controller
{
    public function hienThiXemBaoCao(Request $request)
    {
        // Lấy giá trị năm và tháng từ request, nếu không có thì mặc định là năm hiện tại và tháng 1
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', 1);

        // Thiết lập ngôn ngữ Carbon thành tiếng Việt
        Carbon::setLocale('vi'); // Cài đặt ngôn ngữ tiếng Việt

        // Lấy danh sách doanh thu theo tháng và năm
        $labels = [];
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            // Lấy tổng doanh thu cho mỗi tháng
            $startDate = Carbon::createFromDate($year, $i, 1)->startOfMonth();
            $endDate = Carbon::createFromDate($year, $i, 1)->endOfMonth();

            // Lấy tổng doanh thu từ ChiTietHoaDonThue
            $totalRevenue = ChiTietHoaDonThue::whereHas('hoaDonThue', function($query) use ($startDate, $endDate) {
                $query->whereBetween('ngaythue', [$startDate, $endDate]);
            })->sum('tienthue'); // Tổng doanh thu của tháng này

            // Lấy tên tháng bằng tiếng Việt và viết hoa chữ cái đầu
            $monthName = Carbon::create()->month($i)->isoFormat('MMMM'); // Lấy tên tháng bằng tiếng Việt
            $monthName = ucwords($monthName); // Viết hoa chữ cái đầu

            // Thêm tên tháng vào mảng labels
            $labels[] = $monthName;
            $data[] = $totalRevenue; // Doanh thu của tháng
        }

        return view('CuaHang.pages.QuanLyCuaHang.XemBaoCao.index', compact('labels', 'data'));
    }
}
