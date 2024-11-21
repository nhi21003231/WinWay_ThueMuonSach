<?php

namespace Database\Seeders;

use App\Models\ChiTietHoaDonThue;
use Illuminate\Database\Seeder;
use App\Models\HoaDonThueAnPham;

class HoaDonThueAnPhamSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo một số hóa đơn thuê ngẫu nhiên
        $hoaDons = HoaDonThueAnPham::factory()->count(50)->create();

        foreach ($hoaDons as $hoaDon) {
            // Số lượng chi tiết ngẫu nhiên cho mỗi hóa đơn
            ChiTietHoaDonThue::factory()->count(rand(1, 3))->create([
                'mahoadon' => $hoaDon->mahoadon,
            ]);
        }
    }
}
