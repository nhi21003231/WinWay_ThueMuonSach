@extends('KhachHang.layouts.index')
@section('content')
    <div class="container">
        <h2>Lịch Sử Thuê Ấn Phẩm</h2>
        @if ($hoadons->isEmpty())
            <div class="alert alert-info" role="alert">
                Chưa có ấn phẩm nào đã thuê.
            </div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr class="align-middle text-center">
                        <th>STT</th>
                        <th>Loại đơn</th>
                        <th>Trạng thái</th>
                        <th>Ngày Thuê</th>
                        <th>Ngày Trả</th>
                        <th>Sản Phẩm</th>
                        {{-- <th>Số Lượng</th> --}}
                        <th>Tiền Thuê</th>
                        <th>Tiền Cọc</th>
                        <th>Đánh giá</th>
                        <th>Gia hạn</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $stt = 1;
                    @endphp

                    @foreach ($hoadons as $hoadon)
                        <tr class="align-middle text-center">
                            <td>{{ $stt++ }}</td>

                            <td>
                                {{ $hoadon->loaidon }}
                            </td>

                            <td>
                                {{ $hoadon->trangthai }} <br>
                            </td>

                            <td>{{ $hoadon->ngaythue }}</td>
                            <td>{{ $hoadon->ngaytra }}</td>

                            <td>
                                @foreach ($hoadon->chiTietHoaDons as $chitiet)
                                    {{ $chitiet->dsAnPham->chiTietAnPham->tenanpham ?? 'N/A' }}

                                    <br>
                                @endforeach
                            </td>


                            <td>
                                @foreach ($hoadon->chiTietHoaDons as $chitiet)
                                    {{ number_format($chitiet->dsAnPham->chiTietAnPham->giathue, 2) }} VND <br>
                                @endforeach
                            </td>

                            <td>
                                @foreach ($hoadon->chiTietHoaDons as $chitiet)
                                    {{ number_format($chitiet->dsAnPham->chiTietAnPham->giacoc, 2) }} VND <br>
                                @endforeach
                            </td>

                            <td>
                                @foreach ($hoadon->chiTietHoaDons as $chitiet)
                                    @if ($hoadon->trangthai == 'Đã trả')
                                        <a href="{{ route('danhgia.create', $chitiet->dsAnPham->mactanpham) }}"
                                            class="">
                                            Đánh giá
                                        </a><br>
                                    @endif
                                @endforeach
                            </td>

                            <td>
                                @if ($chitiet->danhgia)
                                    {{ $chitiet->danhgia }}
                                @else
                                    <a href="{{ route('giahan.create', $chitiet->dsAnPham->maanpham) }}"
                                        class="btn btn-primary btn-sm">Gia hạn</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
