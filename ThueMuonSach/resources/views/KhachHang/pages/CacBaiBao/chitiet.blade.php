@extends('KhachHang.layouts.index')

@section('content')
<div class="container">
    <h5>{{ $baiBao->tieude }}</h5>
    <p>{{ $baiBao->noidung }}</p>
</div>
@endsection