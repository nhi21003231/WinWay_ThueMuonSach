<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChiTietAnPham extends Model
{
    use HasFactory;

    protected $table = 'chitietanpham';
    protected $primaryKey = 'mactanpham';
    public $timestamps = true;

    protected $fillable = [
        // 'mactanpham',
        'tenanpham', 
        'tacgia', 
        'namxuatban', 
        'hinhanh', 
        'madanhmuc'
    ];

    // Định nghĩa quan hệ với bảng DanhMuc
    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'madanhmuc', 'madanhmuc');
    }

    public function anPham()
    {

        return $this->hasMany(DsAnPham::class,'mactanpham','mactanpham');
        
        
    }
    public function chiTietAnPham()
    {
        return $this->belongsTo(ChiTietAnPham::class, 'mactanpham', 'mactanpham');
    }

    public function hoadonthue():HasMany
    {
        return $this->hasMany(HoaDonThueAnPham::class, 'mactanpham', 'mactanpham');
    }
}
