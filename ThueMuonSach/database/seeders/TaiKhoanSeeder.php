<?php

namespace Database\Seeders;

use App\Models\TaiKhoan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo các tài khoản mẫu với vai trò khác nhau
        TaiKhoan::create([
            'ten_tai_khoan' => 'quanly',
            'mat_khau' => '123', // Sẽ được mã hóa tự động nhờ model TaiKhoan
            'vai_tro' => 'quanlycuahang',
        ]);

        TaiKhoan::create([
            'ten_tai_khoan' => 'quanlykho',
            'mat_khau' => '123',
            'vai_tro' => 'quanlykho',
        ]);

        TaiKhoan::create([
            'ten_tai_khoan' => 'nhanvien1',
            'mat_khau' => '123',
            'vai_tro' => 'nhanvien',
        ]);

        TaiKhoan::create([
            'ten_tai_khoan' => 'khachhang1',
            'mat_khau' => '123',
            'vai_tro' => 'khachhang',
        ]);
    }
}
