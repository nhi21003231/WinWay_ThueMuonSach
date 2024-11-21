<?php

namespace App\Http\Controllers\KhachHang;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\DsAnPham;
use App\Models\HoaDonThueAnPham;
use App\Models\ChiTietHoaDonThue;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class GiaHanController extends Controller
{
    public function create($mactanpham)
    {
        // Retrieve the product details
        $anPham = DsAnPham::with('chiTietAnPham')->findOrFail($mactanpham);

        // Pass the data to the view
        return view('KhachHang.pages.GiaHan.index', compact('anPham'));
    }

    public function store(Request $request, $mactanpham)
    {
        // Retrieve the product details
        $anPham = DsAnPham::with('chiTietAnPham')->findOrFail($mactanpham);

        // Update the rental period
        $hoadon = HoaDonThueAnPham::whereHas('chiTietHoaDons', function($query) use ($mactanpham) {
            $query->where('maanpham', $mactanpham);
        })->first();

        if ($hoadon) {
            // Check if the rental period has already been extended
            $originalNgayTra = Carbon::parse($hoadon->ngaythue)->addDays(15);
            if ($hoadon->ngaytra != $originalNgayTra->toDateString()) {
                Log::info('Rental period has already been extended.');
                return redirect()->back()->with('error', 'Bạn chỉ có thể gia hạn một lần.');
            }

            // Extend the return date by 15 days
            $newNgayTra = Carbon::parse($hoadon->ngaytra)->addDays(15);

            $hoadon->ngaytra = $newNgayTra;
            $hoadon->save();

            Log::info('Rental period extended successfully.', ['hoadon' => $hoadon]);

            return redirect()->route('route-khachhang-trangchu')->with('success', 'Gia hạn thành công.');
        }

        Log::error('Invoice not found.', ['mactanpham' => $mactanpham]);
        return redirect()->back()->with('error', 'Không tìm thấy hoá đơn. Vui lòng thử lại.');
    }

}