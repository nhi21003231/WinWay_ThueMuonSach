<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\HoaDonThueAnPham;
use App\Models\KhachHang;
use App\Models\NhanVien;
use Carbon\Carbon;

class HoaDonThueAnPhamFactory extends Factory
{
    protected $model = HoaDonThueAnPham::class;

    public function definition(): array
    {
        $ngayThue = $this->faker->dateTimeBetween('2024-10-01', '2024-12-31');
        $ngayTra = Carbon::instance($ngayThue)->addDays(15);

        // Random loaidon
        $loaiDon = $this->faker->randomElement(['Đặt trước', 'Đơn thuê']);

        // Set trangthai dựa trên loaidon
        $trangThai = $loaiDon === 'Đặt trước'
            ? 'Đang xử lý'
            : $this->faker->randomElement(['Đang xử lý', 'Đang thuê', 'Đã trả']);

        return [
            'ngaythue' => $ngayThue->format('Y-m-d'),
            'ngaytra' => $ngayTra->format('Y-m-d'),
            'phitracham' => $this->faker->randomFloat(2, 0, 100), // Phí trễ hạn ngẫu nhiên
            'ngaythanhtoan' => $this->faker->date(),
            'phuongthucthanhtoan' => $this->faker->randomElement(['Momo', 'Chuyển khoản']),
            'loaidon' => $loaiDon,
            'trangthai' => $trangThai,
            'manhanvien' => NhanVien::inRandomOrder()->first()->manhanvien, // Lấy nhân viên ngẫu nhiên
            'makhachhang' => KhachHang::inRandomOrder()->first()->makhachhang, // Lấy khách hàng ngẫu nhiên
        ];
    }
}
