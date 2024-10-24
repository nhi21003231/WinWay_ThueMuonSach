<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChinhSachController extends Controller
{
    public function hienThiChinhSach()
    {
        return view('KhachHang.pages.ChinhSach.index');
    }
}
