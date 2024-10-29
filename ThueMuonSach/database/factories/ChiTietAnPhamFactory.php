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
            'madanhmuc' => DanhMuc::inRandomOrder()->first()->madanhmuc,
        ];
    }
}
