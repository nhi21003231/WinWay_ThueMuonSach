<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Illuminate\Http\Request;

class QuanLyNhanVienController extends Controller
{
    public function hienThiQuanLyNhanVien()
    {
        // 23/10 sửa lại taikhoan
        // $nhanVienList = NhanVien::with('taikhoan')->get();
        $nhanVienList = NhanVien::all();
        return view('CuaHang.pages.QuanLyCuaHang.QuanLyNhanVien.index', compact('nhanVienList'));
    }
}
