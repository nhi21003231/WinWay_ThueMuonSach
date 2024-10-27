<?php

namespace Database\Seeders;

use App\Models\ChiTietAnPham;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChiTietAnPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChiTietAnPham::factory(20)->create();
    }
}
