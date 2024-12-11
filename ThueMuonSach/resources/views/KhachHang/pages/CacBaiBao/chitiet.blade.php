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
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('img/anh-bai-bao/'.$baiBao->hinhanh) }}" alt="" width="100%">
        </div>
        <div class="col-md-6">
            <h1>{{ $baiBao->tieude }}</h1>
            <p>{{ $baiBao->noidung }}</p>
        </div>
    </div>
    <div class="mt-5">
        <h2 style="font-weight: 700; color: #333;">Những bài báo khác</h2>
        <div class="row g-4">
            @foreach($otherArticles as $article)
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg h-100">
                        <a href="{{ route('route-khachhang-chitietbaibao', ['mabaibao' => $article->mabaibao]) }}" class="d-block">
                            <img class="card-img-top rounded-top" src="{{ asset('img/anh-bai-bao/' . $article->hinhanh) }}" alt="{{ $article->tieude }}" style="height: 250px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-truncate" style="font-weight: bold; color: #0056b3;">
                                <a href="{{ route('route-khachhang-chitietbaibao', ['mabaibao' => $article->mabaibao]) }}" class="text-decoration-none">
                                    {{ $article->tieude }}
                                </a>
                            </h5>
                            <p class="card-text text-muted">{{ Str::limit($article->noidung, 100) }}</p>
                        </div>
                        <div class="card-footer bg-white border-0 text-center">
                            <a href="{{ route('route-khachhang-chitietbaibao', ['mabaibao' => $article->mabaibao]) }}" class="btn btn-primary btn-sm px-4">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection