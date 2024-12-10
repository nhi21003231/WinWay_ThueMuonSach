<?php

namespace App\Exports;

use App\Models\HoaDonThueAnPham;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class DoanhThuExport implements FromCollection, WithHeadings, WithColumnFormatting
{
    protected $startMonth;
    protected $endMonth;
    protected $year;

    // Nhận vào tham số từ controller
    public function __construct($startMonth, $endMonth, $year)
    {
        $this->startMonth = $startMonth;
        $this->endMonth = $endMonth;
        $this->year = $year;
    }

    /**
     * Lấy dữ liệu doanh thu theo tháng trong khoảng thời gian từ startMonth đến endMonth
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = [];

        // Lặp qua các tháng trong khoảng thời gian đã chọn
        for ($i = $this->startMonth; $i <= $this->endMonth; $i++) {
            // Tính ngày bắt đầu và kết thúc của tháng
            $monthStart = Carbon::create($this->year, $i, 1)->startOfMonth();
            $monthEnd = Carbon::create($this->year, $i, 1)->endOfMonth();

            // Tính tổng doanh thu cho tháng đó
            $totalRevenue = HoaDonThueAnPham::whereBetween('ngaythue', [$monthStart, $monthEnd])
                ->sum('thanhtien');

            // Đưa vào mảng dữ liệu (Tháng, Doanh Thu)
            $monthName = $monthStart->isoFormat('MMMM'); // Lấy tên tháng (Ví dụ: Tháng Một)
            $data[] = [
                'Tháng' => ucwords($monthName), // Chuyển tên tháng thành viết hoa chữ cái đầu
                'Doanh Thu' => $totalRevenue,
            ];
        }

        return collect($data); // Trả về collection chứa dữ liệu
    }

    /**
     * Định nghĩa tiêu đề các cột trong file Excel
     * @return array
     */
    public function headings(): array
    {
        return [
            'Tháng',
            'Doanh Thu',
        ];
    }

    /**
     * Định dạng cột Doanh Thu
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1, // Định dạng số với dấu phân cách hàng nghìn
        ];
    }
}
