<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use App\Models\ChiTietAnPham;
use Illuminate\Http\Request;

class DatTruocController extends Controller
{
    //
    public function hienThiThanhToanDT(Request $request)
    {
        // dd($request->all());
        $anpham = ChiTietAnPham::find($request->id_ctanpham);

        dd($anpham);
        return view('KhachHang.pages.ThueAnPham.momo');
    }
}
