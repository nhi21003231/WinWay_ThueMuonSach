@extends('CuaHang.layouts.index')

@section('content')
<div class="table-responsive">
    <h3 class="my-4">Doanh thu tháng {{ $month }}/{{ $year }}</h3>

    <!-- Ô chọn tháng và năm -->
    <form method="GET" action="">
        <div class="form-row align-items-end">
            <div class="form-group col-md-6">
                <label for="month">Chọn tháng:</label>
                <select name="month" id="month" class="form-control" onchange="this.form.submit()">
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ $i == $month ? 'selected' : '' }}>
                            Tháng {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="year">Chọn năm:</label>
                <select name="year" id="year" class="form-control" onchange="this.form.submit()">
                    @for ($y = 2020; $y <= date('Y'); $y++)
                        <option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>
                            Năm {{ $y }}
                        </option>
                    @endfor
                </select>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Ngày</th>
                <th>Xem Chi Tiết</th>
            </tr>
        </thead>
        <tbody>
            @php
                // Lấy số ngày trong tháng đã chọn
                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                $totalRevenue = 0; // Biến để tính tổng doanh thu
            @endphp
            @for ($day = 1; $day <= $daysInMonth; $day++)
                @php
                    $currentDate = sprintf('%04d-%02d-%02d', $year, $month, $day);
                    $doanhThu = $tongDoanhThu[$currentDate] ?? 0; // Lấy doanh thu cho ngày đó
                    $totalRevenue += $doanhThu; // Cộng doanh thu vào tổng
                @endphp
                <tr>
                    <td>{{ $currentDate }}</td>
                    <td>
                        <a href="{{ route('route-cuahang-nhanvien-thongkedoanhthu-chitietdoanhthu', ['date' => $currentDate]) }}" class="btn btn-info btn-sm">Xem Chi Tiết</a>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>

    <!-- Hàng tổng doanh thu -->
    <tfoot>
        <tr>
            <td><strong>Tổng Doanh Thu:</strong></td>
            <td><strong>{{ number_format($totalRevenue, 0, '.', ',') }} VND</strong></td>
        </tr>
    </tfoot>
</div>
@endsection