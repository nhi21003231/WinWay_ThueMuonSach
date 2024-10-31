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
            ->get();

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


    // Thanh lý ấn phẩm
    public function hienThiThanhLyAnPham()
    {
        $anPhams = DsAnPham::with(['chiTietAnPham', 'chiTietAnPham.danhMuc'])
            ->where('dathanhly', false)
            ->where('dathue', false)
            ->get();

        return view('CuaHang.pages.QuanLyKho.QuanLyAnPham.thanh-ly-an-pham', compact('anPhams'));
    }

    public function xuLyThanhLyAnPham(Request $request)
    {
        // Nhận danh sách ID của các ấn phẩm cần thanh lý từ yêu cầu POST
        $anPhamIds = $request->input('anpham_ids', []);

        // Kiểm tra nếu không có ấn phẩm nào được chọn để thanh lý
        if (empty($anPhamIds)) {
            return redirect()->back()->with('error', 'Chưa chọn ấn phẩm nào!');
        }

        try {
            // Cập nhật thuộc tính 'dathanhly' cho các ấn phẩm được chọn
            DsAnPham::whereIn('maanpham', $anPhamIds)->update(['dathanhly' => true]);

            // Trả về thông báo thành công
            return redirect()->route('route-cuahang-quanlykho-quanlyanpham')->with('success', 'Thanh lý ấn phẩm thành công.');
        } catch (\Exception $e) {
            // Trả về thông báo lỗi nếu có vấn đề trong quá trình xử lý
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thanh lý ấn phẩm. Vui lòng thử lại sau.');
        }
    }



    // Cập nhật tình trạng ấn phẩm
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
