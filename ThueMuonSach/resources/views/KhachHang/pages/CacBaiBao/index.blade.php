<style>
    .card:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease-in-out;
}

.card-title a:hover {
    color: #ff5722;
    text-decoration: underline;
}

.card-footer a {
    border-radius: 20px;
    transition: background-color 0.3s;
}

.card-footer a:hover {
    background-color: #003d66;
}

</style>

@extends('KhachHang.layouts.index')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5" style="font-weight: 700; color: #333;">Những bài báo và tin tức nổi bật</h1>
    <div class="row g-4">
        @foreach($cacbaibao as $baiBao)
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-lg h-100">
                    <a href="{{ route('route-khachhang-chitietbaibao', ['mabaibao' => $baiBao->mabaibao]) }}" class="d-block">
                        <img class="card-img-top rounded-top" src="{{ asset('img/anh-bai-bao/' . $baiBao->hinhanh) }}" alt="{{ $baiBao->tieude }}" style="height: 250px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title text-truncate" style="font-weight: bold; color: #0056b3;">
                            <a href="{{ route('route-khachhang-chitietbaibao', ['mabaibao' => $baiBao->mabaibao]) }}" class="text-decoration-none">
                                {{ $baiBao->tieude }}
                            </a>
                        </h5>
                        <p class="card-text text-muted">{{ Str::limit($baiBao->content, 100) }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 text-center">
                        <a href="{{ route('route-khachhang-chitietbaibao', ['mabaibao' => $baiBao->mabaibao]) }}" class="btn btn-primary btn-sm px-4">Đọc thêm</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
