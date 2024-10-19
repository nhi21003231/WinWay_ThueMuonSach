<?php

namespace Database\Factories;

use App\Models\AnPham;
use App\Models\HoaDonThue;
use App\Models\KhachHang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HoaDonThueFactory extends Factory
{
    protected $model = HoaDonThue::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
       
    public function definition(): array
    {
        $loaidon = ['Đơn thuê','Đơn đặt trước'];
        return [
            'NgayThue' =>$this->faker->date(),
            'LoaiDon' =>$this->faker->randomElement($loaidon),
            'id_khachhang' => $this->faker->randomElement(KhachHang::Pluck('id')),
            'id_anpham' => $this->faker->randomElement(AnPham::Pluck('id'))
            //
        ];
    }
}
