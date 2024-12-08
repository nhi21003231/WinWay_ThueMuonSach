<?php

namespace Database\Seeders;

use App\Models\KhachHang;
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
            'tentaikhoan' => 'admin',
            'matkhau' => '123',
            'vaitro' => 'admin',
        ]);

        TaiKhoan::create([
            'tentaikhoan' => 'quanlycuahang',
            'matkhau' => '123',
            'vaitro' => 'quanlycuahang',
        ]);

        TaiKhoan::create([
            'tentaikhoan' => 'quanlykho',
            'matkhau' => '123',
            'vaitro' => 'quanlykho',
        ]);

        TaiKhoan::create([
            'tentaikhoan' => 'nhanvien1',
            'matkhau' => '123',
            'vaitro' => 'nhanvien',
        ]);

        TaiKhoan::create([
            'tentaikhoan' => 'nhanvien2',
            'matkhau' => '123',
            'vaitro' => 'nhanvien',
        ]);

        TaiKhoan::create([
            'tentaikhoan' => 'nhanvien3',
            'matkhau' => '123',
            'vaitro' => 'nhanvien',
        ]);

        TaiKhoan::create([
            'tentaikhoan' => 'khachhang',
            'matkhau' => '123',
            'vaitro' => 'khachhang',
        ]);

        $taikhoans = TaiKhoan::factory(50)->create();

        foreach ($taikhoans as $taikhoan) {
            KhachHang::factory()->create([
                'mataikhoan' => $taikhoan->mataikhoan
            ]);
        }
    }
}
