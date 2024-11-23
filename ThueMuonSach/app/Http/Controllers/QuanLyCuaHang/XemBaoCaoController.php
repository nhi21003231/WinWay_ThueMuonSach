<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\ChiTietHoaDonThue;
use App\Models\HoaDonThueAnPham;
use Carbon\Carbon;
use Illuminate\Http\Request;

class XemBaoCaoController extends Controller
{
    // public function hienThiXemBaoCao(Request $request)
    // {
    //     // Lấy giá trị năm từ request, nếu không có thì mặc định là năm hiện tại
    //     $year = $request->input('year', date('Y'));

    //     // Thiết lập ngôn ngữ Carbon thành tiếng Việt
    //     Carbon::setLocale('vi');

    //     // Lấy danh sách doanh thu theo tháng và năm
    //     $labels = [];
    //     $data = [];
    //     for ($i = 1; $i <= 12; $i++) {
    //         // Lấy tổng doanh thu cho mỗi tháng
    //         $startDate = Carbon::createFromDate($year, $i, 1)->startOfMonth();
    //         $endDate = Carbon::createFromDate($year, $i, 1)->endOfMonth();

    //         // Lấy tổng doanh thu từ ChiTietHoaDonThue
    //         $totalRevenue = ChiTietHoaDonThue::whereHas('hoaDonThue', function ($query) use ($startDate, $endDate) {
    //             $query->whereBetween('ngaythue', [$startDate, $endDate]);
    //         })->sum('thanhtien'); // Tổng doanh thu của tháng này

    //         // Lấy tên tháng bằng tiếng Việt
    //         $monthName = Carbon::create()->month($i)->isoFormat('MMMM'); // Lấy tên tháng (vd: tháng một, tháng hai, ...)
    //         $labels[] = ucwords($monthName); // Viết hoa chữ cái đầu

    //         // Thêm dữ liệu doanh thu vào mảng
    //         $data[] = $totalRevenue;
    //     }

    //     return view('CuaHang.pages.QuanLyCuaHang.XemBaoCao.index', compact('labels', 'data'));
    // }


    public function hienThiXemBaoCao(Request $request)
    {
        // Lấy giá trị năm từ request, nếu không có thì mặc định là năm hiện tại
        $year = $request->input('year', date('Y'));

        // Thiết lập ngôn ngữ Carbon thành tiếng Việt
        Carbon::setLocale('vi');

        // Lấy danh sách doanh thu theo tháng và năm
        $labels = [];
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            // Lấy tổng doanh thu cho mỗi tháng
            $startDate = Carbon::createFromDate($year, $i, 1)->startOfMonth();
            $endDate = Carbon::createFromDate($year, $i, 1)->endOfMonth();

            // Lấy tổng doanh thu từ ChiTietHoaDonThue
            $totalRevenue = HoaDonThueAnPham::whereBetween('ngaythue', [$startDate, $endDate])
            ->sum('thanhtien'); // Tổng doanh thu của tháng này

            // Lấy tên tháng bằng tiếng Việt
            $monthName = Carbon::create()->month($i)->isoFormat('MMMM'); // Lấy tên tháng (vd: tháng một, tháng hai, ...)
            $labels[] = ucwords($monthName); // Viết hoa chữ cái đầu

            // Thêm dữ liệu doanh thu vào mảng
            $data[] = $totalRevenue;
        }

        return view('CuaHang.pages.QuanLyCuaHang.XemBaoCao.index', compact('labels', 'data'));
    }
}
