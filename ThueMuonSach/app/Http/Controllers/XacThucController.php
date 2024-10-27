<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class XacThucController extends Controller
{
    public function hienThiDangNhap()
    {
        return view('XacThuc.dangnhap');
    }
    public function hienThiDangKy()
    {
        return view('XacThuc.dangky');
    }

    public function dangNhap(Request $request)
    {
        // Validate thông tin đăng nhập
        $request->validate([
            'tentaikhoan' => 'required|string',
            'matkhau' => 'required|string',
        ]);

        // Kiểm tra tài khoản trong cơ sở dữ liệu
        $taiKhoan = TaiKhoan::where('tentaikhoan', $request->tentaikhoan)->first();

        if ($taiKhoan && Hash::check($request->matkhau, $taiKhoan->matkhau)) {
            // Nếu đăng nhập thành công, lưu thông tin vào session
            Auth::login($taiKhoan);

            // Điều hướng về trang chủ hoặc trang phù hợp với vai trò
            switch ($taiKhoan->vaitro) {
                case 'nhanvien':
                    return redirect()->route('route-cuahang-nhanvien-quanlyanpham')->with('success', 'Đăng nhập thành công!');
                case 'quanlycuahang':
                    return redirect()->route('route-cuahang-quanlycuahang-quanlynhanvien')->with('success', 'Đăng nhập thành công!');
                case 'quanlykho':
                    return redirect()->route('route-cuahang-quanlykho-quanlyanpham')->with('success', 'Đăng nhập thành công!');
                case 'admin':
                    return redirect()->route('route-admin-nhanvien-quanlyanpham')->with('success', 'Đăng nhập thành công!');
                default:
                    return redirect()->route('route-khachhang-trangchu')->with('success', 'Đăng nhập thành công!');
            }
        }

        return back()->with('error', 'Đăng nhập thất bại do sai tài khoản hoặt mật khẩu!');

    }

    // Xử lý đăng xuất
    public function dangXuat(Request $request)
    {
        Auth::logout();

        // Điều hướng về trang chủ
        return redirect()->route('route-khachhang-trangchu');
    }
}
