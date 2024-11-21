<?php
// app/Http/Controllers/KhachHang/ThongTinController.php
namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TaiKhoan;
use App\Models\KhachHang;
use Illuminate\Http\Request;

class ThongTinController extends Controller
{
    public function show()
    {
        $taiKhoan = Auth::user();
        $khachHang = KhachHang::where('mataikhoan', $taiKhoan->mataikhoan)->first();

        if (!$khachHang) {
            return redirect()->route('route-khachhang-trangchu')->with('error', 'Không tìm thấy thông tin khách hàng.');
        }

        return view('KhachHang.pages.ThongTin.index', compact('khachHang'));
    }

    public function capNhatThongTin(Request $request)
    {
        $taiKhoan = Auth::user();
        $khachHang = KhachHang::where('mataikhoan', $taiKhoan->mataikhoan)->first();

        if (!$khachHang) {
            return redirect()->route('route-khachhang-trangchu')->with('error', 'Không tìm thấy thông tin khách hàng.');
        }
                // Xử lý giá trị hợp lệ cho cột 'lathanhvien'
        $validatedData = $request->validate([
            'hoten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'dienthoai' => 'required|string|max:15',
            'diachi' => 'required|string|max:255',
        ]);

        // Giữ nguyên giá trị của 'lathanhvien'
        $validatedData['lathanhvien'] = $khachHang->lathanhvien;
        $khachHang->update($validatedData);

        // $khachHang->update($request->all());

        return redirect()->route('route-khachhang-thongtincanhan')->with('success', 'Cập nhật thông tin thành công.');
    }
}