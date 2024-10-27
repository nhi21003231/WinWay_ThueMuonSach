<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietAnPham extends Model
{
    use HasFactory;

    protected $table = 'chitietanpham';
    protected $primaryKey = 'mactanpham';
    public $timestamps = true;

    protected $fillable = [
        'tenanpham', 
        'tacgia', 
        'namxuatban', 
        'hinhanh', 
        'madanhmuc'
    ];

    // Định nghĩa quan hệ với bảng DanhMuc
    public function danhmuc()
    {
        return $this->belongsTo(DanhMuc::class, 'madanhmuc', 'madanhmuc');
    }
}
