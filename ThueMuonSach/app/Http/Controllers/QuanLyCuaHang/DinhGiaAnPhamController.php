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

    public function hienThiDinhGiaAnPham(Request $request)
    {
        $keyword = $request->input('keyword');

        $dsanphamList = DsAnPham::with('chiTietAnPham')
            ->when($keyword, function ($query, $keyword) {
                $query->whereHas('chiTietAnPham', function ($query) use ($keyword) {
                    $query->where('tenanpham', 'like', '%' . $keyword . '%')
                        ->orWhere('namxuatban', 'like', '%' . $keyword . '%');
                });
            })
            ->get();

        $message = $dsanphamList->isEmpty() ? 'Không có dữ liệu' : null;
        return view('CuaHang.pages.QuanLyCuaHang.DinhGiaAnPham.index', compact('dsanphamList', 'message'));
    }




    // public function suaDinhGiaAnPham(Request $request)
    // {
    //     // Lấy tất cả ID, giá thuê và giá cọc từ request
    //     $ids = $request->input('id');
    //     $giaThueList = $request->input('giathue');
    //     $giaCocList = $request->input('giacoc');

    //     // Lặp qua từng ID để cập nhật giá trị tương ứng
    //     foreach ($ids as $index => $id) {
    //         // Kiểm tra xem giá thuê và giá cọc có phải là số hợp lệ và số dương không
    //         if (!is_numeric($giaThueList[$index]) || !is_numeric($giaCocList[$index])) {
    //             // Nếu giá thuê hoặc giá cọc không phải là số, trả về thông báo lỗi
    //             return redirect()->back()->with('error', 'Giá thuê và giá cọc phải là số hợp lệ.');
    //         }

    //         // Kiểm tra xem giá thuê và giá cọc có phải là số dương không
    //         if ($giaThueList[$index] <= 0 || $giaCocList[$index] <= 0) {
    //             // Nếu giá thuê hoặc giá cọc là số âm hoặc bằng 0, trả về thông báo lỗi
    //             return redirect()->back()->with('error', 'Giá thuê và giá cọc phải là số dương.');
    //         }

    //         // Kiểm tra điều kiện giá thuê phải nhỏ hơn giá cọc
    //         if ($giaThueList[$index] >= $giaCocList[$index]) {
    //             // Nếu giá thuê >= giá cọc, trả về thông báo lỗi
    //             return redirect()->back()->with('error', 'Giá thuê phải nhỏ hơn giá cọc.');
    //         }

    //         // Tìm ấn phẩm theo ID
    //         $anpham = ChiTietAnPham::find($id);

    //         if ($anpham) {
    //             // Cập nhật giá thuê và giá cọc
    //             $anpham->giathue = $giaThueList[$index];
    //             $anpham->giacoc = $giaCocList[$index];
    //             $anpham->save();
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Cập nhật định giá thành công.');
    // }
    // public function suaDinhGiaAnPham(Request $request)
    // {
    //     // Lấy tất cả ID, giá thuê và giá cọc từ request
    //     $ids = $request->input('id');
    //     $giaThueList = $request->input('giathue');
    //     $giaCocList = $request->input('giacoc');

    //     // Lặp qua từng ID để cập nhật giá trị tương ứng
    //     foreach ($ids as $index => $id) {
    //         // Kiểm tra xem giá thuê và giá cọc có phải là số hợp lệ và số dương không
    //         if (!is_numeric($giaThueList[$index]) || !is_numeric($giaCocList[$index])) {
    //             // Nếu giá thuê hoặc giá cọc không phải là số, trả về thông báo lỗi
    //             return redirect()->back()->with('error', 'Giá thuê và giá cọc phải là số hợp lệ.');
    //         }

    //         // Kiểm tra xem giá thuê và giá cọc có phải là số dương không
    //         if ($giaThueList[$index] <= 0 || $giaCocList[$index] <= 0) {
    //             // Nếu giá thuê hoặc giá cọc là số âm hoặc bằng 0, trả về thông báo lỗi
    //             return redirect()->back()->with('error', 'Giá thuê và giá cọc phải là số dương.');
    //         }

    //         // Kiểm tra điều kiện giá thuê phải nhỏ hơn giá cọc
    //         if ($giaThueList[$index] >= $giaCocList[$index]) {
    //             // Nếu giá thuê >= giá cọc, trả về thông báo lỗi
    //             return redirect()->back()->with('error', 'Giá thuê phải nhỏ hơn giá cọc.');
    //         }

    //         // Tìm ấn phẩm theo ID
    //         $anpham = ChiTietAnPham::find($id);

    //         if ($anpham) {
    //             // Cập nhật giá thuê và giá cọc
    //             $anpham->giathue = $giaThueList[$index];
    //             $anpham->giacoc = $giaCocList[$index];
    //             $anpham->save();
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Cập nhật định giá thành công.');
    // }

    public function suaDinhGiaAnPham(Request $request)
    {
        // Lấy tất cả ID, giá thuê và giá cọc từ request
        $ids = $request->input('id');
        $giaThueList = $request->input('giathue');
        $giaCocList = $request->input('giacoc');

        // Lặp qua từng ID để cập nhật giá trị tương ứng
        foreach ($ids as $index => $id) {
            // Kiểm tra xem giá thuê và giá cọc có phải là số hợp lệ và số dương không
            if (!is_numeric($giaThueList[$index]) || !is_numeric($giaCocList[$index])) {
                // Nếu giá thuê hoặc giá cọc không phải là số, trả về thông báo lỗi
                return redirect()->back()->with('error', 'Giá thuê và giá cọc phải là số hợp lệ.');
            }

            // Kiểm tra xem giá thuê và giá cọc có phải là số dương không
            if ($giaThueList[$index] <= 0 || $giaCocList[$index] <= 0) {
                // Nếu giá thuê hoặc giá cọc là số âm hoặc bằng 0, trả về thông báo lỗi
                return redirect()->back()->with('error', 'Giá thuê và giá cọc phải là số dương.');
            }

            // Kiểm tra điều kiện giá thuê phải nhỏ hơn giá cọc
            if ($giaThueList[$index] >= $giaCocList[$index]) {
                // Nếu giá thuê >= giá cọc, trả về thông báo lỗi
                return redirect()->back()->with('error', 'Giá thuê phải nhỏ hơn giá cọc.');
            }

            // Tìm ấn phẩm theo ID
            $anpham = ChiTietAnPham::find($id);

            if ($anpham) {
                // Cập nhật giá thuê và giá cọc cho ChiTietAnPham
                $anpham->giathue = $giaThueList[$index];
                $anpham->giacoc = $giaCocList[$index];
                $anpham->save();

                // Kiểm tra xem dsAnPhams có dữ liệu không
                $dsAnPhams = $anpham->dsAnPhams;  // Lấy tất cả các DSAnPham liên quan đến ChiTietAnPham

                if ($dsAnPhams && $dsAnPhams->count() > 0) {
                    // Nếu dsAnPhams có dữ liệu, lặp qua để cập nhật giá thuê và giá cọc
                    foreach ($dsAnPhams as $dsAnPham) {
                        // Cập nhật giá thuê và giá cọc cho mỗi DSAnPham
                        $dsAnPham->giathue = $giaThueList[$index];
                        $dsAnPham->giacoc = $giaCocList[$index];
                        $dsAnPham->save();
                    }
                }
            }
        }

        // Thông báo cập nhật thành công
        return redirect()->back()->with('success', 'Cập nhật định giá thành công.');
    }
}
