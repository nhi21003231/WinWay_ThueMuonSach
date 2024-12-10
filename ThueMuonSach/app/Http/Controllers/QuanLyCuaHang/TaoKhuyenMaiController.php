<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\ChuongTrinhKhuyenMai;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
        // Kiểm tra tên chương trình khuyến mãi có bị trùng hay không
        $existingProgram = ChuongTrinhKhuyenMai::where('tenchuongtrinhkm', $request->tenchuongtrinhkm)->first();

        if ($existingProgram) {
            // Nếu tên chương trình đã tồn tại
            return redirect()->back()->with('error', 'Tên chương trình khuyến mãi đã tồn tại.');
        }

        // Kiểm tra xem ngày áp dụng có trước ngày kết thúc không
        if (strtotime($request->ngayapdung) >= strtotime($request->ngayketthuc)) {
            // Nếu ngày áp dụng không nhỏ hơn ngày kết thúc
            return redirect()->back()->with('error', 'Ngày áp dụng phải nhỏ hơn ngày kết thúc.');
        }

        // Nếu không có lỗi, tiến hành lưu chương trình khuyến mãi mới
        ChuongTrinhKhuyenMai::create([
            'tenchuongtrinhkm' => $request->tenchuongtrinhkm,
            'mota' => $request->mota,
            'ngayapdung' => $request->ngayapdung, // Đây sẽ là datetime
            'ngayketthuc' => $request->ngayketthuc, // Đây cũng sẽ là datetime
            'manhanvien' => 2, // Chỉnh sửa thành lấy giá trị từ request
        ]);

        // Nếu tất cả điều kiện đều hợp lệ, trả về thông báo thành công
        return redirect()->back()->with('success', 'Tạo khuyến mãi thành công.');
    }

    public function suaCTKhuyenMai(Request $request)
    {
        // Lặp qua từng ID để cập nhật thông tin
        foreach ($request->id as $index => $id) {
            $khuyenmai = ChuongTrinhKhuyenMai::find($id);

            if ($khuyenmai) {
                // Xây dựng mảng dữ liệu và quy tắc chỉ cho trường thay đổi
                $dataToValidate = [];
                $rules = [];

                // Kiểm tra nếu tên chương trình khuyến mãi thay đổi
                if ($khuyenmai->tenchuongtrinhkm !== $request->tenkhuyenmai[$index]) {
                    // Kiểm tra trùng tên chương trình khuyến mãi
                    $existingProgram = ChuongTrinhKhuyenMai::where('tenchuongtrinhkm', $request->tenkhuyenmai[$index])->first();
                    if ($existingProgram) {
                        return redirect()->back()->with('error', 'Tên chương trình khuyến mãi này đã tồn tại.');
                    }

                    $dataToValidate['tenchuongtrinhkm'] = $request->tenkhuyenmai[$index];
                    $rules['tenchuongtrinhkm'] = 'required|string|max:255';
                }

                // Kiểm tra nếu mô tả thay đổi
                if ($khuyenmai->mota !== $request->mota[$index]) {
                    $dataToValidate['mota'] = $request->mota[$index];
                    $rules['mota'] = 'required|string';
                }

                // Kiểm tra nếu ngày áp dụng thay đổi
                if ($khuyenmai->ngayapdung !== $request->ngayapdung[$index]) {
                    $dataToValidate['ngayapdung'] = $request->ngayapdung[$index];
                    $rules['ngayapdung'] = 'required|date';
                }

                // Kiểm tra nếu ngày kết thúc thay đổi
                if ($khuyenmai->ngayketthuc !== $request->ngayketthuc[$index]) {
                    $dataToValidate['ngayketthuc'] = $request->ngayketthuc[$index];
                    $rules['ngayketthuc'] = 'required|date';
                }

                // Thực hiện validate nếu có trường cần kiểm tra
                if (!empty($rules)) {
                    $validator = Validator::make($dataToValidate, $rules);

                    if ($validator->fails()) {
                        return redirect()->back()->with('error', $validator->errors()->first());
                    }
                }

                // Kiểm tra ngày áp dụng và ngày kết thúc
                if (strtotime($request->ngayapdung[$index]) > strtotime($request->ngayketthuc[$index])) {
                    return redirect()->back()->with('error', 'Ngày áp dụng phải trước ngày kết thúc.');
                }

                // Cập nhật thông tin chương trình khuyến mãi
                if (!empty($dataToValidate['tenchuongtrinhkm'])) {
                    $khuyenmai->tenchuongtrinhkm = $request->tenkhuyenmai[$index];
                }

                if (!empty($dataToValidate['mota'])) {
                    $khuyenmai->mota = $request->mota[$index];
                }

                if (!empty($dataToValidate['ngayapdung'])) {
                    $khuyenmai->ngayapdung = $request->ngayapdung[$index];
                }

                if (!empty($dataToValidate['ngayketthuc'])) {
                    $khuyenmai->ngayketthuc = $request->ngayketthuc[$index];
                }

                // Lưu các thay đổi
                $khuyenmai->save();
            }
        }

        return redirect()->back()->with('success', 'Cập nhật khuyến mãi thành công.');
    }



    public function xoaCTKhuyenMai($id)
    {
        // Tìm khuyến mãi theo ID
        $khuyenMai = ChuongTrinhKhuyenMai::findOrFail($id);

        // Xóa khuyến mãi
        $khuyenMai->delete();

        // Trả về trang trước với thông báo "Xóa thành công"
        return redirect()->route('route-cuahang-quanlycuahang-taokhuyenmai')
            ->with('success', 'Khuyến mãi đã được xóa thành công.');
    }
}
