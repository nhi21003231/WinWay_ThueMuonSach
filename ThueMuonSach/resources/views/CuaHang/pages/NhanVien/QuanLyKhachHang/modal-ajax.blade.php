@if (!empty($khachHang))
@foreach ($khachHang as $item)
<div class="tenkh">
  <label for="tenkh" class="form-lable ps-2 fw-bold mb-2">Tên khách hàng</label>
  <input type="text" class="form-control" name="tenkh" id="tenkh" value="{{ old('tenkh',$item->hoten) }}">
  <span class="text-danger fs-6 m-0 ps-1" id="error-tenkh"></span>
</div>
<div class="sdtkh mt-2">
  <label for="sdtkh" class="form-lable ps-2 fw-bold mb-2">Số điện thoại</label>
  <input type="text" class="form-control" name="sdtkh" id="sdtkh" value="{{ $item->dienthoai }}">
  <span class="text-danger fs-6 m-0 ps-1" id="error-sdtkh"></span>
</div>
<div class="email mt-2">
  <label for="email" class="form-lable ps-2 fw-bold mb-2">Email</label>
  <input type="email" class="form-control" name="email" id="email" value="{{ $item->email }}">
  <span class="text-danger fs-6 m-0 ps-1" id="error-email"></span>
</div>
<div class="diachi mt-2">
  <label for="diachi" class="form-lable ps-2 fw-bold mb-2">Địa chỉ</label>
  <input type="text" class="form-control" name="diachi" id="diachi" value="{{ $item->diachi }}">
  <span class="text-danger fs-6 m-0 ps-1" id="error-diachi"></span>
</div>
<div class="diachi mt-2">
  <label for="thanhvien" class="form-lable ps-2 fw-bold mb-2">Thành viên</label>
  <select name="thanhvien" id="thanhvien" class="form-select w-50 opacity-50" disabled>
    <option value="1" {{ $item->lathanhvien == '1'?'selected':'' }}>Là thành viên</option>
    <option value="0" {{ $item->lathanhvien == '0'?'selected':'' }}>Không là thành viên</option>
  </select>
</div>

@endforeach
@endif