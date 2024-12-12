<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Log;

use Illuminate\Console\Command;
use App\Models\HoaDonThueAnPham;
use App\Models\ChiTietAnPham;

class UpdateStatusReOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-status-re-order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cập nhật trạng thái đã có sách';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $hoaDons = HoaDonThueAnPham::where('loaidon', 'Đặt trước')

            ->where('trangthai', 'Đang chờ sách')

            ->get();

        foreach ($hoaDons as $hoaDon) {
            $count = ChiTietAnPham::where('mactanpham', $hoaDon->mactanpham)
                ->whereHas('anpham', function ($query) {
                    $query->where('dathue', 0)
                        ->where('tinhtrang', '<>', 'Hư hỏng')
                        ->where('dathanhly', 0);
                })
                ->count();

            if ($count > 0) {
                $hoaDon->trangthai = 'Đã có sách';
                $hoaDon->save();

                Log::info("Cập nhật trạng thái hóa đơn #{$hoaDon->mahoadon}, #{$count} thành 'Đã có sách'");
            }
        }
    }
}
