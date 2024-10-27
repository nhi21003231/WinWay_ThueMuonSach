<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuongTrinhKhuyenMai extends Model
{
    use HasFactory;

    protected $table = 'chuongtrinhkhuyenmai';
    protected $primaryKey = 'mactkm';
    public $timestamps = true;

    protected $fillable = [
        'tenchuongtrinhkm',
        'mota',
        'ngayapdung',
        'ngayketthuc',
        'manhanvien',
    ];

    // Định nghĩa quan hệ với bảng NhanVien
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'manhanvien', 'manhanvien');
    }
}
