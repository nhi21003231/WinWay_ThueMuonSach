<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(DanhMucSeeder::class);
        $this->call(ChiTietAnPhamSeeder::class);
        $this->call(DsAnPhamSeeder::class);
        $this->call(TaiKhoanSeeder::class);
        $this->call(KhachHangSeeder::class);
        $this->call(DanhGiaSeeder::class);
        $this->call(GioHangSeeder::class);
        $this->call(NhanVienSeeder::class);
        $this->call(ChamCongSeeder::class);
        $this->call(BaiBaoSeeder::class);
        $this->call(ChuongTrinhKhuyenMaiSeeder::class);
        $this->call(HoaDonThueAnPhamSeeder::class);
        $this->call(ChiTietHoaDonThueSeeder::class);

        // // Tạo dữ liệu cho bảng tài khoản 
        // \App\Models\TaiKhoan::factory(10)->create();

        // // Tạo dữ liệu cho các bảng khác
        // \App\Models\AnPham::factory(20)->create();
        // \App\Models\KhachHang::factory(10)->create();
        // \App\Models\HoaDonThue::factory(50)->create();
        // // Phát 23/10
        // \App\Models\NhanVien::factory(50)->create();
        // \App\Models\ChamCong::factory(50)->create();
    }
}
