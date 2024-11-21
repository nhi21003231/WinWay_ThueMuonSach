<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BaiBao;
use App\Models\NhanVien;

class BaiBaoFactory extends Factory
{
    protected $model = BaiBao::class;

    public function definition(): array
    {
        return [
            'tieude' => $this->faker->sentence(5),
            'noidung' => $this->faker->paragraph(),
            'hinhanh' => 'Doraemon1.jpg', // Hình ảnh mặc định
            'ngaydang' => $this->faker->date(),
            'manhanvien' => NhanVien::inRandomOrder()->first()->manhanvien, // Lấy nhân viên ngẫu nhiên
        ];
    }
}
