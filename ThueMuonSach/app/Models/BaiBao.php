<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class BaiBao extends Model
// {
//     use HasFactory;

//     protected $table = 'baibao';
//     protected $primaryKey = 'mabaibao';
//     public $timestamps = true;

//     protected $fillable = [
//         'tieude',
//         'noidung',
//         'ngaydang',
//         'manhanvien',
//     ];

//     // Định nghĩa quan hệ với bảng NhanVien
//     public function nhanVien()
//     {
//         return $this->belongsTo(NhanVien::class, 'manhanvien', 'manhanvien');
//     }
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiBao extends Model
{
    use HasFactory;

    protected $table = 'baibao';
    protected $primaryKey = 'mabaibao';
    public $timestamps = true;

    protected $fillable = [
        'tieude',
        'noidung',
        'hinhanh',
        'ngaydang',
        'manhanvien',
    ];

    // Định nghĩa quan hệ với bảng NhanVien
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'manhanvien', 'manhanvien');
    }
}
