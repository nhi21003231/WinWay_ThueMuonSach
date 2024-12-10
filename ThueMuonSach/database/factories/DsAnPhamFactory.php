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

        // Khởi tạo mã chi tiết sản phẩm ngẫu nhiên
        $mactanpham = ChiTietAnPham::inRandomOrder()->first()->mactanpham;

        // Kiểm tra nếu mã sản phẩm là 4 thì đặt dathue = 1
        $dathue = $mactanpham == 4 ? 1 : ($tinhtrang === 'Hư hỏng' ? 0 : $this->faker->boolean());

        // Nếu "dathue" là true, "dathanhly" phải là false; nếu "dathue" là false, "dathanhly" ngẫu nhiên
        $dathanhly = $dathue ? false : $this->faker->boolean();

        return [
            'tinhtrang' => $tinhtrang,
            'vitri' => $this->faker->streetAddress(), // Vị trí ngẫu nhiên
            'dathue' => $dathue,
            'dathanhly' => $dathanhly,
            'mactanpham' => $mactanpham, // Mã chi tiết sản phẩm
        ];
    }
}
