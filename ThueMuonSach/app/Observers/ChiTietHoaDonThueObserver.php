<?php

namespace App\Observers;

use App\Models\ChiTietHoaDonThue;
use App\Models\HoaDonThueAnPham;

class ChiTietHoaDonThueObserver
{
    /**
     * Xử lý sau khi chi tiết hóa đơn được tạo.
     */
    public function created(ChiTietHoaDonThue $chiTiet)
    {
        $this->updateSoLuongThue($chiTiet->mahoadon);
        $this->updateThanhTien($chiTiet->mahoadon);
    }

    /**
     * Xử lý sau khi chi tiết hóa đơn bị xóa.
     */
    public function deleted(ChiTietHoaDonThue $chiTiet)
    {
        $this->updateSoLuongThue($chiTiet->mahoadon);
        $this->updateThanhTien($chiTiet->mahoadon);
    }

    /**
     * Hàm cập nhật soluongthue trong bảng hoadonthueanpham.
     */
    private function updateSoLuongThue($mahoadon)
    {
        $soLuong = ChiTietHoaDonThue::where('mahoadon', $mahoadon)->count();
        HoaDonThueAnPham::where('mahoadon', $mahoadon)->update(['soluongthue' => $soLuong]);
    }

    /**
     * Hàm tính và cập nhật thanhtien trong bảng hoadonthueanpham.
     */
    private function updateThanhTien($mahoadon)
    {
        // Lấy tổng tiền đặt cọc (giacoc) của tất cả sản phẩm trong hóa đơn
        $tongGiaCoc = ChiTietHoaDonThue::where('mahoadon', $mahoadon)
            ->join('ds_anpham', 'chitiethoadonthue.maanpham', '=', 'ds_anpham.maanpham')
            ->join('chitietanpham', 'ds_anpham.mactanpham', '=', 'chitietanpham.mactanpham')
            ->sum('chitietanpham.giacoc');

        // Lấy phí trễ hạn
        $hoaDon = HoaDonThueAnPham::find($mahoadon);
        $phiTraCham = $hoaDon->phitracham;

        // Cập nhật thanhtien = giacoc + phitracham
        $hoaDon->update(['thanhtien' => $tongGiaCoc + $phiTraCham]);
    }
}
