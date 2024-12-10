<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Exports\DoanhThuExport;
use App\Http\Controllers\Controller;
use App\Models\ChiTietHoaDonThue;
use App\Models\HoaDonThueAnPham;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class XemBaoCaoController extends Controller
{
    public function hienThiXemBaoCao(Request $request)
    {
        // Lấy tháng bắt đầu, tháng kết thúc và năm từ request (hoặc giá trị mặc định)
        $startMonth = $request->input('start_month', 1); // Mặc định tháng bắt đầu là tháng 1
        $endMonth = $request->input('end_month', date('m')); // Mặc định tháng kết thúc là tháng hiện tại
        $year = $request->input('year', date('Y')); // Mặc định năm là năm hiện tại

        // Thiết lập ngôn ngữ Carbon thành tiếng Việt
        Carbon::setLocale('vi');

        // Khởi tạo mảng cho nhãn và dữ liệu
        $labels = [];
        $data = [];

        // Lấy doanh thu cho từng tháng trong khoảng thời gian từ startMonth đến endMonth
        for ($i = $startMonth; $i <= $endMonth; $i++) {
            // Tính ngày bắt đầu và ngày kết thúc của tháng i
            $monthStart = Carbon::create($year, $i, 1)->startOfMonth();
            $monthEnd = Carbon::create($year, $i, 1)->endOfMonth();

            // Tính tổng doanh thu cho tháng đó
            $totalRevenue = HoaDonThueAnPham::whereBetween('ngaythue', [$monthStart, $monthEnd])
                ->sum('thanhtien');

            // Thêm vào mảng nhãn (tên tháng) và dữ liệu (doanh thu)
            $monthName = $monthStart->isoFormat('MMMM'); // Tên tháng (ví dụ: Tháng Một)
            $labels[] = ucwords($monthName);
            $data[] = $totalRevenue;
        }

        // Kiểm tra nếu nút "Xuất Excel" được nhấn
        if ($request->has('export_excel')) {
            return Excel::download(new DoanhThuExport($startMonth, $endMonth, $year), 'doanh_thu.xlsx');
        }

        // Trả về view với dữ liệu
        return view('CuaHang.pages.QuanLyCuaHang.XemBaoCao.index', compact('labels', 'data'));
    }
}
