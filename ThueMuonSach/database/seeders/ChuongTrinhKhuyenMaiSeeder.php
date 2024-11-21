<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChuongTrinhKhuyenMai;
use Carbon\Carbon;

class ChuongTrinhKhuyenMaiSeeder extends Seeder
{
    public function run(): void
    {
        ChuongTrinhKhuyenMai::create([
            'tenchuongtrinhkm' => 'Sale 20%',
            'mota' => 'Sale 20% cho khách hàng thành viên',
            'ngayapdung' => Carbon::createFromFormat('d/m/Y H:i', '18/03/2003 08:00'),
            'ngayketthuc' => Carbon::createFromFormat('d/m/Y H:i', '19/03/2003 23:59'),
            'manhanvien' => 2
        ]);

        ChuongTrinhKhuyenMai::create([
            'tenchuongtrinhkm' => 'Sale 50%',
            'mota' => 'Sale 50% nhân dịp lễ',
            'ngayapdung' => Carbon::createFromFormat('d/m/Y H:i', '23/03/2003 08:00'),
            'ngayketthuc' => Carbon::createFromFormat('d/m/Y H:i', '24/03/2003 23:59'),
            'manhanvien' => 2
        ]);
        ChuongTrinhKhuyenMai::create([
            'tenchuongtrinhkm' => 'Sale 50%',
            'mota' => 'Sale 50% nhân dịp lễ',
            'ngayapdung' => Carbon::createFromFormat('d/m/Y H:i', '23/03/2003 08:00'),
            'ngayketthuc' => Carbon::createFromFormat('d/m/Y H:i', '24/03/2003 23:59'),
            'manhanvien' => 2
        ]);
        ChuongTrinhKhuyenMai::create([
            'tenchuongtrinhkm' => 'Sale 50%',
            'mota' => 'Sale 50% nhân dịp lễ',
            'ngayapdung' => Carbon::createFromFormat('d/m/Y H:i', '23/03/2003 08:00'),
            'ngayketthuc' => Carbon::createFromFormat('d/m/Y H:i', '24/03/2003 23:59'),
            'manhanvien' => 2
        ]);
        ChuongTrinhKhuyenMai::create([
            'tenchuongtrinhkm' => 'Sale 50%',
            'mota' => 'Sale 50% nhân dịp lễ',
            'ngayapdung' => Carbon::createFromFormat('d/m/Y H:i', '23/03/2003 08:00'),
            'ngayketthuc' => Carbon::createFromFormat('d/m/Y H:i', '24/03/2003 23:59'),
            'manhanvien' => 2
        ]);
        ChuongTrinhKhuyenMai::create([
            'tenchuongtrinhkm' => 'Sale 50%',
            'mota' => 'Sale 50% nhân dịp lễ',
            'ngayapdung' => Carbon::createFromFormat('d/m/Y H:i', '23/03/2003 08:00'),
            'ngayketthuc' => Carbon::createFromFormat('d/m/Y H:i', '24/03/2003 23:59'),
            'manhanvien' => 2
        ]);
        ChuongTrinhKhuyenMai::create([
            'tenchuongtrinhkm' => 'Sale 50%',
            'mota' => 'Sale 50% nhân dịp lễ',
            'ngayapdung' => Carbon::createFromFormat('d/m/Y H:i', '23/03/2003 08:00'),
            'ngayketthuc' => Carbon::createFromFormat('d/m/Y H:i', '24/03/2003 23:59'),
            'manhanvien' => 2
        ]);
    }
}
