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
        // Lấy giá trị năm, ngày bắt đầu và ngày kết thúc từ request
        $year = $request->input('year', date('Y'));
        $startDate = $request->input('start_date', Carbon::createFromDate($year, 1, 1)->startOfYear());
        $endDate = $request->input('end_date', Carbon::createFromDate($year, 12, 31)->endOfYear());

        // Chuyển đổi ngày bắt đầu và ngày kết thúc thành Carbon
        $startDate = Carbon::parse($startDate)->startOfDay();
        $endDate = Carbon::parse($endDate)->endOfDay();

        // Thiết lập ngôn ngữ Carbon thành tiếng Việt
        Carbon::setLocale('vi');

        // Lấy danh sách doanh thu theo tháng trong khoảng thời gian
        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthStart = Carbon::create($year, $i, 1)->startOfMonth();
            $monthEnd = Carbon::create($year, $i, 1)->endOfMonth();

            // Chỉ tính doanh thu nếu tháng nằm trong khoảng thời gian được chọn
            if ($monthStart->between($startDate, $endDate) || $monthEnd->between($startDate, $endDate)) {
                $totalRevenue = HoaDonThueAnPham::whereBetween('ngaythue', [$monthStart, $monthEnd])
                    ->sum('thanhtien');

                $monthName = $monthStart->isoFormat('MMMM');
                $labels[] = ucwords($monthName);
                $data[] = $totalRevenue;
            }
        }

        return view('CuaHang.pages.QuanLyCuaHang.XemBaoCao.index', compact('labels', 'data'));
    }
}
