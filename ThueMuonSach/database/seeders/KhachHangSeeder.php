<?php

namespace Database\Seeders;

use App\Models\KhachHang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KhachHang::create([
            'hoten' => 'Nguyễn Văn A',
            'email' => 'nguyenvana@example.com',
            'dienthoai' => '0901234567',
            'diachi' => '123 Đường ABC, Quận 1, TP.HCM',
            'lathanhvien' => true,
            'mataikhoan' => 10,
        ]);

        // KhachHang::factory(20)->create();
    }
}
