<?php

namespace App\Http\Controllers\KhachHang;
// use App\Models\DanhSachAnPham;
use App\Models\ChiTietAnPham;
use App\Models\DanhMuc;
use App\Models\DsAnPham;
use App\Models\HoaDonThueAnPham;
use App\Models\ChiTietHoaDonThue;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DanhSachAnPhamController extends Controller
{
    public function hienThiDanhSachAnPham()
    {

            // $chitietanpham = ChiTietAnPham::take(8)->get();
            $chitietanpham = ChiTietAnPham::paginate(12);

        return view('KhachHang.pages.DanhSachAnPham.index', compact('chitietanpham'));

    }
    public function hienThiDanhMuc($danhMuc)
    {
        // Lấy danh mục theo tên
        $danhMuc = DanhMuc::where('tendanhmuc', $danhMuc)->firstOrFail();

        // Lấy danh sách ấn phẩm theo danh mục
        $chitietanpham = ChiTietAnPham::where('madanhmuc', $danhMuc->madanhmuc)->paginate(8);

        return view('KhachHang.pages.DanhSachAnPham.index', compact('chitietanpham', 'danhMuc'));
    }

    // public function datTruocAnPham($maanpham)
    // {
    //     $anpham = DsAnPham::findOrFail($maanpham);
    //     $anpham->dattruoc = true;
    //     $anpham->save();

    //     return redirect()->back()->with('success', 'Bạn đã đặt trước ấn phẩm thành công.');
    // }
    public function hienThiFormDatTruoc($mactanpham)
    {
        $anPham = ChiTietAnPham::findOrFail($mactanpham);
        $taiKhoan = Auth::user();
        $khachHang = KhachHang::where('mataikhoan', $taiKhoan->mataikhoan)->first();
    
        return view('KhachHang.pages.DatTruoc.index', compact('anPham', 'khachHang'));
    }
//     public function suaThongTinDatTruoc(Request $request, $mactanpham)
// {
//     $request->validate([
//         'hoten' => 'required|string|max:255',
//         'diachi' => 'required|string|max:255',
//         'dienthoai' => 'required|string|max:15',
//     ]);

//     $khachHang = KhachHang::where('mataikhoan', Auth::id())->first();
//     if ($khachHang) {
//         $khachHang->hoten = $request->input('hoten');
//         $khachHang->diachi = $request->input('diachi');
//         $khachHang->dienthoai = $request->input('dienthoai');
//         $khachHang->save();
//     }

//     return redirect()->route('route-khachhang-thueanpham-nganhang')->with('success', 'Thông tin của bạn đã được cập nhật.');
// }
public function hienThiHoaDonDatTruoc(Request $request, $mactanpham)
{
    $request->validate([
        'hoten' => 'required|string|max:255',
        'diachi' => 'required|string|max:255',
        'dienthoai' => 'required|string|max:15',
    ]);

    // Retrieve the customer and product details
    $khachHang = KhachHang::where('mataikhoan', Auth::id())->first();
    if ($khachHang) {
        $khachHang->hoten = $request->input('hoten');
        $khachHang->diachi = $request->input('diachi');
        $khachHang->dienthoai = $request->input('dienthoai');
        $khachHang->save();
    }
    // $anPham = chitietanpham::findOrFail($mactanpham);
    $anPham = ChiTietAnPham::findOrFail($mactanpham);
    // Pass the data to the view
    return view('KhachHang.pages.HoaDonDatTruoc.index', compact('khachHang', 'anPham'));
}
// public function huyDatTruocAnPham($mactanpham)
// {
//     $anpham = DsAnPham::findOrFail($mactanpham);
//     $anpham->dattruoc = false;
//     $anpham->save();

//     return redirect()->back()->with('success', 'Bạn đã hủy đặt trước ấn phẩm thành công.');
// }
public function hienThiThanhToan(Request $request, $mactanpham)
{
    $anPham = ChiTietAnPham::findOrFail($mactanpham);
    $khachHang = KhachHang::where('mataikhoan', Auth::id())->first();

    // Pass the data to the thanhToan view
    return view('KhachHang.pages.thanhToandattruoc.index', compact('anPham', 'khachHang'));
}
    public function datTruocAnPham(Request $request, $mactanpham)
    {
        $request->validate([
            'hoten' => 'required|string|max:255',
            'diachi' => 'required|string|max:255',
            'dienthoai' => 'required|string|max:15',
        ]);

        $anpham = DsAnPham::findOrFail($mactanpham);

        $hoadon = new HoaDonThueAnPham();
        $hoadon->ngaythue = now();
        $hoadon->ngaytra = now()->addDays(7);
        $hoadon->phitracham = 0;
        $hoadon->ngaythanhtoan = now();
        $hoadon->phuongthucthanhtoan = 'Tiền mặt';
        $hoadon->loaidon = 'Đặt trước';
        $hoadon->trangthai = 'Đang thuê';
        $hoadon->manhanvien = 1;
        $hoadon->makhachhang = Auth::id();
        $hoadon->save();

        $chitiet = new ChiTietHoaDonThue();
        $chitiet->mahoadon = $hoadon->mahoadon;
        $chitiet->maanpham = $anpham->maanpham;
        $chitiet->soluongthue = 1;
        $chitiet->tiencoc = $anpham->giacoc;
        $chitiet->tienthue = $anpham->giathue;
        $chitiet->save();

        return redirect()->route('route-khachhang-thueanpham-hoadon')->with('success', 'Bạn đã đặt trước ấn phẩm thành công.');
    }
    
}
