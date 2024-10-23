<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChamCong;

class ChamCongController extends Controller
{
    // phát 21/10
    public function hienThiChamCong()
    {
        $chamCongList = ChamCong::with('nhanvien')->get();
        return view('CuaHang.pages.QuanLyCuaHang.ChamCong.index', compact('chamCongList'));
    }
 

    public function updateChamCong(Request $request)
    {
        // Lặp qua từng mã chấm công
        foreach ($request->maChamCong as $index => $maChamCong) {
            // Tìm bản ghi ChamCong bằng maChamCong
            $chamCong = ChamCong::where('maChamCong', $maChamCong)->first();

            if ($chamCong) {
                // Cập nhật các trường tương ứng
                $chamCong->thoiGianVao = $request->thoiGianVao[$index]; // Thời gian vào
                $chamCong->thoiGianRa = $request->thoiGianRa[$index]; // Thời gian ra
                $chamCong->ghiNhan = $request->ghiNhan[$index]; // Ghi nhận
                $chamCong->save(); // Lưu lại bản ghi
            }
        }

        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');
    }
}
