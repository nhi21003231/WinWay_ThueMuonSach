<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\ChuongTrinhKhuyenMai;
use Illuminate\Http\Request;

class TaoKhuyenMaiController extends Controller
{
    public function hienThiTaoKhuyenMai()
    {
        $khuyenmaiList = ChuongTrinhKhuyenMai::all();
        return view('CuaHang.pages.QuanLyCuaHang.TaoKhuyenMai.index', compact('khuyenmaiList'));
    }

    public function themCTKhuyenMai(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'tenchuongtrinhkm' => 'required|string|max:255',
            'mota' => 'required|string',
            'ngayapdung' => 'required|date',
            'ngayketthuc' => 'required|date|after_or_equal:ngayapdung',
            'manhanvien' => 'integer', // Hoặc validate theo yêu cầu của bạn
        ]);

        // Tạo mới chương trình khuyến mãi
        ChuongTrinhKhuyenMai::create([
            'tenchuongtrinhkm' => $request->tenchuongtrinhkm,
            'mota' => $request->mota,
            'ngayapdung' => $request->ngayapdung, // Đây sẽ là datetime
            'ngayketthuc' => $request->ngayketthuc, // Đây cũng sẽ là datetime
            'manhanvien' => 2,
        ]);

        // Redirect về trang danh sách khuyến mãi hoặc một trang khác
        return redirect()->back()->with('success', 'Tạo khuyến mãi thành công.');
    }
}
