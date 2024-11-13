<?php

namespace App\Http\Controllers\KhachHang;
// use App\Models\DanhSachAnPham;
use App\Models\ChiTietAnPham;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DanhSachAnPhamController extends Controller
{
    public function hienThiDanhSachAnPham()
    {

            $chitietanpham = ChiTietAnPham::take(8)->get();

        return view('KhachHang.pages.DanhSachAnPham.index', compact('chitietanpham'));

    }
    
}
