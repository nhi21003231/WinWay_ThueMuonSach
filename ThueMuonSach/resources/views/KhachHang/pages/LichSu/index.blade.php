@extends('KhachHang.layouts.index')
@section('content')
<div class="container">
    <h2>Lịch Sử Thuê Ấn Phẩm</h2>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if($hoadons->isEmpty())
        <div class="alert alert-info" role="alert">
            Chưa có ấn phẩm nào đã thuê.
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Ngày Thuê</th>
                    <th>Ngày Trả</th>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Tiền Thuê</th>
                    <th>Tiền Cọc</th>
                    <th>Tổng Cộng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hoadons as $hoadon)
                    @foreach($hoadon->chiTietHoaDons as $chitiet)
                        <tr>
                            <td>{{ $hoadon->ngaythue }}</td>
                            <td>{{ $hoadon->ngaytra }}</td>
                            <td>{{ $chitiet->dsAnPham->chiTietAnPham->tenanpham ?? 'N/A' }}</td>
                            <td>{{ $chitiet->soluongthue }}</td>
                            <td>{{ number_format($chitiet->tienthue, 2) }} VND</td>
                            <td>{{ number_format($chitiet->tiencoc, 2) }} VND</td>
                            <td>{{ number_format($chitiet->tienthue + $chitiet->tiencoc, 2) }} VND</td>
                            <td>
                                @if($chitiet->danhgia)
                                    {{ $chitiet->danhgia }}
                                @else
                                    <a href="{{ route('danhgia.create', $chitiet->dsAnPham->mactanpham) }}" class="btn btn-primary btn-sm">Đánh giá</a>
                                    <a href="{{ route('giahan.create', $chitiet->dsAnPham->mactanpham) }}" class="btn btn-primary btn-sm">Gia hạn</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection