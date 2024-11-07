<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\DsAnPham;
use Illuminate\Http\Request;

class DinhGiaAnPhamController extends Controller
{
    // public function hienThiDinhGiaAnPham()
    // {
    //     $dsanphamList = DsAnPham::all();
    //     return view('CuaHang.pages.QuanLyCuaHang.DinhGiaAnPham.index', compact('dsanphamList'));
    // }

    public function hienThiDinhGiaAnPham(Request $request)
    {
        $keyword = $request->input('keyword');

        $dsanphamList = DsAnPham::with('chitietanpham')
            ->when($keyword, function ($query, $keyword) {
                $query->where('maanpham', 'like', '%' . $keyword . '%')
                      ->orWhere('giathue', 'like', '%' . $keyword . '%')
                      ->orWhere('giacoc', 'like', '%' . $keyword . '%')
                      ->orWhereHas('chitietanpham', function ($query) use ($keyword) {
                          $query->where('tenanpham', 'like', '%' . $keyword . '%')
                                ->orWhere('namxuatban', 'like', '%' . $keyword . '%')
                                ->orWhere('hinhanh', 'like', '%' . $keyword . '%');
                      });
            })
            ->get();

        $message = $dsanphamList->isEmpty() ? 'Không có dữ liệu' : null;
        return view('CuaHang.pages.QuanLyCuaHang.DinhGiaAnPham.index', compact('dsanphamList', 'message'));
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
