<?php

namespace Database\Factories;

use App\Models\DanhGia;
use App\Models\DsAnPham;
use App\Models\KhachHang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DanhGia>
 */
class DanhGiaFactory extends Factory
{
    protected $model = DanhGia::class;

    public function definition(): array
    {
        return [
            'binhluan' => $this->faker->text(1000),
            'trangthai' => $this->faker->boolean(),
            'sosao' => $this->faker->numberBetween(1, 5),
            'ngaydanhgia' => $this->faker->dateTimeBetween('1970-01-01', 'now')->format('Y-m-d H:i:s'),
            'maanpham' => DsAnPham::inRandomOrder()->first()->maanpham, // Lấy sản phẩm ngẫu nhiên
            'makhachhang' => KhachHang::inRandomOrder()->first()->makhachhang, // Lấy khách hàng ngẫu nhiên
        ];
    }
}
