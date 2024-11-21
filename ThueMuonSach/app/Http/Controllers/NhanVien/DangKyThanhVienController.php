<?php

// namespace App\Http\Controllers\NhanVien;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class DangKyThanhVienController extends Controller
// {
//     public function hienThiDangKyThanhVien()
//     {
//         return view('CuaHang.pages.NhanVien.DangKyThanhVien.index');
//     }
// }

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhachHang;

class DangKyThanhVienController extends Controller
{
    public function hienThiDangKyThanhVien()
    {
        // Retrieve the list of customers
        $customers = KhachHang::all();

        // Pass the data to the view
        return view('CuaHang.pages.NhanVien.DangKyThanhVien.index', compact('customers'));
    }

    public function capNhatThanhVien(Request $request)
    {
        // Validate the request
        $request->validate([
            'members' => 'array',
        ]);

        // Update the membership status
        $members = $request->input('members', []);
        KhachHang::query()->update(['lathanhvien' => 0]); // Reset all to non-member
        KhachHang::whereIn('makhachhang', $members)->update(['lathanhvien' => 1]); // Set selected to member

        return redirect()->route('route-cuahang-nhanvien-dangkythanhvien')->with('success', 'Cập nhật thành viên thành công.');
    }
}