<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;

    protected $table = 'giohang';
    protected $primaryKey = null; // Không có khóa chính trong bảng này
    public $incrementing = false; // Không tự động tăng
    public $timestamps = true;

    protected $fillable = [
        'maanpham',
        'makhachhang',
        'soluong',
    ];

    // Định nghĩa quan hệ với bảng DS_AnPham
    public function anPham()
    {
        return $this->belongsTo(DsAnPham::class, 'maanpham', 'maanpham');
    }

    // Định nghĩa quan hệ với bảng KhachHang
    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'makhachhang', 'makhachhang');
    }
}
