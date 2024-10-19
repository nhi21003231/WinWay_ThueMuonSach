<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KhachHang extends Model
{
    use HasFactory;

    protected $table = 'khachhang';
    protected $fillable = [
        'ten'
    ];

    public function hoadonthuemuon():HasMany
    {
        return $this->hasMany(HoaDonThue::class);
    }
}
