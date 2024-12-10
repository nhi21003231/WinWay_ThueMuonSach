@extends('CuaHang.layouts.index')
@section('content')
<div class="right row">
    <form class="col-6 mb-1" action="" method="GET">
        <div class="row ps-4 p-0">
            <input type="text" class="form-control col-9 w-auto input-tk" placeholder="Tìm kiếm..."
                value="{{ old('TimKiem') }}" name="TimKiem">
            <button type="submit" class="ms-2 btn btn-primary col-3 btn-tk" value="TimKiem" disabled>Tìm kiếm</button>
        </div>
    </form>
    <form action="" method="get" class="col-6 mb-1 row justify-content-end p-0">
        <select name="sort" id="sort" class="form-select w-50" onchange="this.form.submit()">
            <option value="">Sắp xếp theo...</option>
            <option value="moinhat">Sắp xếp theo mới nhất</option>
            <option value="cunhat">Sắp xếp theo cũ nhất</option>
        </select>
    </form>
    
    <div class="p-2 text-center">
        <div class="row mb-3 bg-primary opacity-75 bg-gradient align-items-center p-0 text-start" style="height: 60px">
            <div class="col-12">
                <p class="text-white m-0 fs-5 fw-bold p-1">Danh sách đơn đặt trước</p>
            </div>
        </div>
        <div id="list-DTT" class="table-responsive pb-1">
            @if (!empty($hoaDons) && $hoaDons->count() > 0)
            <!-- Kiểm tra nếu có dữ liệu -->
            {{-- <div class="table-responsive"> --}}
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center"></th>
                            <th scope="col" class="text-center">Tên Khách Hàng</th>
                            <th scope="col" class="text-center">Tên Ấn Phẩm</th>
                            <th scope="col" class="text-center">Ngày Đặt</th>
                            <th scope="col" class="text-center">Trạng Thái</th>
                            <th scope="col"></th>
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
                                {{ $item->chitietanpham->tenanpham }}
                            </td>
                            <td class="text-center align-middle">{{ \Carbon\Carbon::parse($item->ngaythue)->format('d-m-Y') }}</td>
                            <td class="text-center align-middle">
                                <button type="button" 
                                class="btn p-0 px-2 rounded-pill disabled
                                {{ $item->trangthai == 'Đang xử lý'? 'btn-secondary':'btn-primary' }}">
                                {{ $item->trangthai }}
                                </button>
                            </td>
                            <td class="text-center align-middle comfirm-re-order">
                                <button type="button" 
                                    class="btn status-accept border border-none p-0 px-1 text-center " 
                                    {{ $item->trangthai != 'Đang xử lý'?'disabled':'' }}
                                    data-id="{{ $item->trangthai === 'Đang xử lý'?$item->mahoadon:2003+$item->mahoadon }}"
                                    data-status="{{ $item->trangthai === 'Đang xử lý'?'1':2003*$item->mahoadon }}"
                                    >
                                    <i class="fa-solid fa-check fs-6 {{ $item->trangthai === 'Đang xử lý'?'':'pe-none text-success' }}"></i>
                                </button>
                            </td>
                            <td class="text-center align-middle"><button type="button" class="btn btn-warning"><a
                                        class="nav-link text-white"
                                        href="{{ URL::to('nhan-vien/don-dat-truoc/'.$item->mahoadon.'/chi-tiet') }}">Xem</a></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $hoaDons->onEachSide(1)->links() }}
            {{-- </div> --}}
            @else
            <div class="alert alert-info text-center fw-bold" role="alert">
                Không có đơn đặt trước nào được tìm thấy.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection