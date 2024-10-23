<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ChamCong; // Đảm bảo rằng model ChamCong đã được tạo
use App\Models\NhanVien;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChamCong>
 */
class ChamCongFactory extends Factory
{
    protected $model = ChamCong::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'thoiGianVao' => $this->faker->dateTimeBetween('-1 month', 'now'), // Tạo thời gian vào ngẫu nhiên trong vòng 1 tháng qua
            'thoiGianRa' => $this->faker->dateTimeBetween('now', '+1 hours'), // Tạo thời gian ra ngẫu nhiên trong 1 giờ sau thời gian vào
            'ghiNhan' => $this->faker->randomElement(['Có mặt', 'Vắng mặt']),
            'maNhanVien' => NhanVien::factory(), // Liên kết với một nhân viên ngẫu nhiên
        ];
    }
}
