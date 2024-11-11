{{-- Không có dữ liệu --}}
@if ($anphams->count() <= 0) <div class="alert alert-info text-center fw-bold mt-3" role="alert">
  Không có dữ liệu
  </div>
  @endif
  {{-- Variable php --}}
  @php
  $count = 0;
  $stt = 1;
  @endphp
  {{-- =================================================================================== --}}
@if ($anphams->count() > 0)
  <table class="table table-bordered mt-3 table-responsive border border-2 table-report">
    <thead>
      <tr>
        <td colspan="{{ $loaibcs == 'BCSL' ?'4':'5' }}" class="m-0 p-3">
          <p class="fw-bold fs-4">Cửa hàng cho thuê mượn sách WinWay</p>
          <p class="">123 Nguyễn Văn Bảo, phường 4, Gò Vấp, tp.HCM</p>
        </td>
      </tr>
      <tr>
        <td colspan="{{ $loaibcs == 'BCSL' ?'4':'5' }}" class="p-2">
          <div class="text-end pe-2">
            <p class="fw-bold m-0">Ngày lập: {{\Carbon\Carbon::parse()->format('Y-m-d') }}</p>
            <p class="fw-bold m-0">Người lập: NV.{{ Auth::user()->tentaikhoan }} - {{ Auth::user()->nhanvien->hoten }}
            </p>
          </div>
        </td>
      </tr>
      {{-- Báo Cáo Số lượng --}}
      @if ($loaibcs == 'BCSL')
        @include('CuaHang.pages.QuanLyKho.TaoBaoCao.partials.report-bcsl',['anphams' => $anphams, 'stt' => $stt, 'count' => $count])
      {{-- Báo cáo hư hỏng --}}
      @elseif ($loaibcs == 'BCHH')
        @include('CuaHang.pages.QuanLyKho.TaoBaoCao.partials.report-bchh',['anphams' => $anphams, 'stt' => $stt, 'count' => $count])
      @elseif ($loaibcs == 'BCTSSD')
        @include('CuaHang.pages.QuanLyKho.TaoBaoCao.partials.report-bctssd',['anphams' => $anphams, 'stt' => $stt, 'count' => $count])
      @endif
  </table>
@endif