<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\DsAnPham;
use Illuminate\Http\Request;

class DinhGiaAnPhamController extends Controller
{
    public function hienThiDinhGiaAnPham()
    {
        $dsanphamList = DsAnPham::all();
        return view('CuaHang.pages.QuanLyCuaHang.DinhGiaAnPham.index', compact('dsanphamList'));
    }

    public function suaDinhGiaAnPham(Request $request)
    {
        // Lấy tất cả ID, giá thuê và giá cọc từ request
        $ids = $request->input('id');
        $giaThueList = $request->input('giathue');
        $giaCocList = $request->input('giacoc');

        // Lặp qua từng ID để cập nhật giá trị tương ứng
        foreach ($ids as $index => $id) {
            // Tìm ấn phẩm theo ID
            $anpham = DsAnPham::find($id);

            if ($anpham) {
                // Cập nhật giá thuê và giá cọc
                $anpham->giathue = $giaThueList[$index];
                $anpham->giacoc = $giaCocList[$index];
                $anpham->save();
            }
        }
        return redirect()->back()->with('success', 'Cập nhật định giá thành công.');
    }
}
