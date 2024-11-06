<?php

namespace Database\Factories;

use App\Models\ChiTietAnPham;
use App\Models\DsAnPham;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DsAnPham>
 */
class DsAnPhamFactory extends Factory
{
    protected $model = DsAnPham::class;

    public function definition(): array
    {
        // Khởi tạo ngẫu nhiên tình trạng
        $tinhtrang = $this->faker->randomElement(['Mới', 'Cũ', 'Hư hỏng']);

        // Nếu tình trạng là "Hư hỏng", đặt "dathue" là false
        $dathue = $tinhtrang === 'Hư hỏng' ? false : $this->faker->boolean();

        // Nếu "dathue" là true, "dathanhly" phải là false; nếu "dathue" là false, "dathanhly" ngẫu nhiên
        $dathanhly = $dathue ? false : $this->faker->boolean();

        return [
            'tinhtrang' => $tinhtrang,
            'giathue' => $this->faker->randomFloat(2, 10000, 500000), // Giá thuê ngẫu nhiên
            'giacoc' => $this->faker->randomFloat(2, 20000, 1000000), // Giá cọc ngẫu nhiên
            'vitri' => $this->faker->streetAddress(), // Vị trí ngẫu nhiên
            'dathue' => $dathue,
            'dathanhly' => $dathanhly,
            'mactanpham' => ChiTietAnPham::inRandomOrder()->first()->mactanpham, // Sử dụng mã chi tiết ấn phẩm có sẵn
        ];
    }
}
