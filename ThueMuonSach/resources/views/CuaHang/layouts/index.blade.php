@extends('app')

@section('main')
    <div class="header p-3 bg-white">
        @include('CuaHang.layouts.header')
    </div>

    <div class="row g-0">
        <div class="sidebar col-3 py-2 pe-2">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-white border rounded shadow-sm">
                @include('CuaHang.layouts.sidebar')
            </div>
        </div>

        <div class="content col-9 p-3" style="background-color: rgb(234, 227, 240)">
            @yield('content')
        </div>
    </div>
@endsection
