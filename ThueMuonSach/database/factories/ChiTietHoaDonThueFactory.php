<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ChiTietHoaDonThue;
use App\Models\DsAnPham;
use App\Models\HoaDonThueAnPham;

class ChiTietHoaDonThueFactory extends Factory
{
    protected $model = ChiTietHoaDonThue::class;

    public function definition(): array
    {
        return [
            'maanpham' => DsAnPham::inRandomOrder()->first()->maanpham, // Lấy sản phẩm ngẫu nhiên
            'mahoadon' => HoaDonThueAnPham::inRandomOrder()->first()->mahoadon, // Lấy hóa đơn ngẫu nhiên
        ];
    }
}
