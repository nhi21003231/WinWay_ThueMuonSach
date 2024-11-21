<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\GioHang;
use App\Models\DsAnPham;
use App\Models\KhachHang;

class GioHangFactory extends Factory
{
    protected $model = GioHang::class;

    public function definition(): array
    {
        return [
            'maanpham' => DsAnPham::inRandomOrder()->first()->maanpham, // Lấy sản phẩm ngẫu nhiên
            'makhachhang' => KhachHang::inRandomOrder()->first()->makhachhang, // Lấy khách hàng ngẫu nhiên
            'soluong' => 1, // Số lượng mặc định là 1
        ];
    }
}
