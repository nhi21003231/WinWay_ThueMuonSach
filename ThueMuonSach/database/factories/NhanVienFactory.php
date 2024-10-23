<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\NhanVien;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NhanVien>
 */
class NhanVienFactory extends Factory
{
    protected $model = NhanVien::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hoTen' => $this->faker->name(),
            'soDienThoai' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'chucVu' => $this->faker->randomElement(['Quản lý cửa hàng', 'Quản lý kho', 'Thuê trả']),
            'ngayBoNhiem' => $this->faker->dateTime(),
            'phuCap' => $this->faker->randomFloat(2, 500000, 5000000), // Giá trị ngẫu nhiên từ 500k đến 5 triệu
            // 'maTaiKhoan' => TaiKhoan::factory()
        ];
    }
}
