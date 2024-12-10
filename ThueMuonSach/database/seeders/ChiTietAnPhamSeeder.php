<?php

namespace Database\Seeders;

use App\Models\ChiTietAnPham;
use Illuminate\Database\Seeder;

class ChiTietAnPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Sách Giáo Khoa
            ['tenanpham' => 'Toán 12', 'tacgia' => 'Bộ Giáo dục và Đào tạo', 'namxuatban' => 2023, 'madanhmuc' => 1, 'hinhanh' => 'toan-12.jpg', 'giacoc' => 100000, 'giathue' => 50000],
            ['tenanpham' => 'Văn 12', 'tacgia' => 'Bộ Giáo dục và Đào tạo', 'namxuatban' => 2023, 'madanhmuc' => 1, 'hinhanh' => 'van-12.jpg'],
            ['tenanpham' => 'Hóa học 12', 'tacgia' => 'Bộ Giáo dục và Đào tạo', 'namxuatban' => 2023, 'madanhmuc' => 1, 'hinhanh' => 'hoa-hoc-12.jpg'],
            ['tenanpham' => 'Sinh học 12', 'tacgia' => 'Bộ Giáo dục và Đào tạo', 'namxuatban' => 2023, 'madanhmuc' => 1, 'hinhanh' => 'sinh-hoc-12.jpg'],
            ['tenanpham' => 'Lịch sử 12', 'tacgia' => 'Bộ Giáo dục và Đào tạo', 'namxuatban' => 2023, 'madanhmuc' => 1, 'hinhanh' => 'lich-su-12.jpg'],
            ['tenanpham' => 'Địa lý 12', 'tacgia' => 'Bộ Giáo dục và Đào tạo', 'namxuatban' => 2023, 'madanhmuc' => 1, 'hinhanh' => 'dia-ly-12.jpg'],

            // Sách Khoa Học
            ['tenanpham' => 'Nguồn gốc các loài', 'tacgia' => 'Charles Darwin', 'namxuatban' => 1859, 'madanhmuc' => 2, 'hinhanh' => 'nguon-goc-cac-loai.jpg'],
            ['tenanpham' => 'Lược sử loài người', 'tacgia' => 'Yuval Noah Harari', 'namxuatban' => 2011, 'madanhmuc' => 2, 'hinhanh' => 'luoc-su-loai-nguoi.jpg'],

            // Sách Văn Học
            ['tenanpham' => 'Chiến tranh và Hòa bình', 'tacgia' => 'Leo Tolstoy', 'namxuatban' => 1869, 'madanhmuc' => 3, 'hinhanh' => 'chien-tranh-va-hoa-binh.jpg'],
            ['tenanpham' => 'Đồi gió hú', 'tacgia' => 'Emily Brontë', 'namxuatban' => 1847, 'madanhmuc' => 3, 'hinhanh' => 'doi-gio-hu.jpg'],
            ['tenanpham' => 'Trăm năm cô đơn', 'tacgia' => 'Gabriel García Márquez', 'namxuatban' => 1967, 'madanhmuc' => 3, 'hinhanh' => 'tram-nam-co-don.jpg'],
            ['tenanpham' => 'Đoạn Tuyệt', 'tacgia' => 'Nhất Linh', 'namxuatban' => 1935, 'madanhmuc' => 3, 'hinhanh' => 'doan-tuyet.jpg'],
            ['tenanpham' => 'Truyện Kiều', 'tacgia' => 'Nguyễn Du', 'namxuatban' => 1820, 'madanhmuc' => 3, 'hinhanh' => 'truyen-kieu.jpg'],
            ['tenanpham' => 'Nắng Tháng Tám', 'tacgia' => 'William Faulkner', 'namxuatban' => 1932, 'madanhmuc' => 3, 'hinhanh' => 'nang-thang-tam.jpg'],

            // Sách Lịch Sử
            ['tenanpham' => 'Lịch sử thế giới', 'tacgia' => 'William H. McNeill', 'namxuatban' => 1963, 'madanhmuc' => 4, 'hinhanh' => 'lich-su-the-gioi.jpg'],
            ['tenanpham' => 'Lịch Sử Việt Nam', 'tacgia' => 'Phan Huy Lê', 'namxuatban' => 1990, 'madanhmuc' => 4, 'hinhanh' => 'lich-su-viet-nam.jpg'],

            // Sách Tâm Lý
            ['tenanpham' => 'Tâm lý học đám đông', 'tacgia' => 'Gustave Le Bon', 'namxuatban' => 1895, 'madanhmuc' => 5, 'hinhanh' => 'tam-ly-hoc-dam-dong.jpg'],
            ['tenanpham' => 'Đắc nhân tâm', 'tacgia' => 'Dale Carnegie', 'namxuatban' => 1936, 'madanhmuc' => 5, 'hinhanh' => 'dac-nhan-tam.jpg'],
            ['tenanpham' => '7 thói quen để thành đạt', 'tacgia' => 'Stephen Covey', 'namxuatban' => 1989, 'madanhmuc' => 5, 'hinhanh' => '7-thoi-quen-de-thanh-dat.jpg'],

            // Sách Kinh Tế
            ['tenanpham' => 'Cha giàu cha nghèo', 'tacgia' => 'Robert Kiyosaki', 'namxuatban' => 1997, 'madanhmuc' => 6, 'hinhanh' => 'cha-giau-cha-ngheo.jpg'],
            ['tenanpham' => 'Kinh tế học cơ bản', 'tacgia' => 'Thomas Sowell', 'namxuatban' => 2000, 'madanhmuc' => 6, 'hinhanh' => 'kinh-te-hoc-co-ban.jpg'],

            // Sách Y Học
            ['tenanpham' => 'Giải phẫu người', 'tacgia' => 'Henry Gray', 'namxuatban' => 1858, 'madanhmuc' => 7, 'hinhanh' => 'giai-phau-nguoi.jpg'],

            // Sách Công Nghệ
            ['tenanpham' => 'Lập trình Python', 'tacgia' => 'Mark Lutz', 'namxuatban' => 2013, 'madanhmuc' => 8, 'hinhanh' => 'lap-trinh-python.jpg'],
            ['tenanpham' => 'Mật mã và an toàn thông tin', 'tacgia' => 'Bruce Schneier', 'namxuatban' => 1996, 'madanhmuc' => 8, 'hinhanh' => 'mat-ma-an-toan-thong-tin.jpg'],
            ['tenanpham' => 'Công nghệ blockchain', 'tacgia' => 'Arvind Narayanan', 'namxuatban' => 2016, 'madanhmuc' => 8, 'hinhanh' => 'cong-nghe-blockchain.jpg'],

            // Sách Nghệ Thuật
            ['tenanpham' => 'Nghệ thuật sân khấu Việt Nam', 'tacgia' => 'Edward Gordon Craig', 'namxuatban' => 1911, 'madanhmuc' => 9, 'hinhanh' => 'nghe-thuat-san-khau.jpg'],
            ['tenanpham' => 'Nghệ thuật sống', 'tacgia' => 'Thich Nhat Hanh', 'namxuatban' => 2013, 'madanhmuc' => 9, 'hinhanh' => 'nghe-thuat-song.jpg'],

            // Sách Thiếu Nhi
            ['tenanpham' => 'Truyện cổ Grimm', 'tacgia' => 'Jacob & Wilhelm Grimm', 'namxuatban' => 1812, 'madanhmuc' => 10, 'hinhanh' => 'truyen-co-grimm.jpg'],
            ['tenanpham' => 'Harry Potter và Hòn đá phù thủy', 'tacgia' => 'J.K. Rowling', 'namxuatban' => 1997, 'madanhmuc' => 10, 'hinhanh' => 'harry-potter-hon-da-phu-thuy.jpg'],

            // Sách Thể Thao
            ['tenanpham' => 'Cẩm nang chạy bộ cho người lười', 'tacgia' => 'Christopher McDougall', 'namxuatban' => 2009, 'madanhmuc' => 11, 'hinhanh' => 'cam-nang-chay-bo-cho-nguoi-luoi.jpg'],
            ['tenanpham' => 'Bóng đá - World Cup - những góc khuất bí ẩn', 'tacgia' => 'Brian Glanville', 'namxuatban' => 2000, 'madanhmuc' => 11, 'hinhanh' => 'bong-da-world-cup-nhung-goc-khuat-bi-an.jpg'],

            // Sách Du Lịch
            ['tenanpham' => 'Tri thức Đông Nam Á', 'tacgia' => 'John Doe', 'namxuatban' => 2020, 'madanhmuc' => 12, 'hinhanh' => 'tri-thuc-dong-nam-a.jpg'],
            ['tenanpham' => 'Cẩm nang du lịch Nhật Bản', 'tacgia' => 'Lonely Planet', 'namxuatban' => 2018, 'madanhmuc' => 12, 'hinhanh' => 'cam-nang-du-lich-nhat-ban.jpg'],
            ['tenanpham' => 'Du lịch Việt Nam', 'tacgia' => 'Phan Huy Xu - Võ Văn Thành', 'namxuatban' => 2006, 'madanhmuc' => 12, 'hinhanh' => 'du-lich-viet-nam.jpg'],
        ];

        foreach ($data as $item) {
            $item['giacoc'] = rand( 50000, 200000); // Random deposit between 50,000 and 200,000
            $item['giathue'] = rand(10000, 50000); // Random rental price between 10,000 and 50,000

            ChiTietAnPham::create($item);
        }

        // ChiTietAnPham::factory(10)->create();
    }
}
