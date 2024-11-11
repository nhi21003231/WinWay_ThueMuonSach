<tr>
  <th colspan="5">Báo cáo số lượng</th>
</tr>
<tr>
  <th scope="col"></th>
  <th scope="col">Tên Ấn Phẩm</th>
  <th scope="col">Danh Mục</th>
  <th scope="col">Số Lượng</th>
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
      <td>{{ $anpham->danhmuc->tendanhmuc }}</td>
      <td>{{ $anpham->anpham->count() }}</td>
    </tr>
  @endforeach
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td class=" fw-bold">Tổng: {{ $count }}</td>
    </tr>
</tbody>