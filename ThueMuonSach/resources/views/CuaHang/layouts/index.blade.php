@extends('app')

@section('mail')
    <div class="header p-3" style="height: 400px; background-color: rgb(210, 163, 255)">
        @include('CuaHang.layouts.header')
    </div>

    <div class="container-fluid">
        <div class="row" style="height: 300px">
            <div class="sidebar col-3 p-3" style="background-color: rgb(161, 161, 161)">
                @include('CuaHang.layouts.sidebar')
            </div>

            <div class="content col-9 p-3" style="background-color: rgb(234, 227, 240)">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
