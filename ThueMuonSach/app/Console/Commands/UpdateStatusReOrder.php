<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Log;

use Illuminate\Console\Command;
use App\Models\HoaDonThueAnPham;

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
        $hoaDons = HoaDonThueAnPham::where('loaidon','Đặt trước')
                
                                    ->where('trangthai','Đang chờ sách')

                                    ->get();

        foreach ($hoaDons as $hoaDon) {

            $hasAvailable = false;

            $count = $hoaDon->chitietanpham->anpham->where('dathue',0)->count();

            if($count > 0 ){

                $hoaDon->trangthai = 'Đã có sách';
                
                $hoaDon->save();
                
                Log::info("Cập nhật trạng thái hóa đơn #{$hoaDon->id}, #{$count} thành 'Đã có sách'");
            }
        }

        $this->info('Hoàn thành cập nhật trạng thái hóa đơn.');
        
    }
}
