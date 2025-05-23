<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ChamCong;
use App\Models\NhanVien;

class ChamCongFactory extends Factory
{
    protected $model = ChamCong::class;

    public function definition(): array
    {
        return [
            'ghinhan' => $this->faker->boolean(),
            'thoigianvao' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'thoigianra' => $this->faker->dateTimeBetween('now', '+1 month'),
            'manhanvien' => NhanVien::inRandomOrder()->first()->manhanvien, // Lấy nhân viên ngẫu nhiên
        ];
    }
}
