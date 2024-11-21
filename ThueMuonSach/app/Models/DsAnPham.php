<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DsAnPham extends Model
{
    use HasFactory;

    protected $table = 'ds_anpham';
    protected $primaryKey = 'maanpham';
    public $timestamps = true;

    protected $fillable = [
        'tinhtrang',
        'giathue',
        'giacoc',
        'vitri',
        'dathue',
        'dathanhly',
        'mactanpham',
        // 'dattruoc',// Thêm cột đặt trước
    ];

    // Định nghĩa quan hệ với bảng ChiTietAnPham
    public function chiTietAnPham()
    {
        return $this->belongsTo(ChiTietAnPham::class, 'mactanpham', 'mactanpham');
    }

    public function danhGia()
    {

        return $this->hasMany(DanhGia::class, 'maanpham', 'maanpham');
    }

    public function chitiethoadonthue():HasMany
    {

        return $this->hasMany(ChiTietHoaDonThue::class,'maanpham','maanpham');

    }
    //lộc
    public function gioHang()
    {
        return $this->hasMany(GioHang::class, 'maanpham');
    }
    
    public function anPham()
    {

        return $this->hasMany(DsAnPham::class,'mactanpham','mactanpham');
        
        
    }
}

