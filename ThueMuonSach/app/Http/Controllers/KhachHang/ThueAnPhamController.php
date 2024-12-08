<?php

// namespace App\Http\Controllers\KhachHang;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class ThueAnPhamController extends Controller
// {
//     public function hienThiThueAnPham()
//     {
//         return view('KhachHang.pages.ThueAnPham.index');
//     }
// }

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ChiTietAnPham;
use App\Models\DanhMuc;
use App\Models\DsAnPham;
use App\Models\GioHang;
use App\Models\KhachHang;
use App\Models\ChiTietHoaDonThue;
use App\Models\HoaDonThueAnPham;

class ThueAnPhamController extends Controller
{
    public function hienThiThueAnPham()
    {
        if (Auth::guard('web')->check()) {
            $user = Auth::user();
            $khachHang = $user->khachHang; // Lấy thông tin khách hàng từ tài khoản

            if (!$khachHang) {
                return redirect()->back()->with('error', 'Không tìm thấy thông tin khách hàng.');
            }

            return view('KhachHang.pages.ThueAnPham.index', ['khachHang' => $khachHang]);
        } else {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiến hành thanh toán.');
        }
        
    }
   

    public function suaThongTinThue(Request $request)
    {
        $request->validate([
            'diachi' => 'required|string|max:255',
            'dienthoai' => 'required|regex:/^0[3,7,8,9][0-9]{8}$/',
        ], [
            'diachi.required' => 'Vui lòng nhập địa chỉ.',
            'dienthoai.required' => 'Vui lòng nhập số điện thoại.',
            'dienthoai.regex' => 'Số điện thoại không hợp lệ.',
        ]);

        $user = Auth::user();
        $khachHang = $user->khachHang;

        if ($khachHang) {
            $khachHang->update([
                'hoten' => $request->hoten,
                'diachi' => $request->diachi,
                'dienthoai' => $request->dienthoai,
            ]);
        }

        return redirect()->route('route-khachhang-thueanpham-hoadon')->with('success', 'Thông tin đã được cập nhật. Tiến hành thanh toán.');
    }
}


