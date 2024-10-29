<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KhachHang extends Model
{
    use HasFactory;

    protected $table = 'khachhang';
    protected $primaryKey = 'makhachhang';
    public $timestamps = true;

    protected $fillable = [
        'hoten',
        'email',
        'dienthoai',
        'diachi',
        'lathanhvien',
        'mataikhoan',
    ];

    // Định nghĩa quan hệ với bảng TaiKhoan
    public function taikhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'mataikhoan', 'mataikhoan');
    }

    public function hoadons(): HasMany
    {

        return $this->hasMany(HoaDonThueAnPham::class);

    }
}
