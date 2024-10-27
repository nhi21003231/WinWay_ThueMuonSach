<?php

namespace Database\Factories;

use App\Models\KhachHang;
use App\Models\TaiKhoan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KhachHang>
 */
class KhachHangFactory extends Factory
{
    protected $model = KhachHang::class;

    public function definition(): array
    {
        return [
            'hoten' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'dienthoai' => $this->faker->phoneNumber(),
            'diachi' => $this->faker->address(),
            'lathanhvien' => $this->faker->boolean(),
            'mataikhoan' => TaiKhoan::where('vaitro', 'khachhang')->inRandomOrder()->first()->mataikhoan, // Chỉ chọn tài khoản có vai trò "khachhang"
        ];
    }
}
