@extends('app')

@section('main')
    <div class="row g-0">
        <div class="col-12 pb-2 pt-3">
            <div class="px-3 py-2 bg-white border rounded shadow-sm">
                @include('CuaHang.layouts.header')
            </div>
        </div>

        <div class="col-3 py-2 pe-2 mb-3">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-white border rounded shadow-sm">
                @include('CuaHang.layouts.sidebar')
            </div>
        </div>

        <div class="col-9 py-2 ps-2 mb-3">
            <div class="py-3 px-4 bg-white border rounded shadow-sm">
                @yield('content')
            </div>
        </div>
    </div>
@endsection

<!-- Modal để phóng to ảnh -->
<div class="modal fade" id="modalAnhPhongTo" tabindex="-1" aria-labelledby="modalAnhPhongToLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-body">
                <img id="imgPhongTo" src="" width="100%" style="max-height: 90vh" class="img-fluid"
                    alt="#">
            </div>
        </div>
    </div>
</div>