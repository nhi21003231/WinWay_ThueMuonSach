<?php

// namespace App\Http\Controllers\KhachHang;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class ChiTietAnPhamController extends Controller
// {
//     public function hienThiChiTietAnPham()
//     {
//         return view('KhachHang.pages.ChiTietAnPham.index');
//     }
// }
//lộc
// namespace App\Http\Controllers\KhachHang;

// use App\Http\Controllers\Controller;
// use App\Models\ChiTietAnPham;
// use App\Models\DanhMuc;
// use App\Models\DsAnPham;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Str;

// class ChiTietAnPhamController extends Controller
// {
//     public function hienThiChiTietAnPham($maanpham)
//     {
//         // Lấy danh sách ấn phẩm cùng với thông tin chi tiết ấn phẩm và danh mục liên quan
//         $anPham = DsAnPham::with(['chiTietAnPham', 'chiTietAnPham.danhMuc'])
//         ->where('maanpham', $maanpham)
//         ->where('dathanhly', false)
//         ->first();
        
//          // Đếm số lượng ấn phẩm chưa thuê
//          $soLuongChuaThue = DsAnPham::where('dathanhly', false)
//          ->where('maanpham', $maanpham)
//         ->where('dathue', false)
//         ->count();

//         return view('KhachHang.pages.ChiTietAnPham.index',compact('anPham','soLuongChuaThue'));
//     }
    
// }

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use App\Models\ChiTietAnPham;
use App\Models\DanhGia;
use App\Models\DanhMuc;
use App\Models\DsAnPham;
use Illuminate\Http\Request;

class ChiTietAnPhamController extends Controller
{
    public function hienThiChiTietAnPham($mactanpham)
    {
        // Lấy danh sách ấn phẩm cùng với thông tin chi tiết ấn phẩm và danh mục liên quan
        $anPham = DsAnPham::with(['chiTietAnPham', 'chiTietAnPham.danhMuc'])
            ->where('mactanpham', $mactanpham)
            
            
            ->first();

            // ->firstOrFail();
        
        // Đếm số lượng ấn phẩm chưa thuê
        $soLuongChuaThue = DsAnPham::where('dathanhly', false)
            ->where('mactanpham', $mactanpham)
            ->where('dathue', false)
            ->whereIn('tinhtrang',['Mới','Cũ'])
            ->count();
        
        // Lấy danh sách đánh giá theo mactanpham
        $danhGias = DanhGia::whereHas('dsAnPham', function($query) use ($mactanpham) {
            $query->where('mactanpham', $mactanpham);
        })->with('khachHang')->get();

        // return view('KhachHang.pages.ChiTietAnPham.index', compact('anPham', 'soLuongChuaThue'));
        return view('KhachHang.pages.ChiTietAnPham.index', compact('anPham', 'soLuongChuaThue','mactanpham', 'danhGias'));
    }
    public function show($mactanpham)
    {
        $anPham = DsAnPham::with('danhGias.khachHang')->findOrFail($mactanpham);
        return view('KhachHang.pages.ChiTietAnPham.index', compact('anPham'));
    }

}