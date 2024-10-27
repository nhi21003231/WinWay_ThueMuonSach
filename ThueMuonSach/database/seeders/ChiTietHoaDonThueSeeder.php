<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChiTietHoaDonThue;

class ChiTietHoaDonThueSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo một số chi tiết hóa đơn thuê ngẫu nhiên
        ChiTietHoaDonThue::factory()->count(50)->create();
    }
}
