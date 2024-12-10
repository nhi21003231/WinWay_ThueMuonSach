<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoaDonThueAnPham;
use App\Models\ChiTietHoaDonThue;
use App\Models\ChiTietAnPham;

class QuanLyAnPhamController extends Controller
{
    public function hienThiQuanLyAnPham()
    {
        // Lọc hóa đơn theo trạng thái và sắp xếp
        $hoadon = HoaDonThueAnPham::whereIn('trangthai', ['Đang xử lý',  'Đang thuê', 'Đã trả'])
        ->where('loaidon', 'Đơn thuê')
            ->orderByRaw("FIELD(trangthai, 'Đang xử lý', 'Đang thuê', 'Đã trả')") // Sắp xếp trạng thái
            ->paginate(10); // Sử dụng phân trang với 10 mục mỗi trang
    
        return view('CuaHang.pages.NhanVien.QuanLyAnPham.index', compact('hoadon'));
    }

    public function show($id)
    {
        // Lấy hóa đơn với các thông tin chi tiết
        $hoaDon = HoaDonThueAnPham::with(['khachHang', 'chiTietHoaDons.dsAnPham.chiTietAnPham'])
            ->where('mahoadon', $id)
            ->first();
    
        // Kiểm tra xem hóa đơn có tồn tại không
        if (!$hoaDon) {
            return redirect()->back()->with('error', 'Hóa đơn không tồn tại.');
        }
    
        // Tính tổng tiền cọc từ các chi tiết hóa đơn
        $tongTienCoc = $hoaDon->chiTietHoaDons->sum('giacoc');
        $tongTienThue = $hoaDon->chiTietHoaDons->sum('giathue');
    
        // Trả về view với các biến cần thiết
        return view('CuaHang.pages.NhanVien.QuanLyAnPham.chitiethoadon', compact('hoaDon', 'tongTienCoc','tongTienThue'));
    }

    public function traSach(Request $request, $mahoadon)
    {
        // Tìm hóa đơn theo mã hóa đơn
        $hoaDon = HoaDonThueAnPham::where('mahoadon', $mahoadon)->first();
    
        // Kiểm tra xem hóa đơn có tồn tại không
        if (!$hoaDon) {
            return redirect()->back()->with('error', 'Hóa đơn không tồn tại.');
        }
    
        // Kiểm tra trạng thái hiện tại của hóa đơn
        if ($hoaDon->trangthai !== 'Đang thuê') {
            return redirect()->back()->with('error', 'Hóa đơn không thể được trả vì trạng thái không phải là "Đang Thuê".');
        }
    
        // Cập nhật trạng thái của hóa đơn
        $hoaDon->trangthai = 'Đã trả';
        $hoaDon->save();
        
        return redirect()->route('route-cuahang-nhanvien-quanlyanpham')->with('success', 'Trả sách thành công!');
    }

    public function updateStatus(Request $request, $mahoadon)
    {
        // Tìm hóa đơn theo mã hóa đơn
        $hoaDon = HoaDonThueAnPham::where('mahoadon', $mahoadon)->first();
    
        // Kiểm tra xem hóa đơn có tồn tại không
        if (!$hoaDon) {
            return redirect()->back()->with('error', 'Hóa đơn không tồn tại.');
        }

        
    
        // Cập nhật trạng thái của hóa đơn
        $hoaDon->trangthai = $request->input('trangthai');
        $hoaDon->save();
        
        return redirect()->route('route-cuahang-nhanvien-quanlyanpham')->with('success', 'Trạng thái hóa đơn đã được cập nhật.');
    }
}