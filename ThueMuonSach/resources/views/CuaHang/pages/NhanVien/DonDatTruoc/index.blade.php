@extends('CuaHang.layouts.index')
@section('content')
<div class="right row">
    <form class="col-6 mb-3" action="" method="GET">
        <div class="row ps-4">
            <input type="text" class="form-control col-9 w-auto input-tk" placeholder="Tìm kiếm..."
                value="{{ old('TimKiem') }}" name="TimKiem">
            <button type="submit" class="ms-2 btn btn-primary col-3 btn-tk" value="TimKiem" disabled>Tìm kiếm</button>
        </div>
    </form>
    <form action="" method="get" class="col-6 mb-3 row justify-content-end">
        <select name="sort" id="sort" class="form-select w-50" onchange="this.form.submit()">
            <option value="">Sắp xếp theo...</option>
            <option value="moinhat">Sắp xếp theo mới nhất</option>
            <option value="cunhat">Sắp xếp theo cũ nhất</option>
        </select>
    </form>
    <div class="p-2 text-center">
        <div id="list-DTT" class="table-responsive">
            @if (!empty($hoaDons) && $hoaDons->count() > 0)
            <!-- Kiểm tra nếu có dữ liệu -->
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <td colspan="5" class="bg-primary text-white text-start opacity-75">
                                <p class="m-0 p-1 fs-5">Danh Sách Đơn Đặt Trước</p>
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
                            <td class="text-center align-middle"><button type="button" class="btn btn-warning"><a
                                        class="nav-link text-white"
                                        href="{{ URL::to('nhan-vien/don-dat-truoc/'.$item->mahoadon.'/chi-tiet') }}">Xem</a></button>
                            </td>
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
        </div>
    </div>
</div>
@endsection