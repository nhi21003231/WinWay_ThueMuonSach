<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ChiTietAnPham;
use App\Models\HoaDonThueAnPham;
class DatTruocController extends Controller
{
    public function hienThiThanhToanDatTruoc(Request $request){
        // dd($request->all());
        $anPham = ChiTietAnPham::findOrFail($request->id_ctanpham);
        $grandTotal = $anPham->giacoc;
        $khachHang = auth()->user();
        $totalQuantity = 1;
        $type = 'Đặt trước';
        // dd($grandTotal); 
        $paymentReference = 'MOMO' . now()->timestamp . '-' . $khachHang->makhachhang;
        if ($request->payment_method == 'momo'){
            $paymentReference = 'MOMO' . now()->timestamp . '-' . $khachHang->makhachhang;
            return view('KhachHang.pages.ThueAnPham.momo', [
            'anPham' => $anPham,
            'grandTotal' => $grandTotal,
            'paymentReference' => $paymentReference,
            'khachHang' => $khachHang,
            'totalQuantity' => $totalQuantity,
            'type' => $type,
            'payment_method'=>$request->payment_method,
            ]);
        }else{
            $paymentReference = 'bank' . now()->timestamp . '-' . $khachHang->makhachhang;
            return view('KhachHang.pages.ThueAnPham.nganhang', [
            'anPham' => $anPham,
            'grandTotal' => $grandTotal,
            'paymentReference' => $paymentReference,
            'khachHang' => $khachHang,
            'totalQuantity' => $totalQuantity,
            'type' => $type,
            'payment_method'=>'Chuyển khoản',
            ]);
        }
        
        
    }
    public function luudonhang(Request $request){
        // dd($request->all());
        $khachHang = auth()->user();
        
            $ngayThue = now();
            // $ngayTra = $ngayThue->copy()->addDays(15);
            $thanhtien = $request->input('grandTotal');
        $hoadon = HoaDonThueAnPham::create([
                'ngaythue' => $ngayThue,
                'ngaytra' => $ngayTra,
                'phitracham' => 0, // Có thể điều chỉnh phí trả chậm nếu cần
                'thanhtien' => $thanhtien,
                'ngaythanhtoan' => now(), // Chưa thanh toán
                'phuongthucthanhtoan' => $request->payment_method == 'momo' ? $request->payment_method:'Chuyển khoản',
                'mathamchieu' => $request->input('paymentReference'),
                'loaidon' => 'Đặt trước',
                'trangthai' => 'Đang xử lý',
                
                'soluongthue' => 1,
                
                'manhanvien' => 1, // Có thể gán nhân viên nếu cần
                'makhachhang' => $khachHang->khachHang->makhachhang,
                'mactanpham' => $request->id_ctanpham,
        ]);
        
       $hoadon->save();
        
       return redirect()->route('route-khachhang-trangchu')->with('success', 'Hoá đơn đã được tạo thành công. Đang chờ xử lý.');
    }
}
