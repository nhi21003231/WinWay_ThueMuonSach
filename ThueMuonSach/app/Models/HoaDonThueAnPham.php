<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HoaDonThueAnPham extends Model
{
    use HasFactory;

    protected $table = 'hoadonthueanpham';
    protected $primaryKey = 'mahoadon';
    public $timestamps = true;

    protected $fillable = [
        'ngaythue',
        'ngaytra',
        'phitracham',
        'thanhtien',
        'ngaythanhtoan',
        'phuongthucthanhtoan',
        'mathamchieu',
        'loaidon',
        'trangthai',
        'soluongthue',
        'manhanvien',
        'makhachhang',
        'mactanpham',
    ];
    protected $dates = [
        'ngaythue',
        'ngaytra',
        'ngaythanhtoan',
    ];

    // Định nghĩa quan hệ với bảng NhanVien
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'manhanvien', 'manhanvien');
    }

    public function khachHang(): BelongsTo
    {

        return $this->belongsTo(KhachHang::class,'makhachhang','makhachhang');
        
    }

    public function chiTietHoaDons(): HasMany
    {

        return $this->hasMany(ChiTietHoaDonThue::class,'mahoadon','mahoadon');

    }

    public function chitietanpham(): BelongsTo
    {

        return $this->belongsTo(ChiTietAnPham::class,'mactanpham','mactanpham');

    }
        // // Phương thức kiểm tra trạng thái
        // public function isHetHang()
        // {
        //     return $this->trangthai === 'đã thuê';
        // }

        
}
