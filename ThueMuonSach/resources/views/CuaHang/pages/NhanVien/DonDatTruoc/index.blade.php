@extends('CuaHang.layouts.index')
@section('content')
<div class="right row">
    <form class="col-6 mb-3" action="" method="GET">
        <div class="row ps-4">
            <input type="text" class="form-control col-9 w-auto" placeholder="Tìm kiếm..." value="" name="TimKiem" id="timkiem-ddt">
            <button type="submit" class="ms-2 btn btn-primary col-3" value="TimKiem" disabled id="btn-tkddt">Tìm kiếm</button>
        </div>
    </form>
    <div class="col-6 mb-3 d-flex justify-content-end">
        <select name="sapxepDDT" id="sapxepDTT" class="form-select w-50 ">
            <option value="">Sắp xếp theo...</option>
            <option value="moinhat" {{ request('search') == 'moinhat' ? 'selected' : '' }}>Sắp xếp theo mới nhất</option>
            <option value="cunhat" {{ request('search') == 'cunhat' ? 'selected' : '' }}>Sắp xếp theo cũ nhất</option>
        </select>
    </div>
    <div class="p-2 text-center">
        <div id="list-DTT" class="table-responsive">
            @include('CuaHang.pages.NhanVien.DonDatTruoc.ajax-don-dat-truoc') <!-- Mặc định hiển thị dữ liệu ban đầu -->
        </div>
    </div>
</div>
@endsection
