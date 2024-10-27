<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GioHang;

class GioHangSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo một số giỏ hàng ngẫu nhiên
        GioHang::factory()->count(10)->create();
    }
}
