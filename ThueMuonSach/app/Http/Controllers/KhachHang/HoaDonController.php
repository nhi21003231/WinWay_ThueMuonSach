<?php
// app/Http/Controllers/KhachHang/HoaDonController.php
namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoaDonThueAnPham;
use Illuminate\Support\Facades\Auth;

class HoaDonController extends Controller
{
    public function lichSuThue()
    {
        // dd(Auth::user()->KhachHang);
        // Lấy tất cả các hoá đơn của khách hàng hiện tại
        $hoadons = HoaDonThueAnPham::with(['chiTietHoaDons.dsAnPham.chiTietAnPham'])
            ->where('makhachhang', Auth::user()->KhachHang->makhachhang) // Lọc theo khách hàng đang đăng nhập
            ->where('loaidon', operator: 'Đơn thuê') // Lọc theo loại đơn 
            // ->where('trangthai', operator: 'Đã trả') // Lọc theo trạng thái đã trả
            ->orderBy('ngaythue', 'desc')
            ->get();

        return view('KhachHang.pages.LichSu.index', compact('hoadons'));
    }
}
