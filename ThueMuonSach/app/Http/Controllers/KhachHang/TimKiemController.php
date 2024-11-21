<?php
namespace App\Http\Controllers\KhachHang;
use App\Http\Controllers\Controller;
use App\Models\DanhSachAnPham;
use App\Models\ChiTietAnPham;
use Illuminate\Http\Request;

class TimKiemController extends Controller
{
    public function search(Request $request)
    {
        // Lấy từ khóa từ input "search" trong form
        $keyword = $request->input('search');

        // Tìm kiếm sản phẩm theo tên có chứa từ khóa
        // $chitietanpham = DanhSachAnPham::where('tenanpham', 'like', '%' . $keyword . '%')->get();
        if ($keyword) {
            // Nếu có từ khóa, tìm kiếm theo tên sản phẩm
            $chitietanpham = ChiTietAnPham::where('tenanpham', 'like', '%' . $keyword . '%')->paginate();
        } else {
            // Nếu không có từ khóa, lấy tất cả sản phẩm
            $chitietanpham = ChiTietAnPham::paginate();
        }
        // Trả về view cùng với kết quả tìm kiếm
        // return view('KhachHang.DanhSachAnPham', compact('chitietanpham'));
        return view('KhachHang.pages.DanhSachAnPham.index',compact('chitietanpham'));
    }
}
