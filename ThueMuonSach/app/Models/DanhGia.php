<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;

    protected $table = 'danhgia';
    protected $primaryKey = 'madanhgia';
    public $timestamps = true;

    protected $fillable = [
        'binhluan',
        'trangthai',
        'sosao',
        // bổ sung 30/10
        'ngaydanhgia',
        'maanpham',
        'makhachhang',
    ];

    // Định nghĩa quan hệ với bảng DS_AnPham
    public function dsAnPham()
    {
        return $this->belongsTo(DsAnPham::class, 'maanpham', 'maanpham');
    }

    // Định nghĩa quan hệ với bảng KhachHang
    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'makhachhang', 'makhachhang');
    }
}
