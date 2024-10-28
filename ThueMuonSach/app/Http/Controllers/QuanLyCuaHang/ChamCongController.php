<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChamCong;

class ChamCongController extends Controller
{
    // phát 21/10
    public function hienThiChamCong(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = ChamCong::with('nhanvien');

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('machamcong', 'like', '%' . $keyword . '%') // Tìm theo machamcong
                    ->orWhereHas('nhanvien', function ($q) use ($keyword) {
                        $q->where('manhanvien', 'like', '%' . $keyword . '%') // Tìm theo manhanvien
                            ->orWhere('hoten', 'like', '%' . $keyword . '%'); // Tìm theo hoten
                    });
            });
        }

        $chamcongList = $query->get();
        return view('CuaHang.pages.QuanLyCuaHang.ChamCong.index', compact('chamcongList'));
    }


    public function updateChamCong(Request $request)
    {
        // Lặp qua từng mã chấm công
        foreach ($request->machamcong as $index => $machamcong) {
            // Tìm bản ghi ChamCong bằng maChamCong
            $chamCong = ChamCong::where('machamcong', $machamcong)->first();

            if ($chamCong) {
                // Cập nhật các trường tương ứng
                $chamCong->thoigianvao = $request->thoigianvao[$index]; // Thời gian vào
                $chamCong->thoigianra = $request->thoigianra[$index]; // Thời gian ra
                $chamCong->ghinhan = $request->ghinhan[$index]; // Ghi nhận
                $chamCong->save(); // Lưu lại bản ghi
            }
        }

        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');
    }
}
