<?php
// phát 21/10
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NhanVien extends Model
{
    use HasFactory;
    protected $table = 'nhanvien';
    protected $primaryKey = 'maNhanVien'; // Đặt maNhanVien làm khóa chính
    public $timestamps = true; // Tắt tự động quản lý timestamp
    protected $fillable = [
        'maNhanVien',
        'hoTen',
        'soDienThoai',
        'email',
        'chucVu',
        'ngayBoNhiem',
        'phuCap',
        // 'maTaiKhoan'
    ];

    public function chamcong(): HasMany
    {
        return $this->hasMany(ChamCong::class);
    }

    // phat 23/10
    public function taikhoan(): HasOne
    {
        return $this->hasOne(TaiKhoan::class);
    }

    // Phát 23/10
    // public function taikhoan(): BelongsTo
    // {
    //     return $this->BelongsTo(taikhoan::class, 'id', 'id');
    // }
}
