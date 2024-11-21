<?php

namespace Database\Factories;

use App\Models\ChiTietAnPham;
use App\Models\DanhMuc;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChiTietAnPham>
 */
class ChiTietAnPhamFactory extends Factory
{
    protected $model = ChiTietAnPham::class;


    public function definition(): array
    {
        return [
            'tenanpham' => $this->faker->words(3, true),
            'tacgia' => $this->faker->name(),
            'namxuatban' => $this->faker->year(),
            'hinhanh' => 'nha-gia-kim.jpg', // Hình ảnh mặc định
            // 'giathue' => $this->faker->randomFloat(2, 10000, 500000), // Giá thuê ngẫu nhiên
            // 'giacoc' => $this->faker->randomFloat(2, 20000, 1000000), // Giá cọc ngẫu nhiên
            'madanhmuc' => DanhMuc::inRandomOrder()->first()->madanhmuc,
        ];
    }
}
