<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BaiBao;

class BaiBaoSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo một số bài báo ngẫu nhiên
        BaiBao::factory()->count(15)->create();
    }
}
