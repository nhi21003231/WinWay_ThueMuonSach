@extends('KhachHang.layouts.index')
@section('content')
<div class="container">
    <h2>Đánh giá ấn phẩm: {{ $anpham->chiTietAnPham->tenanpham ?? 'N/A' }}</h2>
    <form action="{{ route('danhgia.store') }}" method="POST">
        @csrf
        <input type="hidden" name="maanpham" value="{{ $anpham->maanpham }}">
        <div class="form-group">
            <label for="danhgia">Đánh giá</label>
            <textarea class="form-control" id="danhgia" name="danhgia" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="sosao">Số sao</label>
            <div class="rating">
                <input type="radio" name="sosao" id="star5" value="5"><label for="star5">☆</label>
                <input type="radio" name="sosao" id="star4" value="4"><label for="star4">☆</label>
                <input type="radio" name="sosao" id="star3" value="3"><label for="star3">☆</label>
                <input type="radio" name="sosao" id="star2" value="2"><label for="star2">☆</label>
                <input type="radio" name="sosao" id="star1" value="1"><label for="star1">☆</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.rating input');
        stars.forEach(star => {
            star.addEventListener('change', function() {
                const ratingValue = this.value;
                stars.forEach(s => {
                    if (s.value <= ratingValue) {
                        s.nextElementSibling.style.color = '#f5b301';
                    } else {
                        s.nextElementSibling.style.color = '#ddd';
                    }
                });
            });
        });
    });
</script>
@endsection