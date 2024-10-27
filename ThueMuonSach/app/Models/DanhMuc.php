<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;

    protected $table = 'danhmuc';
    protected $primaryKey = 'madanhmuc';
    public $timestamps = true;
    protected $fillable = ['tendanhmuc', 'mota'];
}
