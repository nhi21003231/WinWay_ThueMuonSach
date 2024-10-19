@extends('CuaHang.layouts.index')
@section('content')
  <div class="right">
    <div class="pt-3 text-center text-primary">
      <h3>Đơn đặt trước</h3>
    </div>
    <div class="p-2 text-center">
      <div
        class="table-responsive"
      >
        <table
          class="table table-striped"
        >
          <thead>
            <tr>
              <th scope="col">STT</th>
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
          @foreach ($hoadon as $items)
            <tr class="">
              <td scope="row">{{ $stt++ }}</td>
              <td>{{ $items->khachhang->name }}</td>
              <td>{{ $items->anpham->name }}</td>
              <td>{{ $items->NgayThue }}</td>
              <td><button type="button" class="btn btn-warning"><a class="nav-link text-white" href="{{ URL::to('re-order/'.$items->id.'/detail') }}">Xem</a></button></td>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{ $hoadon->onEachSide(1)->links() }}
      </div>
      
    </div>
  </div>
@endsection