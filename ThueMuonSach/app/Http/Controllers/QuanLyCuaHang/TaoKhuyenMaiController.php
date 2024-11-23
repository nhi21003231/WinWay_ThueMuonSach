<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\ChuongTrinhKhuyenMai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaoKhuyenMaiController extends Controller
{
    public function hienThiTaoKhuyenMai(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request
        $keyword = $request->input('keyword');

        // Kiểm tra nếu có từ khóa thì tìm kiếm, nếu không thì lấy tất cả
        $khuyenmaiList = ChuongTrinhKhuyenMai::when($keyword, function ($query, $keyword) {
            return $query->where('mactkm', 'like', '%' . $keyword . '%')
                ->orWhere('tenchuongtrinhkm', 'like', '%' . $keyword . '%')
                ->orWhere('mota', 'like', '%' . $keyword . '%')
                ->orWhere('ngayapdung', 'like', '%' . $keyword . '%')
                ->orWhere('ngayketthuc', 'like', '%' . $keyword . '%');
        })->get();

        $message = $khuyenmaiList->isEmpty() ? 'Không có dữ liệu' : null;
        return view('CuaHang.pages.QuanLyCuaHang.TaoKhuyenMai.index', compact('khuyenmaiList', 'message'));
    }

    public function themCTKhuyenMai(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'tenchuongtrinhkm' => 'required|string|max:255',
            'mota' => 'required|string',
            'ngayapdung' => 'required|date',
            'ngayketthuc' => 'required|date|after_or_equal:ngayapdung',
            'manhanvien' => 'integer', // Hoặc validate theo yêu cầu của bạn
        ]);

        // Tạo mới chương trình khuyến mãi
        ChuongTrinhKhuyenMai::create([
            'tenchuongtrinhkm' => $request->tenchuongtrinhkm,
            'mota' => $request->mota,
            'ngayapdung' => $request->ngayapdung, // Đây sẽ là datetime
            'ngayketthuc' => $request->ngayketthuc, // Đây cũng sẽ là datetime
            'manhanvien' => 2,
        ]);

        // Redirect về trang danh sách khuyến mãi hoặc một trang khác
        return redirect()->back()->with('success', 'Tạo khuyến mãi thành công.');
    }

    public function suaCTKhuyenMai(Request $request)
    {
        // Lấy danh sách các ID của chương trình khuyến mãi
        $ids = $request->input('id');

        // Lấy các giá trị cập nhật từ form
        $tenchuongtrinhkms = $request->input('tenkhuyenmai');
        $motas = $request->input('mota');
        $ngayapdungs = $request->input('ngayapdung');
        $ngayketthucs = $request->input('ngayketthuc');

        // Kiểm tra dữ liệu đầu vào
        if ($ids && $tenchuongtrinhkms && $motas && $ngayapdungs && $ngayketthucs) {
            // Lặp qua từng ID để cập nhật thông tin
            foreach ($ids as $index => $id) {
                $khuyenmai = ChuongTrinhKhuyenMai::find($id);
                if ($khuyenmai) {
                    $khuyenmai->tenchuongtrinhkm = $tenchuongtrinhkms[$index];
                    $khuyenmai->mota = $motas[$index];
                    $khuyenmai->ngayapdung = $ngayapdungs[$index];
                    $khuyenmai->ngayketthuc = $ngayketthucs[$index];
                    $khuyenmai->save(); // Lưu bản ghi đã được cập nhật
                }
            }
        }

        // Điều hướng về trang khuyến mãi với thông báo cập nhật thành công
        return redirect()->back()->with('success', 'Cập nhật khuyến mãi thành công.');
    }

    public function xoaCTKhuyenMai($id)
    {
        // dd($id);
        $khuyenMai = ChuongTrinhKhuyenMai::findOrFail($id);

        $khuyenMai->delete();

        return redirect()->back()->with('success', 'Khuyến mãi đã được xóa thành công.');
    }

}
