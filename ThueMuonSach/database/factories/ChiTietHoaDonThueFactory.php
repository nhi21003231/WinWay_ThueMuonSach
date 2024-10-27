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
            'soluongthue' => $this->faker->numberBetween(1, 10), // Số lượng thuê ngẫu nhiên
            'tiencoc' => $this->faker->randomFloat(2, 0, 100), // Tiền cọc ngẫu nhiên
            'tienthue' => $this->faker->randomFloat(2, 10, 1000), // Tiền thuê ngẫu nhiên
            'maanpham' => DsAnPham::inRandomOrder()->first()->maanpham, // Lấy sản phẩm ngẫu nhiên
            'mahoadon' => HoaDonThueAnPham::inRandomOrder()->first()->mahoadon, // Lấy hóa đơn ngẫu nhiên
        ];
    }
}
