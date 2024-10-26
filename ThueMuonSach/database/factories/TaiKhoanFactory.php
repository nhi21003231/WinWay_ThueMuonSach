<?php

namespace Database\Factories;

use App\Models\TaiKhoan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class TaiKhoanFactory extends Factory
{
    protected $model = TaiKhoan::class;

    public function definition(): array
    {
        return [
            'taikhoan' => $this->faker->unique()->userName,
            'matkhau' => Hash::make('123'), 
            'vaitro' => 'khachhang', 
        ];
    }
}
