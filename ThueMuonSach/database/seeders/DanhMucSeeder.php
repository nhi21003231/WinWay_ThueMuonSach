<?php

namespace Database\Seeders;

use App\Models\DanhMuc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['tendanhmuc' => 'Sách Giáo Khoa', 'mota' => 'Các loại sách giáo khoa cho học sinh, sinh viên'],
            ['tendanhmuc' => 'Sách Khoa Học', 'mota' => 'Sách về khoa học tự nhiên và khoa học xã hội'],
            ['tendanhmuc' => 'Sách Văn Học', 'mota' => 'Các tác phẩm văn học cổ điển và hiện đại'],
            ['tendanhmuc' => 'Sách Lịch Sử', 'mota' => 'Sách liên quan đến các sự kiện lịch sử thế giới và Việt Nam'],
            ['tendanhmuc' => 'Sách Tâm Lý', 'mota' => 'Các loại sách về tâm lý học và phát triển bản thân'],
        ];

        foreach ($data as $item) {
            DanhMuc::create($item);
        }

        DanhMuc::factory(10)->create();
    }
}
