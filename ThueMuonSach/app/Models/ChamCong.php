<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChamCong extends Model
{
    use HasFactory;

    protected $table = 'chamcong';
    protected $primaryKey = 'machamcong';
    public $timestamps = true;

    protected $fillable = [
        'ghinhan',
        'thoigianvao',
        'thoigianra',
        'manhanvien',
    ];

    // Định nghĩa quan hệ với bảng NhanVien
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'manhanvien', 'manhanvien');
    }
}
