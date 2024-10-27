<?php

namespace Database\Factories;

use App\Models\ChiTietAnPham;
use App\Models\DsAnPham;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DsAnPham>
 */
class DsAnPhamFactory extends Factory
{
    protected $model = DsAnPham::class;

    public function definition(): array
    {
        return [
            'tinhtrang' => $this->faker->randomElement(['Mới', 'Cũ', 'Hư hỏng']),
            'giathue' => $this->faker->randomFloat(2, 10000, 500000), // Giá thuê ngẫu nhiên
            'giacoc' => $this->faker->randomFloat(2, 20000, 1000000), // Giá cọc ngẫu nhiên
            'vitri' => $this->faker->streetAddress(), // Vị trí ngẫu nhiên
            'dathue' => $this->faker->boolean(),
            'dathanhly' => $this->faker->boolean(),
            'mactanpham' => ChiTietAnPham::inRandomOrder()->first()->mactanpham, // Sử dụng mã chi tiết ấn phẩm có sẵn
        ];
    }
}
