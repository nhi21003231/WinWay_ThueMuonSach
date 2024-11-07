<?php

namespace App\Http\Controllers\QuanLyKho;

use App\Http\Controllers\Controller;
use App\Models\ChiTietAnPham;
use App\Models\DanhMuc;
use App\Models\DsAnPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class QuanLyTonKhoController extends Controller
{

    public function hienThiQuanLyAnPham()
    {
        // Lấy danh sách ấn phẩm cùng với thông tin chi tiết ấn phẩm và danh mục liên quan
        $anPhams = DsAnPham::with(['chiTietAnPham', 'chiTietAnPham.danhMuc'])
            ->where('dathanhly', false)
            ->get();

        return view('CuaHang.pages.QuanLyKho.QuanLyTonKho.index', compact('anPhams'));
    }


    // Nhập ấn phẩm mới 
    public function hienThiNhapAnPhamMoi()
    {
        $dsDanhMuc = DanhMuc::all();
        return view('CuaHang.pages.QuanLyKho.QuanLyTonKho.nhap-an-pham-moi', compact('dsDanhMuc'));
    }

    public function xuLyNhapAnPhamMoi(Request $request)
    {
        //  Kiểm tra hợp lệ dữ liệu
        $request->validate([
            'tenanpham' => 'required|string|max:100',
            'vitri' => 'required|string|max:100',
            'soluong' => 'required|integer|min:1',
            'tacgia' => 'nullable|string|max:100',
            'namxuatban' => 'nullable|integer|between:1800,' . date('Y'),
            'tinhtrang' => 'required|string|in:Mới,Cũ,Hư hỏng',
            'madanhmuc' => 'required|exists:danhmuc,madanhmuc',
            'fileanh' => 'required|image|max:2048'
        ], [
            'tenanpham.required' => 'Vui lòng nhập tên ấn phẩm.',
            'tenanpham.string' => 'Tên ấn phẩm phải là một chuỗi văn bản.',
            'tenanpham.max' => 'Tên ấn phẩm không được vượt quá 100 ký tự.',

            'vitri.required' => 'Vui lòng nhập vị trí của ấn phẩm.',
            'vitri.string' => 'Vị trí phải là một chuỗi văn bản.',
            'vitri.max' => 'Vị trí không được vượt quá 100 ký tự.',

            'soluong.required' => 'Vui lòng nhập số lượng.',
            'soluong.integer' => 'Số lượng phải là một số nguyên.',
            'soluong.min' => 'Số lượng phải ít nhất là 1.',

            'tacgia.string' => 'Tên tác giả phải là một chuỗi văn bản.',
            'tacgia.max' => 'Tên tác giả không được vượt quá 100 ký tự.',

            'namxuatban.integer' => 'Năm xuất bản phải là một số.',
            'namxuatban.between' => 'Năm xuất bản phải nằm trong khoảng từ 1800 đến năm hiện tại.',

            'tinhtrang.required' => 'Vui lòng chọn tình trạng.',
            'tinhtrang.string' => 'Tình trạng phải là một chuỗi văn bản.',
            'tinhtrang.in' => 'Tình trạng phải là một trong các giá trị: Mới, Cũ, Hư hỏng.',

            'madanhmuc.required' => 'Vui lòng chọn danh mục.',
            'madanhmuc.exists' => 'Danh mục không tồn tại.',

            'fileanh.required' => 'Vui lòng chọn một ảnh.',
            'fileanh.image' => 'File phải là định dạng ảnh.',
            'fileanh.max' => 'Dung lượng ảnh không được vượt quá 2MB.'
        ]);


        try {
            // Lấy file và tạo tên mới
            $file = $request->file('fileanh');
            $extension = $file->getClientOriginalExtension();
            $newFileName = Str::slug($request->input('tenanpham'), '_') . '_' . time() . '.' . $extension;

            // Lưu file ảnh với tên mới
            $destinationPath = public_path('img/anh-an-pham');
            $file->move($destinationPath, $newFileName);

            // Tạo bản ghi trong bảng chitietanpham
            $chiTietAnPham = ChiTietAnPham::create([
                'tenanpham' => $request->input('tenanpham'),
                'tacgia' => $request->input('tacgia'),
                'namxuatban' => $request->input('namxuatban'),
                'hinhanh' => $newFileName,
                'madanhmuc' => $request->input('madanhmuc')
            ]);

            // Tạo bản ghi trong bảng ds_anpham theo số lượng
            for ($i = 0; $i < $request->input('soluong'); $i++) {
                DsAnPham::create([
                    'mactanpham' => $chiTietAnPham->mactanpham,
                    'tinhtrang' => $request->input('tinhtrang'),
                    'vitri' => $request->input('vitri')
                ]);
            }
            return redirect()->route('route-cuahang-quanlykho-quanlytonkho')
                ->with('success', 'Nhập ấn phẩm mới thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi nhập ấn phẩm!');
        }
    }


    // Nhập ấn phẩm đã có
    public function hienThiNhapAnPhamDaCo()
    {
        $dsCTAnPham = ChiTietAnPham::all();
        return view('CuaHang.pages.QuanLyKho.QuanLyTonKho.nhap-an-pham-da-co', compact('dsCTAnPham'));
    }

    public function xuLyNhapAnPhamDaCo(Request $request)
    {
        $rules = [];
        $messages = [];

        foreach ($request->input('soluong') as $index => $soluong) {
            if ($soluong > 0) {
                // Thêm các quy tắc cho các dòng có số lượng lớn hơn 0
                $rules["vitri.$index"] = 'required|string|max:100';
                $rules["tinhtrang.$index"] = 'required|in:Mới,Cũ,Hư hỏng';

                // Tùy chỉnh thông báo lỗi cho từng dòng
                $messages["vitri.$index.required"] = "Vui lòng nhập vị trí.";
                $messages["tinhtrang.$index.required"] = "Vui lòng chọn tình trạng.";
                $messages["tinhtrang.$index.in"] = "Tình trạng phải là một trong các giá trị: Mới, Cũ, Hư hỏng.";
            }

            // Quy tắc chung cho tất cả các trường số lượng
            $rules["soluong.$index"] = 'integer|min:0';
            $messages["soluong.$index.integer"] = "Số lượng phải là số nguyên.";
            $messages["soluong.$index.min"] = "Số lượng không được nhỏ hơn 0.";
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $countInserted = 0; // Biến đếm số lượng ấn phẩm được nhập thành công

            foreach ($request->input('ctanpham_ids') as $index => $ctanphamId) {
                $soluong = $request->input("soluong.$index");

                // Chỉ xử lý các bản ghi có số lượng lớn hơn 0
                if ($soluong > 0) {
                    for ($i = 0; $i < $soluong; $i++) {
                        DsAnPham::create([
                            'mactanpham' => $ctanphamId,
                            'vitri' => $request->input("vitri.$index"),
                            'tinhtrang' => $request->input("tinhtrang.$index")
                        ]);
                        $countInserted++;
                    }
                }
            }

            if ($countInserted > 0) {
                return redirect()->route('route-cuahang-quanlykho-quanlytonkho')->with('success', 'Nhập ấn phẩm đã có thành công!');
            } else {
                return redirect()->back()->with('info', 'Không có ấn phẩm nào được nhập.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi nhập ấn phẩm!');
        }
    }




    // Thanh lý ấn phẩm
    public function hienThiThanhLyAnPham()
    {
        $anPhams = DsAnPham::with(['chiTietAnPham', 'chiTietAnPham.danhMuc'])
            ->where('dathanhly', false)
            ->where('dathue', false)
            ->get();

        return view('CuaHang.pages.QuanLyKho.QuanLyTonKho.thanh-ly-an-pham', compact('anPhams'));
    }

    public function xuLyThanhLyAnPham(Request $request)
    {
        // Nhận danh sách ID của các ấn phẩm cần thanh lý từ yêu cầu POST
        $anPhamIds = $request->input('anpham_ids', []);

        // Kiểm tra nếu không có ấn phẩm nào được chọn để thanh lý
        if (empty($anPhamIds)) {
            return redirect()->back()->with('info', 'Không có ấn phẩm nào được thanh lý.');
        }

        try {
            // Cập nhật thuộc tính 'dathanhly' cho các ấn phẩm được chọn
            DsAnPham::whereIn('maanpham', $anPhamIds)->update(['dathanhly' => true]);

            // Trả về thông báo thành công
            return redirect()->route('route-cuahang-quanlykho-quanlytonkho')->with('success', 'Thanh lý ấn phẩm thành công.');
        } catch (\Exception $e) {
            // Trả về thông báo lỗi nếu có vấn đề trong quá trình xử lý
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thanh lý ấn phẩm. Vui lòng thử lại sau.');
        }
    }



    // Cập nhật tình trạng ấn phẩm
    public function hienThiCapNhatTinhTrang()
    {
        $anPhams = DsAnPham::with(['chiTietAnPham', 'chiTietAnPham.danhMuc'])
            ->where('dathanhly', false)
            ->where('dathue', false)
            ->get();

        return view('CuaHang.pages.QuanLyKho.QuanLyTonKho.cap-nhat-tinh-trang', compact('anPhams'));
    }

    public function xuLyCapNhatTinhTrang(Request $request)
    {
        $anPhamIds = $request->input('anpham_ids');
        $tinhTrangs = $request->input('tinh_trang');

        try {
            foreach ($anPhamIds as $id) {
                if (isset($tinhTrangs[$id])) {
                    $anPham = DsAnPham::find($id);
                    if ($anPham) {
                        $anPham->tinhtrang = $tinhTrangs[$id];
                        $anPham->save();
                    }
                }
            }

            return redirect()->route('route-cuahang-quanlykho-quanlytonkho')
                ->with('success', 'Cập nhật tình trạng ấn phẩm thành công.');
        } catch (\Exception $e) {
            return redirect()->route('route-cuahang-quanlykho-quanlytonkho')
                ->with('error', 'Đã xảy ra lỗi khi cập nhật tình trạng ấn phẩm!');
        }
    }
}
