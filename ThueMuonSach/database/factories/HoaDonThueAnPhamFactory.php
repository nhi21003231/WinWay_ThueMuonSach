<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\HoaDonThueAnPham;
use App\Models\KhachHang;
use App\Models\NhanVien;

class HoaDonThueAnPhamFactory extends Factory
{
    protected $model = HoaDonThueAnPham::class;

    public function definition(): array
    {
        return [
            'ngaythue' => $this->faker->date(),
            'ngaytra' => $this->faker->date(),
            'phitracham' => $this->faker->randomFloat(2, 0, 100), // Phí trễ hạn ngẫu nhiên
            'ngaythanhtoan' => $this->faker->date(),
            'phuongthucthanhtoan' => $this->faker->randomElement(['Tiền mặt', 'Chuyển khoản']),
            'loaidon' => $this->faker->randomElement(['Đặt trước', 'Đơn thuê']),
            'trangthai' => $this->faker->randomElement(['Đang thuê', 'Đã trả']),
            'manhanvien' => NhanVien::inRandomOrder()->first()->manhanvien, // Lấy nhân viên ngẫu nhiên
            'makhachhang' => KhachHang::inRandomOrder()->first()->makhachhang, // Lấy khách hàng ngẫu nhiên
        ];
    }
}
