<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tạo dữ liệu cho bảng tài khoản 
        $this->call(TaiKhoanSeeder::class);
        // \App\Models\TaiKhoan::factory(1)->create();

        // Tạo dữ liệu cho các bảng khác
        \App\Models\AnPham::factory(20)->create();
        \App\Models\KhachHang::factory(10)->create();
        \App\Models\HoaDonThue::factory(50)->create();
    }
}
