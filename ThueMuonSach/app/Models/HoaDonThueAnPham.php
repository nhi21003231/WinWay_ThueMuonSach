<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonThueAnPham extends Model
{
    use HasFactory;

    protected $table = 'hoadonthueanpham';
    protected $primaryKey = 'mahoadon';
    public $timestamps = true;

    protected $fillable = [
        'ngaythue',
        'ngaytra',
        'phitracham',
        'ngaythanhtoan',
        'phuongthucthanhtoan',
        'loaidon',
        'trangthai',
        'manhanvien',
    ];

    // Định nghĩa quan hệ với bảng NhanVien
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'manhanvien', 'manhanvien');
    }
}
