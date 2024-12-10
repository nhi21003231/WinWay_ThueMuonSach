<?php
namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DsAnPham;
use App\Models\DanhGia;

class DanhGiaController extends Controller
{
    public function create($mactanpham)
    {
        $anpham = DsAnPham::where('mactanpham', $mactanpham)->firstOrFail();
        return view('KhachHang.pages.DanhGia.index', compact('anpham'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'maanpham' => 'required|exists:ds_anpham,maanpham',
            'danhgia' => 'required|string|max:255',
            'sosao' => 'required|integer|min:1|max:5',
        ]);

        $danhgia = new DanhGia();
        $danhgia->maanpham = $request->maanpham;
        $danhgia->binhluan = $request->danhgia;
        $danhgia->sosao = $request->sosao;
        $danhgia->ngaydanhgia = now();
        $danhgia->makhachhang = auth()->user()->khachhang->makhachhang; // id tai khoan hien tai
        $danhgia->save();

        return redirect()->route('route-khachhang-lichsuthue')->with('success', 'Đánh giá của bạn đã được lưu.');
    }
}