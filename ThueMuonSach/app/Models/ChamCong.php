<?php
// phát 21/10
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChamCong extends Model
{
    use HasFactory;
    protected $table = 'chamcong';
    protected $primaryKey = 'maChamCong'; // Đặt maChamCong làm khóa chính
    public $timestamps = true; // Tắt tự động quản lý timestamp
    protected $fillable = [
        'maChamCong',
        'thoiGianVao',
        'thoiGianRa',
        // Có mặt, Vắng mặt
        'ghiNhan',
        'maNhanVien'
    ];

    public function nhanvien(): BelongsTo
    {
        return $this->BelongsTo(nhanvien::class, 'maNhanVien', 'maNhanVien');
    }
}
