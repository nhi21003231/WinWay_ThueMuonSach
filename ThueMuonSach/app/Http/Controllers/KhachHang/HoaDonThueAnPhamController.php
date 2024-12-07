<?php

// namespace App\Http\Controllers\KhachHang;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\File;
// use Carbon\Carbon;
// use Illuminate\Support\Facades\DB;
// use App\Models\HoaDonThueAnPham;
// use App\Models\ChiTietHoaDonThue;



// class HoaDonThueAnPhamController extends Controller
// {
//     public function hienThiHoaDon(){
//        if (Auth::check()) {
//         $user = Auth::user();
//         $khachHang = $user->khachHang;
//         $cartItems = $khachHang->gioHang()->with('anpham', 'anpham.chitietanpham')->get();

//         if ($cartItems->isEmpty()) {
//             return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
//         }

//         // Tính tổng tiền giỏ hàng
//         $totalPrice = $cartItems->sum(function ($item) {
//             return $item->anPham->giacoc;
//         });

//         // Thêm phí ship (giả định là 50,000 VND)
//         // $shippingFee = 50000;
//          $grandTotal = $totalPrice; //+ $shippingFee;

//         return view('KhachHang.pages.ThueAnPham.hoadon', [
//             'khachHang' => $khachHang,
//             'cartItems' => $cartItems,
//             'totalPrice' => $totalPrice,
//             // 'shippingFee' => $shippingFee,
//             'grandTotal' => $grandTotal,
//         ]);
//     } else {
//         return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
//     }
//     }
    
//     public function xuLyThanhToan(Request $request)
//     {
//         $request->validate([
//             'payment_method' => 'required|in:momo,bank',
//         ]);

//         $paymentMethod = $request->payment_method;

//         if ($paymentMethod === 'momo') {
//             return redirect()->route('momo.payment'); // Route để xử lý thanh toán qua MoMo
//         } elseif ($paymentMethod === 'bank') {
//             return redirect()->route('route-khachhang-thueanpham-nganhang'); // Route để xử lý thanh toán qua Ngân hàng
//         }

//         return redirect()->back()->with('error', 'Phương thức thanh toán không hợp lệ.');
//     }
//     public function chuyenKhoan()
//     {
//         if (Auth::guard('web')->check()) {
//             $user = Auth::user();
//             $khachHang = $user->khachHang;
//             $cartItems = $khachHang->gioHang()->with('anpham', 'anpham.chitietanpham')->get();

//             if ($cartItems->isEmpty()) {
//                 return redirect()->route('route-khachhang-giohang')->with('error', 'Giỏ hàng của bạn đang trống.');
//             }

//             // Tính tổng tiền giỏ hàng
//             $totalPrice = $cartItems->sum(function ($item) {
//                 return $item->anPham->giacoc;
//             });

//             // Thêm phí ship (giả định là 50,000 VND)
//             // $shippingFee = 50000;
//             $grandTotal = $totalPrice;//+ $shippingFee;

//             // Tạo mã tham chiếu thanh toán duy nhất
//             $paymentReference = 'BANK' . now()->timestamp . '-' . $khachHang->makhachhang;

//             // Truyền dữ liệu vào view
//             return view('KhachHang.pages.ThueAnPham.nganhang', [
//                 'khachHang' => $khachHang,
//                 'cartItems' => $cartItems,
//                 'totalPrice' => $totalPrice,
//                 // 'shippingFee' => $shippingFee,
//                 'grandTotal' => $grandTotal,
//                 'paymentReference' => $paymentReference,
//             ]);
//         } else {
//             return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
//         }
//     }

//     public function xuLyChuyenKhoan(Request $request)
//     {
//         $user = Auth::user();
//         $khachHang = $user->khachHang;
    
//         if ($khachHang) {
//             $ngayThue = now();
//             $ngayTra = $ngayThue->copy()->addDays(15);
//             $tienCocTong = 0; // Tổng tiền cọc
//             $tienThueTong = $request->input('grandTotal'); // Tổng tiền thuê
    
//             // Tạo hoá đơn thuê ấn phẩm
//             $hoaDon = DB::table('hoadonthueanpham')->insertGetId([
//                 'ngaythue' => $ngayThue,
//                 'ngaytra' => $ngayTra,
//                 'phitracham' => 0, // Có thể điều chỉnh phí trả chậm nếu cần
//                 'ngaythanhtoan' => now(), // Chưa thanh toán
//                 'phuongthucthanhtoan' => 'Chuyển khoản',
//                 'loaidon' => 'Đơn thuê',
//                 'trangthai' => 'Đang thuê',
//                 'manhanvien' => 1, // Có thể gán nhân viên nếu cần
//                 'makhachhang' => $khachHang->makhachhang,
//             ]);
    
//             // Lấy các mục giỏ hàng
//             $cartItems = $khachHang->gioHang()->with('anpham', 'anpham.chitietanpham')->get();
    
//             foreach ($cartItems as $item) {
//                 $tienCoc = $item->anPham->giacoc; // Lấy tiền cọc của từng ấn phẩm
//                 $tienCocTong += $tienCoc;
    
//                 // Lưu chi tiết thuê ấn phẩm
//                 DB::table('chitiethoadonthue')->insert([
//                     'mahoadon' => $hoaDon, // Mã hoá đơn vừa tạo
//                     'maanpham' => $item->maanpham, // Mã ấn phẩm
//                     'soluongthue' => 1, // Giả định mỗi sản phẩm có số lượng là 1
//                     'tiencoc' => $tienCoc,
//                     'tienthue' => $item->anPham->giathue, // Tiền thuê (có thể điều chỉnh)
//                 ]);
//             }
    
//             // Xoá giỏ hàng sau khi tạo hoá đơn
//             $khachHang->gioHang()->delete();
    
//             return redirect()->route('route-khachhang-trangchu')->with('success', 'Hoá đơn đã được tạo thành công. Đang chờ xử lý.');
//         }
    
//         return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
//     }
    

// }




namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\HoaDonThueAnPham;
use App\Models\ChiTietHoaDonThue;

class HoaDonThueAnPhamController extends Controller
{
    public function hienThiHoaDon()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $khachHang = $user->khachHang;
            $cartItems = $khachHang->gioHang()->with('anpham', 'anpham.chitietanpham')->get();

            if ($cartItems->isEmpty()) {
                return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
            }

            // Tính tổng tiền giỏ hàng
            $totalPrice = $cartItems->sum(function ($item) {
                return $item->anPham->giacoc;
            });

            // Thêm phí ship (giả định là 50,000 VND)
            // $shippingFee = 50000;
            $grandTotal = $totalPrice; //+ $shippingFee;

            return view('KhachHang.pages.ThueAnPham.hoadon', [
                'khachHang' => $khachHang,
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
                // 'shippingFee' => $shippingFee,
                'grandTotal' => $grandTotal,
            ]);
        } else {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }
    }

    public function xuLyThanhToan(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:momo,bank',
        ]);

        $paymentMethod = $request->payment_method;

        if ($paymentMethod === 'momo') {
            return redirect()->route('momo.payment'); // Route để xử lý thanh toán qua MoMo
        } elseif ($paymentMethod === 'bank') {
            return redirect()->route('route-khachhang-thueanpham-nganhang-get'); // Route để xử lý thanh toán qua Ngân hàng
        }

        return redirect()->back()->with('error', 'Phương thức thanh toán không hợp lệ.');
    }

    public function hienThiChuyenKhoan(Request $request)
    {
        if (Auth::guard('web')->check()) {
            $user = Auth::user();
            $khachHang = $user->khachHang;
            $cartItems = $khachHang->gioHang()->with('anpham', 'anpham.chitietanpham')->get();

            if ($cartItems->isEmpty()) {
                return redirect()->route('route-khachhang-giohang')->with('error', 'Giỏ hàng của bạn đang trống.');
            }

            // Tính tổng tiền giỏ hàng
            $totalPrice = $cartItems->sum(function ($item) {
                return $item->anPham->giacoc;
            });

            // Thêm phí ship (giả định là 50,000 VND)
            // $shippingFee = 50000;
            $grandTotal = $totalPrice; //+ $shippingFee;

            // Tạo mã tham chiếu thanh toán duy nhất
            $paymentReference = 'BANK' . now()->timestamp . '-' . $khachHang->makhachhang;

            // Truyền dữ liệu vào view
            return view('KhachHang.pages.ThueAnPham.nganhang', [
                'khachHang' => $khachHang,
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
                // 'shippingFee' => $shippingFee,
                'grandTotal' => $grandTotal,
                'paymentReference' => $paymentReference,
            ]);
        } else {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }
    }

    public function chuyenKhoan(Request $request)
    {
        if (Auth::guard('web')->check()) {
            $user = Auth::user();
            $khachHang = $user->khachHang;
            $cartItems = $khachHang->gioHang()->with('anpham', 'anpham.chitietanpham')->get();

            if ($cartItems->isEmpty()) {
                return redirect()->route('route-khachhang-giohang')->with('error', 'Giỏ hàng của bạn đang trống.');
            }

            // Tính tổng tiền giỏ hàng
            $totalPrice = $cartItems->sum(function ($item) {
                return $item->anPham->giacoc;
            });

            // Thêm phí ship (giả định là 50,000 VND)
            // $shippingFee = 50000;
            $grandTotal = $totalPrice; //+ $shippingFee;

            // Tạo mã tham chiếu thanh toán duy nhất
            $paymentReference = 'BANK' . now()->timestamp . '-' . $khachHang->makhachhang;

            // Truyền dữ liệu vào view
            return view('KhachHang.pages.ThueAnPham.nganhang', [
                'khachHang' => $khachHang,
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
                // 'shippingFee' => $shippingFee,
                'grandTotal' => $grandTotal,
                'paymentReference' => $paymentReference,
            ]);
        } else {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }
    }

    public function xuLyChuyenKhoan(Request $request)
    {
        $user = Auth::user();
        $khachHang = $user->khachHang;

        if ($khachHang) {
            $ngayThue = now();
            $ngayTra = $ngayThue->copy()->addDays(15);
            $tienCocTong = 0; // Tổng tiền cọc
            $tienThueTong = $request->input('grandTotal'); // Tổng tiền thuê

            // Tạo hoá đơn thuê ấn phẩm
            $hoaDon = DB::table('hoadonthueanpham')->insertGetId([
                'ngaythue' => $ngayThue,
                'ngaytra' => $ngayTra,
                'phitracham' => 0, // Có thể điều chỉnh phí trả chậm nếu cần
                'ngaythanhtoan' => now(), // Chưa thanh toán
                'phuongthucthanhtoan' => 'Chuyển khoản',
                'loaidon' => 'Đơn thuê',
                'trangthai' => 'Đang thuê',
                'manhanvien' => 1, // Có thể gán nhân viên nếu cần
                'makhachhang' => $khachHang->makhachhang,
            ]);

            // Lấy các mục giỏ hàng
            $cartItems = $khachHang->gioHang()->with('anpham', 'anpham.chitietanpham')->get();

            foreach ($cartItems as $item) {
                $tienCoc = $item->anPham->giacoc; // Lấy tiền cọc của từng ấn phẩm
                $tienCocTong += $tienCoc;

                // Lưu chi tiết thuê ấn phẩm
                DB::table('chitiethoadonthue')->insert([
                    'mahoadon' => $hoaDon, // Mã hoá đơn vừa tạo
                    'maanpham' => $item->maanpham, // Mã ấn phẩm
                    'soluongthue' => 1, // Giả định mỗi sản phẩm có số lượng là 1
                    'tiencoc' => $tienCoc,
                    'tienthue' => $item->anPham->giathue, // Tiền thuê (có thể điều chỉnh)
                ]);
            }

            // Xoá giỏ hàng sau khi tạo hoá đơn
            $khachHang->gioHang()->delete();

            return redirect()->route('route-khachhang-trangchu')->with('success', 'Hoá đơn đã được tạo thành công. Đang chờ xử lý.');
        }

        return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
    }
    public function xuLyChuyenKhoan_DatTruoc(Request $request)
    {

        dd($request->all());
        $user = Auth::user();
        $khachHang = $user->khachHang;

        if ($khachHang) {
            $ngayThue = now();
            $ngayTra = $ngayThue->copy()->addDays(15);
            $tienCocTong = 0; // Tổng tiền cọc


            // Tạo hoá đơn đặt trước ấn phẩm
            $hoaDon = DB::table('hoadonthueanpham')->insertGetId([
                'ngaythue' => $ngayThue,
                'ngaytra' => $ngayTra,
                'phitracham' => 0, // Có thể điều chỉnh phí trả chậm nếu cần
                'ngaythanhtoan' => now(), // Chưa thanh toán
                'phuongthucthanhtoan' => 'Chuyển khoản',
                'loaidon' => 'Đặt trước',
                'trangthai' => 'Đang thuê',
                'manhanvien' => 1, // Có thể gán nhân viên nếu cần
                'makhachhang' => $khachHang->makhachhang,
            ]);

            // Lấy các mục giỏ hàng
            $cartItems = $khachHang->gioHang()->with('anpham', 'anpham.chitietanpham')->get();

            foreach ($cartItems as $item) {
                $tienCoc = $item->anPham->giacoc; // Lấy tiền cọc của từng ấn phẩm
                $tienCocTong += $tienCoc;

                // Lưu chi tiết thuê ấn phẩm
                DB::table('chitiethoadonthue')->insert([
                    'mahoadon' => $hoaDon, // Mã hoá đơn vừa tạo
                    'maanpham' => $item->maanpham, // Mã ấn phẩm
                    'soluongthue' => 1, // Giả định mỗi sản phẩm có số lượng là 1
                    'tiencoc' => $tienCoc,
                    'tienthue' => $item->anPham->giathue, // Tiền thuê (có thể điều chỉnh)
                ]);
            }

            // Xoá giỏ hàng sau khi tạo hoá đơn
            // $khachHang->gioHang()->delete();

            return redirect()->route('route-khachhang-trangchu')->with('success', 'Hoá đơn đặt trước đã được tạo thành công. Đang chờ xử lý.');
        }

        return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
    }
}