@extends('app')

@section('main')
    <div class="header p-3" style="height: 90px; background-color: rgb(210, 163, 255)">
        @include('Khachhang.layouts.header')
    </div>

    <div class="content p-3" style="height: 1500px; background-color: rgb(234, 227, 240)">
        @yield('content')
    </div>

    <div class="footer p-3" style="height: 300px; background-color: rgb(161, 161, 161)">
        @include('Khachhang.layouts.footer')
    </div>
@endsection
