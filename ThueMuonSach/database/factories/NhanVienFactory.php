<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\NhanVien;
use App\Models\TaiKhoan;

class NhanVienFactory extends Factory
{
    protected $model = NhanVien::class;

    public function definition(): array
    {
        return [
            'hoten' => $this->faker->name(),
            'sodienthoai' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'mataikhoan' => TaiKhoan::inRandomOrder()->first()->mataikhoan, // Lấy tài khoản ngẫu nhiên
        ];
    }
}
