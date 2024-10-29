<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    // Định nghĩa quan hệ với bảng ChiTietAnPham
    public function chiTietAnPham()
    {
        return $this->belongsTo(ChiTietAnPham::class, 'mactanpham', 'mactanpham');
    }
}
