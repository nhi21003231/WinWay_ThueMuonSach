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
        DsAnPham::factory(50)->create();
    }
}
