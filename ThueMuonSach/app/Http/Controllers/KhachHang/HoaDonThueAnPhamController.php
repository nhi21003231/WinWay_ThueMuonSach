<?php

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
    public function hienThiHoaDon(){
       if (Auth::check()) {
        $user = Auth::user();
        $khachHang = $user->khachHang;
        $cartItems = $khachHang->gioHang()->with('anpham', 'anpham.chitietanpham')->get();
        $ngayThue = now();
        $ngayTra = $ngayThue->copy()->addDays(15);

        if ($cartItems->isEmpty()) {
            return redirect()->route('route-khachhang-giohang')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Tính tổng tiền giỏ hàng
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->anPham->chitietanpham->giacoc;
        });
        //Tính tổng số lượng
        $totalQuantity = $cartItems->sum(function ($item) {
            return $item->soluong;
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
            'totalQuantity' => $totalQuantity,
            'ngayThue' => $ngayThue,
            'ngayTra' => $ngayTra
        ]);
    } else {
        return redirect()->route('route-dangnhap')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
    }
    }
    
    public function xuLyThanhToan(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:momo,bank',
        ]);

        $paymentMethod = $request->payment_method;

        if ($paymentMethod === 'momo') {
            return redirect()->route('route-khachhang-thueanpham-momo'); // Route để xử lý thanh toán qua MoMo
        } elseif ($paymentMethod === 'bank') {
            return redirect()->route('route-khachhang-thueanpham-nganhang'); // Route để xử lý thanh toán qua Ngân hàng
        }

        return redirect()->back()->with('error', 'Phương thức thanh toán không hợp lệ.');
    }
    //bank
    public function chuyenKhoan()
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
                return $item->anPham->chitietanpham->giacoc;
            });
            
            $grandTotal = $totalPrice;

            //Tính tổng số lượng
            $totalQuantity = $cartItems->sum(function ($item) {
                return $item->soluong;
            });
            
            // Tạo mã tham chiếu thanh toán duy nhất
            $paymentReference = 'BANK' . now()->timestamp . '-' . $khachHang->makhachhang;

            // Truyền dữ liệu vào view
            return view('KhachHang.pages.ThueAnPham.nganhang', [
                'khachHang' => $khachHang,
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
                'totalQuantity' => $totalQuantity,
                'grandTotal' => $grandTotal,
                'paymentReference' => $paymentReference,
            ]);
        } else {
            return redirect()->route('route-dangnhap')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }
    }

    public function xuLyNganHang(Request $request)
    {
        $user = Auth::user();
        $khachHang = $user->khachHang;
    
        if ($khachHang) {
            $ngayThue = now();
            $ngayTra = $ngayThue->copy()->addDays(15);
            $soluong = $request->input('totalQuantity');
            $thanhtien = $request->input('grandTotal'); // Tổng tiền cọc
            // $tienThueTong = $request->input('grandTotal'); // Tổng tiền thuê
            
            // Tạo hoá đơn thuê ấn phẩm
            $hoaDon = DB::table('hoadonthueanpham')->insertGetId([
                'ngaythue' => $ngayThue,
                'ngaytra' => $ngayTra,
                'phitracham' => 0, // Có thể điều chỉnh phí trả chậm nếu cần
                'ngaythanhtoan' => now(), // Chưa thanh toán
                'phuongthucthanhtoan' => 'Chuyển khoản',
                'loaidon' => 'Đơn thuê',
                'trangthai' => 'Đang xử lý',
                'thanhtien' => $thanhtien,
                'soluongthue' => $soluong,
                'mathamchieu' => $request->input('paymentReference'),
                'manhanvien' => 1, // Có thể gán nhân viên nếu cần
                'makhachhang' => $khachHang->makhachhang,
                'created_at' => now(), // Thêm giá trị
                'updated_at' => now(), // Thêm giá trị
            ]);
            
            // Lấy các mục giỏ hàng
            $cartItems = $khachHang->gioHang()->with('anpham', 'anpham.chitietanpham')->get();
    
            foreach ($cartItems as $item) {
                $tienCoc = $item->anPham->chitietanpham->giacoc; // Lấy tiền cọc của từng ấn phẩm
                $tienThue = $item->anPham->chitietanpham->giathue;
    
                // Lưu chi tiết thuê ấn phẩm
                DB::table('chitiethoadonthue')->insert([
                    'maanpham' => $item->maanpham, // Mã ấn phẩm
                    'mahoadon' => $hoaDon, // Mã hoá đơn vừa tạo
                    'created_at' => now(), // Thêm giá trị
                    'updated_at' => now(), // Thêm giá trị
                ]);

                // Cập nhật cột dathue của bảng ds_anpham
                DB::table('ds_anpham')->where('maanpham', $item->maanpham)->update([
                    'dathue' => 1,
                ]);
            }
    
            // Xoá giỏ hàng sau khi tạo hoá đơn
            $khachHang->gioHang()->delete();
    
            return redirect()->route('route-khachhang-trangchu')->with('success', 'Hoá đơn đã được tạo thành công. Đang chờ xử lý.');
        }
    
        return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
    }
    
    //momo
    public function momo()
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
                return $item->anPham->chitietanpham->giacoc;
            });

            $grandTotal = $totalPrice;

             //Tính tổng số lượng
             $totalQuantity = $cartItems->sum(function ($item) {
                return $item->soluong;
            });
            // Tạo mã tham chiếu thanh toán duy nhất
            $paymentReference = 'MOMO' . now()->timestamp . '-' . $khachHang->makhachhang;

            // Truyền dữ liệu vào view
            return view('KhachHang.pages.ThueAnPham.momo', [
                'khachHang' => $khachHang,
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
                'totalQuantity' => $totalQuantity,
                'grandTotal' => $grandTotal,
                'paymentReference' => $paymentReference,
            ]);
        } else {
            return redirect()->route('route-dangnhap')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }
    }

    public function xuLyMoMo(Request $request)
    {

        $user = Auth::user();
        $khachHang = $user->khachHang;
    
        if ($khachHang) {
            $ngayThue = now();
            $ngayTra = $ngayThue->copy()->addDays(15);
            $soluong = $request->input('totalQuantity');
            $thanhtien = $request->input('grandTotal');; // Tổng tiền cọc
            // $tienThueTong = $request->input('grandTotal'); // Tổng tiền thuê
    
            // Tạo hoá đơn thuê ấn phẩm
            $hoaDon = DB::table('hoadonthueanpham')->insertGetId([
                'ngaythue' => $ngayThue,
                'ngaytra' => $ngayTra,
                'phitracham' => 0, // Có thể điều chỉnh phí trả chậm nếu cần
                'ngaythanhtoan' => now(), // Chưa thanh toán
                'phuongthucthanhtoan' => 'MoMo',
                'loaidon' => 'Đơn thuê',
                'trangthai' => 'Đang xử lý',
                'thanhtien' => $thanhtien,
                'soluongthue' => $soluong,
                'mathamchieu' => $request->input('paymentReference'),
                'manhanvien' => 1, // Có thể gán nhân viên nếu cần
                'makhachhang' => $khachHang->makhachhang,
                'created_at' => now(), // Thêm giá trị
                'updated_at' => now(), // Thêm giá trị
            ]);
            
            // Lấy các mục giỏ hàng
            $cartItems = $khachHang->gioHang()->with('anpham', 'anpham.chitietanpham')->get();
    
            foreach ($cartItems as $item) {
                $tienCoc = $item->anPham->giacoc; // Lấy tiền cọc của từng ấn phẩm
               
    
                // Lưu chi tiết thuê ấn phẩm
                DB::table('chitiethoadonthue')->insert([
                    'maanpham' => $item->maanpham, // Mã ấn phẩm 
                    'mahoadon' => $hoaDon, // Mã hoá đơn vừa tạo             
                    'created_at' => now(), // Thêm giá trị
                    'updated_at' => now(), // Thêm giá trị
                ]);

                // Cập nhật cột dathue của bảng ds_anpham
                DB::table('ds_anpham')->where('maanpham', $item->maanpham)->update([
                    'dathue' => 1,
                ]);
                
            }
    
            // Xoá giỏ hàng sau khi tạo hoá đơn
            $khachHang->gioHang()->delete();
    
            return redirect()->route('route-khachhang-trangchu')->with('success', 'Hoá đơn đã được tạo thành công. Đang chờ xử lý.');
        }
    
        return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
    } 

}

