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
        $message = $chamcongList->isEmpty() ? 'Không có dữ liệu' : null;
        return view('CuaHang.pages.QuanLyCuaHang.ChamCong.index', compact('chamcongList', 'message'));
    }

    public function updateChamCong(Request $request)
    {
        // Lặp qua từng mã chấm công
        foreach ($request->machamcong as $index => $machamcong) {
            // Tìm bản ghi ChamCong bằng maChamCong
            $chamCong = ChamCong::where('machamcong', $machamcong)->first();

            if ($chamCong) {
                // Kiểm tra và cập nhật thời gian vào (thoigianvao)
                $thoigianvao = !empty($request->thoigianvao[$index]) ? $request->thoigianvao[$index] : null;

                // Kiểm tra và cập nhật thời gian ra (thoigianra)
                $thoigianra = !empty($request->thoigianra[$index]) ? $request->thoigianra[$index] : null;

                // Kiểm tra nếu có thời gian vào và thời gian ra
                if ($thoigianvao && $thoigianra) {
                    // Kiểm tra nếu thời gian vào lớn hơn thời gian ra
                    if (strtotime($thoigianvao) > strtotime($thoigianra)) {
                        return redirect()->back()->with('error', 'Thời gian vào phải trước thời gian ra.');
                    }
                }

                // Kiểm tra nếu thời gian ra trống thì cập nhật ghi nhận là 'Vắng mặt'
                if (empty($thoigianra)) {
                    $chamCong->ghinhan = 'Vắng mặt';
                } else {
                    $chamCong->ghinhan = $request->ghinhan[$index]; // Cập nhật ghi nhận nếu có
                }

                // Cập nhật các trường còn lại
                $chamCong->thoigianvao = $thoigianvao;
                $chamCong->thoigianra = $thoigianra;

                // Lưu lại bản ghi
                $chamCong->save();
            }
        }

        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');
    }
}
