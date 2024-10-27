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

        // Tạo một số nhân viên ngẫu nhiên
        // NhanVien::factory()->count(10)->create();
    }
}
