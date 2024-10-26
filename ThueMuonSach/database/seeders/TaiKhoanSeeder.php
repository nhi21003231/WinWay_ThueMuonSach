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
        TaiKhoan::create([
            'taikhoan' => 'admin',
            'matkhau' => '123',
            'vaitro' => 'admin',
        ]);

        TaiKhoan::create([
            'taikhoan' => 'quanly',
            'matkhau' => '123',
            'vaitro' => 'quanlycuahang',
        ]);

        TaiKhoan::create([
            'taikhoan' => 'quanlykho',
            'matkhau' => '123',
            'vaitro' => 'quanlykho',
        ]);

        TaiKhoan::create([
            'taikhoan' => 'nhanvien1',
            'matkhau' => '123',
            'vaitro' => 'nhanvien',
        ]);

        TaiKhoan::create([
            'taikhoan' => 'nhanvien2',
            'matkhau' => '123',
            'vaitro' => 'nhanvien',
        ]);

        TaiKhoan::create([
            'taikhoan' => 'nhanvien3',
            'matkhau' => '123',
            'vaitro' => 'nhanvien',
        ]);

        TaiKhoan::create([
            'taikhoan' => 'khachhang',
            'matkhau' => '123',
            'vaitro' => 'khachhang',
        ]);
    }
}
