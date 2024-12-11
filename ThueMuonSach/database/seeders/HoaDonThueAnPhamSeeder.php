<?php

namespace Database\Seeders;

use App\Models\ChiTietHoaDonThue;
use Illuminate\Database\Seeder;
use App\Models\HoaDonThueAnPham;
use App\Models\DsAnPham; // Import the model for 'ds_anpham'

class HoaDonThueAnPhamSeeder extends Seeder
{
    public function run(): void
    {

        $data = [
            [
                'mahoadon' => 1,
                'ngaythue' => '2024-06-04',
                'ngaytra' => '2024-06-19',
                'phitracham' => 0,
                'thanhtien' => 100000 + 120000 + 130000,
                'ngaythanhtoan' => '2024-06-04',
                'phuongthucthanhtoan' => 'Momo',
                'mathamchieu' => null,
                'loaidon' => 'Đơn thuê',
                'trangthai' => 'Đang thuê',
                'soluongthue' => 3,
                'manhanvien' => 1,
                'makhachhang' => 51,
                'mactanpham' => null,
                'created_at' => '2024-06-01 08:00:00',
                'updated_at' => '2024-06-01 08:00:00'
            ],
            [
                'mahoadon' => 2,
                'ngaythue' => '2024-07-01',
                'ngaytra' => '2024-07-16',
                'phitracham' => 0,
                'thanhtien' => 140000,
                'ngaythanhtoan' => '2024-07-01',
                'phuongthucthanhtoan' => 'Momo',
                'mathamchieu' => null,
                'loaidon' => 'Đặt trước',
                'trangthai' => 'Đang xử lý',
                'soluongthue' => 1,
                'manhanvien' => 1,
                'makhachhang' => 10,
                'mactanpham' => 4,
                'created_at' => '2024-06-01 08:00:00',
                'updated_at' => '2024-06-01 08:00:00'
            ]
        ];

        foreach ($data as $item) {
            HoaDonThueAnPham::create($item);
        }


        $data = [
            [
                'macthoadon' => 1,
                'mahoadon' => 1,
                'maanpham' => 1,
                'created_at' => '2024-06-01 08:00:00',
                'updated_at' => '2024-06-01 08:00:00'
            ],
            [
                'macthoadon' => 2,
                'mahoadon' => 1,
                'maanpham' => 2,
                'created_at' => '2024-06-01 08:00:00',
                'updated_at' => '2024-06-01 08:00:00'
            ],
            [
                'macthoadon' => 3,
                'mahoadon' => 1,
                'maanpham' => 3,
                'created_at' => '2024-06-01 08:00:00',
                'updated_at' => '2024-06-01 08:00:00'
            ]
        ];

        foreach ($data as $item) {
            ChiTietHoaDonThue::create($item);
        }


        // Tạo một số hóa đơn thuê ngẫu nhiên
        $hoaDons = HoaDonThueAnPham::factory()->count(50)->create();

        foreach ($hoaDons as $hoaDon) {
            // Số lượng chi tiết ngẫu nhiên cho mỗi hóa đơn
            if ($hoaDon->loaidon == 'Đơn thuê') {
                // Get only available items (not rented and not marked for liquidation)
                $availableItems = DsAnPham::where('dathue', false)
                    ->where('dathanhly', false)
                    ->get();

                // Ensure there is at least one available item to add to the invoice details
                if ($availableItems->isNotEmpty()) {
                    $item = $availableItems->random(); // Pick a random available item

                    // Create a new invoice detail
                    ChiTietHoaDonThue::create([
                        'mahoadon' => $hoaDon->mahoadon,
                        'maanpham' => $item->maanpham,
                    ]);
                }
            }
        }
    }
}
