<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;
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
            'ten_tai_khoan' => 'required|string',
            'mat_khau' => 'required|string',
        ]);

        // Kiểm tra tài khoản trong cơ sở dữ liệu
        $taiKhoan = TaiKhoan::where('ten_tai_khoan', $request->ten_tai_khoan)->first();

        if ($taiKhoan && Hash::check($request->mat_khau, $taiKhoan->mat_khau)) {
            // Nếu đăng nhập thành công, lưu thông tin vào session
            $request->session()->put('ten_tai_khoan', $taiKhoan->ten_tai_khoan);
            $request->session()->put('vai_tro', $taiKhoan->vai_tro);

            // Điều hướng về trang chủ hoặc trang phù hợp với vai trò
            return redirect()->route('router-khachhang-trang-chu');
        }

        // Nếu thất bại, quay lại trang đăng nhập với lỗi
        return back()->withErrors([
            'dangnhap' => 'Tên tài khoản hoặc mật khẩu không đúng',
        ]);
    }

    // Xử lý đăng xuất
    public function dangXuat(Request $request)
    {
        // Xóa dữ liệu session
        $request->session()->forget('ten_tai_khoan');
        $request->session()->forget('vai_tro');

        // Điều hướng về trang đăng nhập
        return redirect()->route('route-dang-nhap');
    }
}
