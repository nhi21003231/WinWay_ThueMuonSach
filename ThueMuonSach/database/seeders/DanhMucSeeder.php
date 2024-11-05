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
            ['tendanhmuc' => 'Sách Kinh Tế', 'mota' => 'Sách về kinh tế, tài chính, và quản trị kinh doanh'],
            ['tendanhmuc' => 'Sách Y Học', 'mota' => 'Sách về y học và sức khỏe'],
            ['tendanhmuc' => 'Sách Công Nghệ', 'mota' => 'Sách về công nghệ thông tin, lập trình và kỹ thuật'],
            ['tendanhmuc' => 'Sách Nghệ Thuật', 'mota' => 'Các sách về nghệ thuật, hội họa, âm nhạc và sân khấu'],
            ['tendanhmuc' => 'Sách Thiếu Nhi', 'mota' => 'Sách dành cho trẻ em, thiếu nhi và thiếu niên'],
            ['tendanhmuc' => 'Sách Thể Thao', 'mota' => 'Sách về các bộ môn thể thao và rèn luyện thể chất'],
            ['tendanhmuc' => 'Sách Du Lịch', 'mota' => 'Sách về du lịch, văn hóa, và phong tục các vùng miền'],
            ['tendanhmuc' => 'Sách khác', 'mota' => 'Danh mục không xác định'],
        ];

        foreach ($data as $item) {
            DanhMuc::create($item);
        }

        // DanhMuc::factory(10)->create();
    }
}
