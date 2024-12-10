<?php

namespace Database\Seeders;

use App\Models\DsAnPham;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DsAnPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'maanpham' => 1,
                'tinhtrang' => 'Mới',
                'vitri' => 'Kệ 1, Hàng 1',
                'dathue' => 1,
                'dathanhly' => 0,
                'mactanpham' => 1,
                'created_at' => '2024-01-15 10:00:00',
                'updated_at' => '2024-01-15 10:00:00',
            ],
            [
                'maanpham' => 2,
                'tinhtrang' => 'Mới',
                'vitri' => 'Kệ 2, Hàng 1',
                'dathue' => 1,
                'dathanhly' => 0,
                'mactanpham' => 2,
                'created_at' => '2024-01-15 10:00:00',
                'updated_at' => '2024-01-15 10:00:00',
            ],
            [
                'maanpham' => 3,
                'tinhtrang' => 'Mới',
                'vitri' => 'Kệ 1, Hàng 1',
                'dathue' => 1,
                'dathanhly' => 0,
                'mactanpham' => 3,
                'created_at' => '2024-01-15 10:00:00',
                'updated_at' => '2024-01-15 10:00:00',
            ],

        ];

        foreach ($data as $item) {
            DsAnPham::create($item);
        }

        DsAnPham::factory(300)->create();
    }
}
