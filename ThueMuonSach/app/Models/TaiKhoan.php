<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TaiKhoan extends Authenticatable
{
    use HasFactory;

    protected $table = 'taikhoan'; // Liên kết tới bảng tai_khoan

    // Các trường có thể gán giá trị (mass assignable)
    protected $fillable = [
        'taikhoan',
        'matkhau',
        'vaitro',
    ];

    protected $hidden = [
        'matKhau',
    ];

    // Đảm bảo mật khẩu được mã hóa khi lưu vào cơ sở dữ liệu
    public function setMatKhauAttribute($value)
    {
        $this->attributes['matkhau'] = Hash::make($value);
    }

    // Sử dụng trường 'matKhau' làm mật khẩu
    public function getAuthPassword()
    {
        return $this->matKhau;
    }
}
