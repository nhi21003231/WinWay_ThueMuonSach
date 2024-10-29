<?php

namespace App\Http\Controllers\QuanLyKho;

use App\Http\Controllers\Controller;
use App\Models\DsAnPham;
use Illuminate\Http\Request;

class QuanLyAnPhamController extends Controller
{
    public function hienThiQuanLyAnPham()
    {
        // Lấy danh sách ấn phẩm cùng với thông tin chi tiết ấn phẩm và danh mục liên quan
        $anPhams = DsAnPham::with(['chiTietAnPham', 'chiTietAnPham.danhMuc'])
            ->where('dathanhly', false)
            ->paginate(10);

        return view('CuaHang.pages.QuanLyKho.QuanLyAnPham.index', compact('anPhams'));
    }

    public function hienThiNhapAnPhamMoi()
    {
        return view('CuaHang.pages.QuanLyKho.QuanLyAnPham.nhap-an-pham-moi');
    }

    public function hienThiNhapAnPhamDaCo()
    {
        return view('CuaHang.pages.QuanLyKho.QuanLyAnPham.nhap-an-pham-da-co');
    }

    public function hienThiThanhLyAnPham()
    {
        return view('CuaHang.pages.QuanLyKho.QuanLyAnPham.thanh-ly-an-pham');
    }

    public function hienThiCapNhatTinhTrang()
    {
        $anPhams = DsAnPham::with(['chiTietAnPham', 'chiTietAnPham.danhMuc'])
            ->where('dathanhly', false)
            ->where('dathue', false)
            ->get();

        return view('CuaHang.pages.QuanLyKho.QuanLyAnPham.cap-nhat-tinh-trang', compact('anPhams'));
    }

    public function xuLyCapNhatTinhTrang(Request $request)
    {
        $anPhamIds = $request->input('anpham_ids');
        $tinhTrangs = $request->input('tinh_trang');

        foreach ($anPhamIds as $id) {
            if (isset($tinhTrangs[$id])) {
                $anPham = DsAnPham::find($id);
                if ($anPham) {
                    $anPham->tinhtrang = $tinhTrangs[$id];
                    $anPham->save();
                }
            }
        }

        return redirect()->route('route-cuahang-quanlykho-quanlyanpham')->with('success', 'Cập nhật tình trạng ấn phẩm thành công!');
    }
}
