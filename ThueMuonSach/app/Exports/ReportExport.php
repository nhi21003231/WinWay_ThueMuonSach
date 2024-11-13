<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class ReportExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $anphams;
    protected $loaibcs;

    public function __construct($anphams, $loaibcs)
    {

        $this->anphams = $anphams;
        $this->loaibcs = $loaibcs;
        
    }
    public function view(): View
    {
        //
        return view('CuaHang.pages.QuanLyKho.TaoBaoCao.table-report',[

            'anphams' => $this->anphams,
            'loaibcs' => $this->loaibcs

        ]);
    }
}
