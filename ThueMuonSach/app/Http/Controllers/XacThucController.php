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

    public function hienThiDangNhapQuanTri()
    {
        return view('XacThuc.dangnhap-quantri');
    }

    public function hienThiDangKy()
    {
        return view('XacThuc.dangky');
    }

    public function dangNhap(Request $request)
    {
        // Xác thực tài khoản khách hàng
        $request->validate([
            'tentaikhoan' => 'required|string',
            'matkhau' => 'required|string',
        ]);

        $taiKhoan = TaiKhoan::where('tentaikhoan', $request->tentaikhoan)->first();

        if ($taiKhoan && Hash::check($request->matkhau, $taiKhoan->matkhau) && $taiKhoan->vaitro === 'khachhang') {
            Auth::login($taiKhoan);
            return redirect()->route('route-khachhang-trangchu')->with('success', 'Đăng nhập thành công!');
        }

        return redirect()->back()->with('error', 'Đăng nhập thất bại! Kiểm tra tài khoản hoặc mật khẩu.');
    }

    public function dangNhapQuanTri(Request $request)
    {
        // Xác thực tài khoản quản trị
        $request->validate([
            'tentaikhoan' => 'required|string',
            'matkhau' => 'required|string',
        ]);

        $taiKhoan = TaiKhoan::where('tentaikhoan', $request->tentaikhoan)->first();

        if ($taiKhoan && Hash::check($request->matkhau, $taiKhoan->matkhau) && in_array($taiKhoan->vaitro, ['admin', 'quanlycuahang', 'quanlykho', 'nhanvien'])) {
            Auth::login($taiKhoan);

            // Điều hướng theo vai trò
            switch ($taiKhoan->vaitro) {
                case 'nhanvien':
                    return redirect()->route('route-cuahang-nhanvien-quanlyanpham')->with('success', 'Đăng nhập thành công!');
                case 'quanlycuahang':
                    return redirect()->route('route-cuahang-quanlycuahang-quanlynhanvien')->with('success', 'Đăng nhập thành công!');
                case 'quanlykho':
                    return redirect()->route('route-cuahang-quanlykho-quanlyanpham')->with('success', 'Đăng nhập thành công!');
                case 'admin':
                    return redirect()->route('route-cuahang-nhanvien-quanlyanpham')->with('success', 'Đăng nhập thành công!');
            }
        }

        return redirect()->back()->with('error', 'Đăng nhập thất bại! Kiểm tra tài khoản hoặc mật khẩu.');
    }

    // Xử lý đăng xuất
    public function dangXuat()
    {
        Auth::logout();

        // Điều hướng về trang chủ
        return redirect()->route('route-khachhang-trangchu')->with('success', 'Đăng xuất thành công!');
    }
}
