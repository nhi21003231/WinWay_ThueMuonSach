<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    public function LienHe()
    {
        return view('KhachHang.pages.LienHe.index');
    }
}
