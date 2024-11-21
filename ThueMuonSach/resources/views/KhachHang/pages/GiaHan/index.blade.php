@extends('KhachHang.layouts.index')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card Gia Hạn -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0 d-flex align-items-center justify-content-center">
                        <i class="fas fa-calendar-alt me-2"></i> Gia Hạn Ấn Phẩm
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Thông Tin Ấn Phẩm -->
                    <div class="mb-4">
                        <h5><i class="fas fa-book me-2 text-info"></i> Thông Tin Ấn Phẩm</h5>
                        <p><strong>Tên Ấn Phẩm:</strong> {{ $anPham->chiTietAnPham->tenanpham }}</p>
                        <p><strong>Tác Giả:</strong> {{ $anPham->chiTietAnPham->tacgia }}</p>
                        <p><strong>Năm Xuất Bản:</strong> {{ $anPham->chiTietAnPham->namxuatban }}</p>
                    </div>

                    <!-- Confirm Gia Hạn -->
                    <form action="{{ route('giahan.store', $anPham->mactanpham) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Xác Nhận Gia Hạn 15 Ngày</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection     