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

    protected $primaryKey = 'mataikhoan';

    // Các trường có thể gán giá trị (mass assignable)
    protected $fillable = [
        'tentaikhoan',
        'matkhau',
        'vaitro',
    ];

    protected $hidden = [
        'matkhau',
    ];

    // Đảm bảo mật khẩu được mã hóa khi lưu vào cơ sở dữ liệu
    public function setMatKhauAttribute($value)
    {
        $this->attributes['matkhau'] = Hash::make($value);
    }

    // Sử dụng trường 'matkhau' làm mật khẩu
    public function getAuthPassword()
    {
        return $this->matkhau;
    }
}
