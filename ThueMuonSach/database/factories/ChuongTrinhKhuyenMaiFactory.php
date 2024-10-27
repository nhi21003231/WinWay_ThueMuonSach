<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ChuongTrinhKhuyenMai;
use App\Models\NhanVien;

class ChuongTrinhKhuyenMaiFactory extends Factory
{
    protected $model = ChuongTrinhKhuyenMai::class;

    public function definition(): array
    {
        return [
            'tenchuongtrinhkm' => $this->faker->sentence(3),
            'mota' => $this->faker->paragraph(),
            'ngayapdung' => $this->faker->date(),
            'ngayketthuc' => $this->faker->date(),
            'manhanvien' => NhanVien::inRandomOrder()->first()->manhanvien, // Lấy nhân viên ngẫu nhiên
        ];
    }
}
