<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\KhachHang;

class CustomerExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        //
        return view('CuaHang.pages.NhanVien.QuanLyKhachHang.table-customer',[
            
            'customers' => KhachHang::all()
        ]);
    }

}
