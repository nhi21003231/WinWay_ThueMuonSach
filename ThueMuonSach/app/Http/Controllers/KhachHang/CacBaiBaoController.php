<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BaiBao;


class CacBaiBaoController extends Controller
{
    public function hienThiCacBaiBao()
    {
        // Lấy danh sách các bài báo từ database
        // $cacbaibao = baibao::all();
        // lấy 8 bài báo mới nhất
        $cacbaibao = BaiBao::orderBy('mabaibao', 'desc')->take(6)->get();

        // Truyền dữ liệu đến view
        return view('KhachHang.pages.CacBaiBao.index', compact('cacbaibao'));
    }
    public function hienThiChiTietBaiBao($id)
{
    $baiBao = BaiBao::findOrFail($id);
    return view('KhachHang.pages.CacBaiBao.chitiet', compact('baiBao'));
}
}
