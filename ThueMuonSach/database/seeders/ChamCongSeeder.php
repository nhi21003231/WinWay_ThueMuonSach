<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChamCong;

class ChamCongSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo một số bản ghi chấm công ngẫu nhiên
        ChamCong::factory()->count(50)->create();
    }
}
