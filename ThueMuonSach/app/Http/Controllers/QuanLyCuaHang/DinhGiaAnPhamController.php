<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\ChiTietAnPham;
use App\Models\DsAnPham;
use Illuminate\Http\Request;

class DinhGiaAnPhamController extends Controller
{
    // public function hienThiDinhGiaAnPham(Request $request)
    // {
    //     $keyword = $request->input('keyword');

    //     $dsanphamList = DsAnPham::with('chiTietAnPham')
    //         ->when($keyword, function ($query, $keyword) {
    //             $query->where('maanpham', 'like', '%' . $keyword . '%')
    //                 ->orWhere('giathue', 'like', '%' . $keyword . '%')
    //                 ->orWhere('giacoc', 'like', '%' . $keyword . '%')
    //                 ->orWhereHas('chiTietAnPham', function ($query) use ($keyword) {
    //                     $query->where('tenanpham', 'like', '%' . $keyword . '%')
    //                         ->orWhere('namxuatban', 'like', '%' . $keyword . '%')
    //                         ->orWhere('hinhanh', 'like', '%' . $keyword . '%');
    //                 });
    //         })
    //         ->get();

    //     $message = $dsanphamList->isEmpty() ? 'Không có dữ liệu' : null;
    //     return view('CuaHang.pages.QuanLyCuaHang.DinhGiaAnPham.index', compact('dsanphamList', 'message'));
    // }

    // public function hienThiDinhGiaAnPham(Request $request)
    // {
    //     $keyword = $request->input('keyword');

    //     $dsctanphamList = chiTietAnPham
    //         ->when($keyword, function ($query, $keyword) {
    //             $query->whereHas('chiTietAnPham', function ($query) use ($keyword) {
    //                 $query->where('tenanpham', 'like', '%' . $keyword . '%')
    //                     ->orWhere('namxuatban', 'like', '%' . $keyword . '%');
    //             });
    //         })
    //         ->get();

    //     $message = $dsanphamList->isEmpty() ? 'Không có dữ liệu' : null;
    //     return view('CuaHang.pages.QuanLyCuaHang.DinhGiaAnPham.index', compact('dsanphamList', 'message'));
    // }

    public function hienThiDinhGiaAnPham(Request $request)
    {
        $keyword = $request->input('keyword');

        $dsctanphamList = ChiTietAnPham::query()
            ->when($keyword, function ($query, $keyword) {
                $query->where('tenanpham', 'like', '%' . $keyword . '%')
                    ->orWhere('tacgia', 'like', '%' . $keyword . '%')
                    ->orWhere('namxuatban', 'like', '%' . $keyword . '%');
            })
            ->get();

        $message = $dsctanphamList->isEmpty() ? 'Không có dữ liệu' : null;

        return view('CuaHang.pages.QuanLyCuaHang.DinhGiaAnPham.index', compact('dsctanphamList', 'message'));
    }


    public function suaDinhGiaAnPham(Request $request)
    {
        // Lấy dữ liệu từ request
        $id = $request->input('id');
        $giathue = $request->input('giathue');
        $giacoc = $request->input('giacoc');

        // Kiểm tra nếu giá thuê và giá cọc có phải là số hợp lệ
        if (!is_numeric($giathue) || !is_numeric($giacoc)) {
            return redirect()->back()->with('error', 'Giá thuê và giá cọc phải là số hợp lệ.');
        }

        // Kiểm tra nếu giá thuê và giá cọc có phải là số dương
        if ($giathue <= 0 || $giacoc <= 0) {
            return redirect()->back()->with('error', 'Giá thuê và giá cọc phải là số dương.');
        }

        // Kiểm tra nếu giá thuê nhỏ hơn giá cọc
        if ($giathue >= $giacoc) {
            return redirect()->back()->with('error', 'Giá thuê phải nhỏ hơn giá cọc.');
        }

        // Tìm ấn phẩm theo ID
        $anpham = ChiTietAnPham::find($id);

        if ($anpham) {
            // Cập nhật giá thuê và giá cọc
            $anpham->giathue = $giathue;
            $anpham->giacoc = $giacoc;
            $anpham->save();

            return redirect()->back()->with('success', 'Cập nhật định giá thành công.');
        }

        return redirect()->back()->with('error', 'Không tìm thấy ấn phẩm.');
    }

    
}
