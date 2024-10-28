<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HoaDonThueAnPham;

class HoaDonThueAnPhamSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo một số hóa đơn thuê ngẫu nhiên
        HoaDonThueAnPham::factory()->count(50)->create();
    }
}
