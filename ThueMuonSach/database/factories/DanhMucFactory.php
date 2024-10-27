<?php

namespace Database\Factories;

use App\Models\DanhMuc;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DanhMuc>
 */
class DanhMucFactory extends Factory
{
    protected $model = DanhMuc::class;

    public function definition(): array
    {
        return [
            'tendanhmuc' => $this->faker->words(2, true),
            'mota' => $this->faker->sentence(10),
        ];
    }
}
