<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChuongTrinhKhuyenMai;

class ChuongTrinhKhuyenMaiSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo một số chương trình khuyến mãi ngẫu nhiên
        ChuongTrinhKhuyenMai::factory()->count(10)->create();
    }
}
