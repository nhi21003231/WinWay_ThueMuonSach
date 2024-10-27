<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhanvien';
    protected $primaryKey = 'manhanvien';
    public $timestamps = true;

    protected $fillable = [
        'hoten',
        'sodienthoai',
        'email',
        'mataikhoan',
    ];

    // Định nghĩa quan hệ với bảng TaiKhoan
    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'mataikhoan', 'mataikhoan');
    }
}
