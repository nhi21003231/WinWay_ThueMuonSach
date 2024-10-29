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
          <th scope="col"></th>
          <th scope="col">Tên Khách Hàng</th>
          <th scope="col">Tên Sản Phẩm</th>
          <th scope="col">Ngày Đặt</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @php
        $stt = 1;
        @endphp
        @foreach ($hoaDons as $items)
        <tr>
          <td class="align-middle" scope="row">{{ $stt++ }}</td>
          <td class="align-middle">{{ $items->khachHang->hoten }}</td>
          <td class="align-middle">
            @foreach ($items->chiTietHoaDons as $chitiet)
            <p>{{ $chitiet->dsAnPham->chiTietAnPhams->tenanpham }}</p>
            @endforeach
          </td>
          <td class="align-middle">{{ $items->ngaythue }}</td>
          <td class="align-middle"><button type="button" class="btn btn-warning"><a class="nav-link text-white"
                href="{{ URL::to('nhan-vien/don-dat-truoc/'.$items->mahoadon.'/chi-tiet') }}">Xem</a></button></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $hoaDons->appends(request()->input())->onEachSide(1)->links() }}
  </div>
@else
<div class="alert alert-info text-center" role="alert">
  Không có đơn đặt trước nào được tìm thấy.
</div>
@endif
