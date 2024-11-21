<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
class KhachHang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'khachhang';
    protected $primaryKey = 'makhachhang';
    public $timestamps = true;

    protected $fillable = [
        'makhachhang',
        'hoten',
        'email',
        'dienthoai',
        'diachi',
        'lathanhvien',
        'mataikhoan',
    ];

    // Định nghĩa quan hệ với bảng TaiKhoan
    public function taikhoan():HasOne
    {
        return $this->hasOne(TaiKhoan::class, 'mataikhoan', 'mataikhoan');
    }

    public function hoadons(): HasMany
    {

        return $this->hasMany(HoaDonThueAnPham::class);

    }
    //lộc
        // Định nghĩa quan hệ với bảng gioHang
    public function gioHang()
    {
        return $this->hasMany(GioHang::class, 'makhachhang');
    }
}
