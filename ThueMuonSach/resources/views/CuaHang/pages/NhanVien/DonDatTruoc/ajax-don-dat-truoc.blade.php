@if (!empty($hoaDons) && $hoaDons->count() > 0) <!-- Kiểm tra nếu có dữ liệu -->
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <td colspan="5" class="bg-primary text-white text-start opacity-75">
            <p class="m-0 p-1 fs-5">Đơn đặt trước</p>
          </td>
        </tr>
        <tr>
          <th scope="col" class="text-center"></th>
          <th scope="col" class="text-center">Tên Khách Hàng</th>
          <th scope="col" class="text-center">Tên Ấn phẩm</th>
          <th scope="col" class="text-center">Ngày Đặt</th>
          <th scope="col" class="text-center"></th>
        </tr>
      </thead>
      <tbody>
        @php
        $stt = 1;
        @endphp
        @foreach ($hoaDons as $item)
        <tr>
          <td class="text-center align-middle" scope="row">{{ $stt++ }}</td>
          <td class="text-center align-middle">{{ $item->khachHang->hoten }}</td> 
          <td class="text-center align-middle">
            @foreach ($item->chiTietHoaDons as $chitiet)
            <p class="m-0 p-1">{{ $chitiet->dsAnPham->chiTietAnPham->tenanpham }}</p>
            @endforeach
          </td>
          <td class="text-center align-middle">{{ $item->ngaythue }}</td>
          <td class="text-center align-middle"><button type="button" class="btn btn-warning"><a class="nav-link text-white"
                href="{{ URL::to('nhan-vien/don-dat-truoc/'.$item->mahoadon.'/chi-tiet') }}">Xem</a></button></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $hoaDons->appends(request()->input())->onEachSide(1)->links() }}
  </div>
@else
<div class="alert alert-info text-center fw-bold" role="alert">
  Không có đơn đặt trước nào được tìm thấy.
</div>
@endif
