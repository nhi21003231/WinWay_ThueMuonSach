{{-- Variable --}}
@php
  $tongtsthue = 0;
@endphp
  <tr>
    <th colspan="5">Báo cáo tần suất sử dụng</th>
  </tr>
  <tr>
    <th scope="col"></th>
    <th scope="col">Tên Ấn Phẩm</th>
    <th scope="col">Số lần mượn</th>
    <th scope="col"></th>
  </tr>
</thead>
<tbody>
  @foreach ($anphams as $anpham)
    <tr>
      <th scope="row">{{ $stt++ }}</th>
      <td>{{ $anpham->tenanpham }}</td>
      <td>
        {{ $anpham->anpham->sum(function($item){
          return $item->chitiethoadonthue->sum('soluongthue');
        })}}
      </td>
      @foreach ($anpham->anpham as $item)
        @foreach ($item->chitiethoadonthue as $item)
          @php
            $tongtsthue+=$item->soluongthue
          @endphp
        @endforeach
      @endforeach
    </tr>
  @endforeach
    <tr>
      <td colspan="2" class="fw-bold text-end">Tổng</td>
      <td class="fw-bold">{{ $tongtsthue }}</td>
    </tr>
</tbody>