<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NhanVien;

class NhanVienSeeder extends Seeder
{
    public function run(): void
    {
        NhanVien::create([
            'hoten' => 'Thành Phát',
            'sodienthoai' => '0901234567',
            'email' => 'quanly@gmail.com',
            'mataikhoan' => '2',
        ]);

        NhanVien::create([
            'hoten' => 'Quang Huy',
            'sodienthoai' => '0901234568',
            'email' => 'quanlykho@gmail.com',
            'mataikhoan' => '3',
        ]);

        NhanVien::create([
            'hoten' => 'Thanh Bá',
            'sodienthoai' => '0901234569',
            'email' => 'nhanvien1@gmail.com',
            'mataikhoan' => '4',
        ]);

        NhanVien::create([
            'hoten' => 'Duy Cường',
            'sodienthoai' => '0901234589',
            'email' => 'nhanvien2@gmail.com',
            'mataikhoan' => '5',
        ]);
        NhanVien::create([
            'hoten' => 'Võ Văn Nhí',
            'sodienthoai' => '0912345678',
            'email' => 'admin@gmail.com',
            'mataikhoan' => '1',
        ]);

        NhanVien::create([
            'hoten' => 'Nhân viên text 6',
            'sodienthoai' => '0912345678',
            'email' => 'text6@gmail.com',
            'mataikhoan' => '6',
        ]);

        NhanVien::create([
            'hoten' => 'Nhân viên text 7',
            'sodienthoai' => '0912345678',
            'email' => 'text7@gmail.com',
            'mataikhoan' => '7',
        ]);

        NhanVien::create([
            'hoten' => 'Nhân viên text 8',
            'sodienthoai' => '0912345678',
            'email' => 'text8@gmail.com',
            'mataikhoan' => '8',
        ]);

        NhanVien::create([
            'hoten' => 'Nhân viên text 9',
            'sodienthoai' => '0912345678',
            'email' => 'text9@gmail.com',
            'mataikhoan' => '9',
        ]);

        NhanVien::create([
            'hoten' => 'Nhân viên text 10',
            'sodienthoai' => '0912345678',
            'email' => 'text10@gmail.com',
            'mataikhoan' => '10',
        ]);

        NhanVien::create([
            'hoten' => 'Nhân viên text 11',
            'sodienthoai' => '0912345678',
            'email' => 'text11@gmail.com',
            'mataikhoan' => '11',
        ]);



        // Tạo một số nhân viên ngẫu nhiên
        // NhanVien::factory()->count(10)->create();
    }
}
