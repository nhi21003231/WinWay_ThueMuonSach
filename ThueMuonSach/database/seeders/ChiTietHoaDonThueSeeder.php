<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChiTietHoaDonThue;

class ChiTietHoaDonThueSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo một số chi tiết hóa đơn thuê ngẫu nhiên
        // ChiTietHoaDonThue::factory()->count(50)->create();
        // $data = [
        //     [
        //         'macthoadon' => 1,
        //         'mahoadon' => 1,
        //         'maanpham' => 1,
        //         'created_at' => '2024-06-01 08:00:00',
        //         'updated_at' => '2024-06-01 08:00:00'
        //     ],
        //     [
        //         'macthoadon' => 2,
        //         'mahoadon' => 1,
        //         'maanpham' => 2,
        //         'created_at' => '2024-06-01 08:00:00',
        //         'updated_at' => '2024-06-01 08:00:00'
        //     ],
        //     [
        //         'macthoadon' => 3,
        //         'mahoadon' => 1,
        //         'maanpham' => 3,
        //         'created_at' => '2024-06-01 08:00:00',
        //         'updated_at' => '2024-06-01 08:00:00'
        //     ]
        // ];

        // foreach ($data as $item) {
        //     ChiTietHoaDonThue::create($item);
        // }
    }
}
