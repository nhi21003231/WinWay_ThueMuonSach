<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonThue extends Model
{
    use HasFactory;

    protected $table = 'chitiethoadonthue';
    protected $primaryKey = 'macthoadon';
    public $timestamps = true;

    protected $fillable = [
        'soluongthue',
        'tiencoc',
        'tienthue',
        'maanpham',
        'mahoadon',
    ];

    // Định nghĩa quan hệ với bảng HoaDonThueAnPham
    public function hoaDonThue()
    {
        return $this->belongsTo(HoaDonThueAnPham::class, 'mahoadon', 'mahoadon');
    }

    // Định nghĩa quan hệ với bảng DsAnPham
    public function dsAnPham()
    {
        return $this->belongsTo(DsAnPham::class, 'maanpham', 'maanpham');
    }
}
