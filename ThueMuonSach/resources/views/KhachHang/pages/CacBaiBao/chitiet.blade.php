@extends('KhachHang.layouts.index')

@section('content')
<div class="container">
    <img src="{{ asset('img/anh-bai-bao/'.$baiBao->hinhanh.'') }}" alt="">
    <h5>{{ $baiBao->tieude }}</h5>
    <p>{{ $baiBao->noidung }}</p>
</div>
@endsection