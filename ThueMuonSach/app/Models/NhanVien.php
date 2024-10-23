<?php
// phát 21/10
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'phuCap'
    ];

    public function chamcong(): HasMany
    {
        return $this->hasMany(ChamCong::class);
    }
}
