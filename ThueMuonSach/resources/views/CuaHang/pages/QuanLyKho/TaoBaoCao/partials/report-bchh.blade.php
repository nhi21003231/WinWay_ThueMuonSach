{{-- variable --}}
@php
  $thanhly = 0 ;
  $huhong = 0;
@endphp
{{-- ================================= --}}
  <tr>
    <th colspan="5">Báo cáo hư hỏng</th>
  </tr>
  <tr>
    <th scope="col"></th>
    <th scope="col">Tên Ấn Phẩm</th>
    <th scope="col">Số Lượng</th>
    <th scope="col">Hư hỏng</th>
    <th scope="col">Đã thanh lí</th>
  </tr>
</thead>
<tbody>
  @foreach ($anphams as $anpham)
    @php
    $count += $anpham->anpham->count()
    @endphp
    <tr>
      <th scope="row">{{ $stt++ }}</th>
      <td>{{ $anpham->tenanpham }}</td>
      <td>{{ $anpham->anpham->count() }}</td>
      <td>
        {{ $anpham->anpham->filter(function($item) {
        return $item->tinhtrang == 'Hư hỏng';
        })->count() }}
      </td>
      <td>
        {{ $anpham->anpham->filter(function($item){
        return $item->dathanhly == '1';
        })->count() }}
      </td>
    </tr>
    @foreach ($anpham->anpham as $item)
      @if($item->tinhtrang == 'Hư hỏng')
        @php
          $huhong++
        @endphp
      @endif
      {{-- ============================== --}}
      @if($item->dathanhly == '1')
      @php
        $thanhly++
      @endphp
      @endif
    @endforeach
  @endforeach
  {{-- Tổng số lượng --}}
  <tr>
    <td colspan="2" class="fw-bold text-end">Tổng</td>
    <td class="fw-bold">{{ $count }}</td>
    <td class="fw-bold">{{ $huhong }}</td>
    <td class="fw-bold">{{ $thanhly }}</td>
  </tr>
</tbody>