<?php

namespace Database\Seeders;

use App\Models\DanhGia;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DanhGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DanhGia::factory()->count(100)->create();
        
        // Đánh giá cho maanpham = 1
        DanhGia::create([
            'binhluan' => 'Sản phẩm tốt 1. Đáng mua',
            'trangthai' => true,
            'sosao' => 5,
            'ngaydanhgia' => Carbon::createFromFormat('d/m/Y H:i', '30/10/2024 11:00')->format('Y-m-d H:i:s'),
            'maanpham' => 1,
            'makhachhang' => 1,
        ]);

        DanhGia::create([
            'binhluan' => 'Sản phẩm tốt 2',
            'trangthai' => true,
            'sosao' => 4,
            'ngaydanhgia' => Carbon::createFromFormat('d/m/Y H:i', '29/10/2024 16:00')->format('Y-m-d H:i:s'),
            'maanpham' => 1,
            'makhachhang' => 2,
        ]);
        DanhGia::create([
            'binhluan' => 'Sản phẩm tốt 3',
            'trangthai' => true,
            'sosao' => 3,
            'ngaydanhgia' => Carbon::createFromFormat('d/m/Y H:i', '28/10/2024 20:35')->format('Y-m-d H:i:s'),
            'maanpham' => 1,
            'makhachhang' => 3,
        ]);

        // Đánh giá cho maanpham = 2
        DanhGia::create([
            'binhluan' => 'Sản phẩm tốt 1. Đáng mua',
            'trangthai' => true,
            'sosao' => 5,
            'ngaydanhgia' => Carbon::createFromFormat('d/m/Y H:i', '11/09/2024 13:00')->format('Y-m-d H:i:s'),
            'maanpham' => 2,
            'makhachhang' => 6,
        ]);

        DanhGia::create([
            'binhluan' => 'Sản phẩm tốt 2',
            'trangthai' => true,
            'sosao' => 4,
            'ngaydanhgia' => Carbon::createFromFormat('d/m/Y H:i', '07/09/2024 12:40')->format('Y-m-d H:i:s'),
            'maanpham' => 2,
            'makhachhang' => 9,
        ]);
        DanhGia::create([
            'binhluan' => 'Sản phẩm tốt 3',
            'trangthai' => true,
            'sosao' => 3,
            'ngaydanhgia' => Carbon::createFromFormat('d/m/Y H:i', '20/10/2024 09:30')->format('Y-m-d H:i:s'),
            'maanpham' => 2,
            'makhachhang' => 9,
        ]);

        // Đánh giá cho maanpham = 3
        DanhGia::create([
            'binhluan' => 'Sản phẩm tốt 1. Đáng mua',
            'trangthai' => true,
            'sosao' => 5,
            'ngaydanhgia' => Carbon::createFromFormat('d/m/Y H:i', '11/09/2024 13:00')->format('Y-m-d H:i:s'),
            'maanpham' => 3,
            'makhachhang' => 6,
        ]);

        DanhGia::create([
            'binhluan' => 'Sản phẩm tốt 2',
            'trangthai' => true,
            'sosao' => 4,
            'ngaydanhgia' => Carbon::createFromFormat('d/m/Y H:i', '07/09/2024 12:40')->format('Y-m-d H:i:s'),
            'maanpham' => 3,
            'makhachhang' => 9,
        ]);
        DanhGia::create([
            'binhluan' => 'Sản phẩm tốt 3',
            'trangthai' => true,
            'sosao' => 3,
            'ngaydanhgia' => Carbon::createFromFormat('d/m/Y H:i', '20/10/2024 09:30')->format('Y-m-d H:i:s'),
            'maanpham' => 3,
            'makhachhang' => 9,
        ]);

    }
}
