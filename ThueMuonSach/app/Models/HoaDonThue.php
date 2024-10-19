<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HoaDonThue extends Model
{
    use HasFactory;

    protected $table = 'hoadonthue';
    protected $fillable = [
        'NgayThue',
        'LoaiDon',
        'id_khachhang',
        'id_anpham'
    ];

    protected $hidden = [

    ];

    public function khachhang():BelongsTo
    {
        return $this->BelongsTo(KhachHang::class,'id_khachhang','id');
    }
    
    public function anpham():BelongsTo
    {
        return $this->belongsTo(AnPham::class,'id_anpham','id');
    }
}
