<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function hoaDonThue(): BelongsTo
    {
        return $this->belongsTo(HoaDonThueAnPham::class, 'mahoadon', 'mahoadon');
    }

    // Định nghĩa quan hệ với bảng DsAnPham
    public function dsAnPham()
    {
        return $this->belongsTo(DsAnPham::class, 'maanpham', 'maanpham');
    }
    
}
