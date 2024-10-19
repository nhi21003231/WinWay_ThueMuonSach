<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    use HasFactory;

    protected $table = 'tai_khoan'; // Liên kết tới bảng tai_khoan

    // Các trường có thể gán giá trị (mass assignable)
    protected $fillable = [
        'ten_tai_khoan',
        'mat_khau',
        'vai_tro',
    ];

    // Đảm bảo mật khẩu được mã hóa khi lưu vào cơ sở dữ liệu
    public function setPasswordAttribute($value)
    {
        $this->attributes['mat_khau'] = bcrypt($value);
    }

}
