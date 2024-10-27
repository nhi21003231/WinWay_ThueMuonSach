<?php

namespace Database\Factories;

use App\Models\TaiKhoan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaiKhoan>
 */
class TaiKhoanFactory extends Factory
{
    protected $model = TaiKhoan::class;

    public function definition(): array
    {
        return [
            'tentaikhoan' => $this->faker->unique()->userName,
            'matkhau' => Hash::make('123'), 
            'vaitro' => 'khachhang', 
        ];
    }
}
