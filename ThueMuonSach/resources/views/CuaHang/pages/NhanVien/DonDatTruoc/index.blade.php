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

    <div class="p-2">
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
                            <th scope="col" class="align-middle">Ấn Phẩm</th>
                            <th scope="col">Mã hóa đơn</th>
                            <th scope="col" class="align-middle">Khách Hàng</th>
                            <th scope="col" class="align-middle">Tổng tiền</th>
                            <th scope="col" class="align-middle">Ngày Đặt</th>
                            <th scope="col" class="align-middle">Trạng Thái</th>
                            <th scope="col" class="align-middle">Xác nhận</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hoaDons as $item)
                        <tr>
                            <td class=" align-middle">
                                <div class="d-flex justify-content-start align-items-center" style="width: 250px">
                                    <div class="img " style="height: 60px; width: 60px">
                                        <img src="{{ asset('img/anh-an-pham/'.$item->chitietanpham->hinhanh.'') }}"
                                            alt="ảnh ấn phẩm" class="img-fuild w-100 h-100"
                                            style="object-fit: contain;">
                                    </div>
                                    <div class="product ms-2">
                                        <h5 class="fs-6">{{ $item->chitietanpham->tenanpham }}</h5>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">#{{ $item->mahoadon }}</td>
                            <td class=" align-middle" style="width: 150px">{{ $item->khachHang->hoten }}</td>
                            <td class="align-middle">{{ number_format($item->chitietanpham->giacoc,0,'.',',') }}VNĐ
                            </td>
                            <td class=" align-middle">{{ \Carbon\Carbon::parse($item->ngaythanhtoan)->format('d-m-Y') }}</td>
                            <td class=" align-middle">
                                <button type="button"
                                    class="btn p-0 px-2 rounded-pill disabled
                                {{ $item->trangthai == 'Đang xử lý'? 'btn-outline-secondary': ($item->trangthai == 'Đã có sách' ? 'btn-outline-success' : 'btn-outline-primary') }}">
                                    {{ $item->trangthai }}
                                </button>
                            </td>
                            <td class="align-middle" style="width: 90px">
                                <div class="rounded-circle bg-white border border-3 d-flex justify-content-center align-items-center ms-3"
                                    style="height: 25px; width: 25px">
                                    <a class="status-accept nav-link {{ $item->trangthai === 'Đang xử lý' ? 'text-secondry' : 'pe-none text-success opacity-50' }} "
                                        role="button"
                                        data-id="{{ $item->trangthai == 'Đang xử lý' ? $item->mahoadon : ($item->mahoadon + 2003) }}"
                                        data-status="{{ $item->trangthai === 'Đang xử lý' ? '1' : ($item->mahoadon * 2003) }}">
                                        <i class="fa-solid fa-check fs-6"></i>
                                    </a>
                                </div>
                            </td>
                            <td class=" align-middle comfirm-re-order">
                                <div class="d-flex align-items-center">
                                    <a href="{{ URL::to('nhan-vien/don-dat-truoc/'.$item->mahoadon.'/chi-tiet') }}"
                                        class="me-3">
                                        <i class="fa-regular fa-eye text-warning fs-6"></i>
                                    </a>
                                    @if ($item->trangthai == 'Đã có sách')
                                    <div class="quickly-order" role="button" data-id="{{ $item->mahoadon }}">
                                        <i class="fa-solid fa-truck-fast text-danger fs-6"></i>
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $hoaDons->onEachSide(1)->links() }}
                {{--
            </div> --}}
            @else
            <div class="alert alert-info  fw-bold" role="alert">
                Không có đơn đặt trước nào được tìm thấy.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection