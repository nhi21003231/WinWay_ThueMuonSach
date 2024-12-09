<?php

// namespace App\Http\Controllers\KhachHang;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class GioHangController extends Controller
// {
//     public function hienThiGioHang()
//     {
//         return view('KhachHang.pages.GioHang.index');
//     }
// }
// lộc

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

class GioHangController extends Controller
{
    // public function hienThiGioHang()
    // {
        
    //     return view('KhachHang.pages.GioHang.index');
    // }

    public function hienThiGioHang()
    {
        if (Auth::guard('web')->check()) {
            $user = Auth::user();
            $khachHang = $user->khachHang;

            if ($khachHang) {
                $cartItems = $khachHang->gioHang()->with('anpham', 'anpham.chitietanpham')
                ->get();
                $totalPrice = $cartItems->sum(function ($item) {
                    return $item->anPham->chiTietAnPham->giacoc;
                });

                return view('KhachHang.pages.GioHang.index', [
                    'cartItems' => $cartItems,
                    'totalPrice' => $totalPrice
                ]);
            } else {
                return redirect()->back()->with('error', 'Không tìm thấy thông tin giỏ hàng.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng của bạn.');
        }
    }

    public function themVaoGioHang(Request $request, $mactanpham)
    {
        if (Auth::guard('web')->check()) {
            $user = Auth::user();
            
            // Lấy thông tin khách hàng dựa trên tài khoản hiện tại
            $khachHang = $user->khachHang; // Dựa trên mối quan hệ 'belongsTo' trong model TaiKhoan
            
            if (!$khachHang) {
                return redirect()->back()->with('error', 'Không tìm thấy thông tin khách hàng.');
            }
            // dd($mactanpham);
            $anPham = DsAnPham::with(['chiTietAnPham', 'chiTietAnPham.danhMuc'])
            ->where('mactanpham', $mactanpham)
            ->where('dathue',false)
            ->where('dathanhly',false)
            ->where('tinhtrang',['Mới','Cũ'])
            ->first();

            // Lấy maanpham của ấn phẩm vừa tìm thấy
            $maanpham = $anPham->maanpham;

            
            // Kiểm tra nếu ấn phẩm đã có trong giỏ hàng của người dùng
            $existsInCart = GioHang::where('makhachhang', $khachHang->makhachhang)
                                ->where('maanpham', $maanpham)
                                ->exists();

            if ($existsInCart) {
                return redirect()->back()->with('error', 'Ấn phẩm đã có trong giỏ hàng của bạn.');
            }
           
            // Thêm ấn phẩm vào giỏ hàng
            GioHang::create([
                'makhachhang' => $khachHang->makhachhang,
                'maanpham' => $maanpham,
                'soluong' => 1 // Mặc định số lượng là 1
            ]);

            return redirect()->back()->with('success', 'Đã thêm ấn phẩm vào giỏ hàng thành công.');
        } else {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thêm ấn phẩm vào giỏ hàng.');
        }
    }
//     public function xoaKhoiGioHang(Request $request, $maanpham)
// {
//     if (Auth::guard('web')->check()) {
//         $user = Auth::user();

//         // Lấy thông tin khách hàng dựa trên tài khoản hiện tại
//         $khachHang = $user->khachHang; // Dựa trên mối quan hệ 'belongsTo' trong model TaiKhoan

//         if (!$khachHang) {
//             return redirect()->back()->with('error', 'Không tìm thấy thông tin khách hàng.');
//         }

//         // Tìm ấn phẩm trong giỏ hàng
//         $gioHangItem = GioHang::where('makhachhang', $khachHang->makhachhang)
//                                 ->where('maanpham', $maanpham)
//                                 ->first();

//         if (!$gioHangItem) {
//             return redirect()->back()->with('error', 'Ấn phẩm không tồn tại trong giỏ hàng.');
//         }

//         // Xóa ấn phẩm khỏi giỏ hàng
//         $gioHangItem->delete();

//         return redirect()->back()->with('success', 'Đã xóa ấn phẩm khỏi giỏ hàng thành công.');
//     } else {
//         return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xóa ấn phẩm khỏi giỏ hàng.');
//     }
// }

   
    
    public function xoaKhoiGioHang(Request $request, $maanpham)
{
    if (Auth::guard('web')->check()) {
        $user = Auth::user();

        // Lấy thông tin khách hàng dựa trên tài khoản hiện tại
        $khachHang = $user->khachHang;

        if (!$khachHang) {
            return redirect()->back()->with('error', 'Không tìm thấy thông tin khách hàng.');
        }

        // Tìm và xóa ấn phẩm khỏi giỏ hàng
        $deleted = GioHang::where('makhachhang', $khachHang->makhachhang)
            ->where('maanpham', $maanpham)
            ->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Đã xóa ấn phẩm khỏi giỏ hàng thành công.');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy ấn phẩm trong giỏ hàng.');
        }
    } else {
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thao tác.');
    }
}

}
