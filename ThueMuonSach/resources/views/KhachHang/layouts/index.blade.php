@extends('app')

@section('main')
    <div class="header p-3" style="min-height: auto; background-color: #FFE0ED">
        @include('Khachhang.layouts.header')
    </div>

    {{-- <div class="content p-3" style="height: 800px; background-color: rgb(234, 227, 240)">
        @yield('content')
    </div> --}}
    <div class="content p-3" style="min-height: auto; background-color: rgb(234, 227, 240)">
        @yield('content')
    </div>
    
    <div class="footer p-3" style="min- height: auto;">
        @include('Khachhang.layouts.footer')
    </div>
@endsection
