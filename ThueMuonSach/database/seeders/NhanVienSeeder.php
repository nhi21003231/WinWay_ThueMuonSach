<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NhanVien;

class NhanVienSeeder extends Seeder
{
    public function run(): void
    {
        NhanVien::create([
            'hoten' => 'ho ten admin',
            'sodienthoai' => '123',
            'email' => 'admin@gmail.com',
            'mataikhoan' => '1',
        ]);

        NhanVien::create([
            'hoten' => 'ho ten quanlycuahang',
            'sodienthoai' => '123',
            'email' => 'quanlycuahang@gmail.com',
            'mataikhoan' => '2',
        ]);

        NhanVien::create([
            'hoten' => 'ho ten quanlykho',
            'sodienthoai' => '123',
            'email' => 'quanlykho@gmail.com',
            'mataikhoan' => '3',
        ]);

        NhanVien::create([
            'hoten' => 'ho ten nhanvien1',
            'sodienthoai' => '123',
            'email' => 'nhanvien1@gmail.com',
            'mataikhoan' => '4',
        ]);

        NhanVien::create([
            'hoten' => 'ho ten nhanvien2',
            'sodienthoai' => '123',
            'email' => 'nhanvien2@gmail.com',
            'mataikhoan' => '5',
        ]);

        NhanVien::create([
            'hoten' => 'ho ten nhanvien3',
            'sodienthoai' => '123',
            'email' => 'nhanvien3@gmail.com',
            'mataikhoan' => '6',
        ]);

        // Tạo một số nhân viên ngẫu nhiên
        // NhanVien::factory()->count(10)->create();
    }
}
