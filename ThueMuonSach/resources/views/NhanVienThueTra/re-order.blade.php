<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  
  <title>WIN WAY</title>
  @vite('resources/css/app.css')
</head>
<body>
    <div class="container-fluid">
      <div class="header d-flex align-items-center">
        <ul
          class="nav justify-content-left  "
        >
          <li class="nav-item">
            <a class="nav-link active" href="#" aria-current="page"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#"></a>
          </li>
        </ul>
        
      </div>
      <div class="content">
        <div class="left pt-2">
          <div class="d-flex align-items-center justify-content-center pb-2" style="border-bottom: 1px solid #eeee">
            <img src="" alt="" class="img-thumbnail" style="height: 40px; width:40px; border-radius:50%">
            <h5 class="px-3 text-white m-0">ADMIM</h5>
          </div>
          <div class="d-flex">
            <ul class="pt-3" style="list-style: none">
              <li class="nav-item">
                <a class="nav-link active text-white" href="{{ URL::to('/re-order') }}" aria-current="page">Đơn Đặt Trước</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Đăng kí thành viên</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="right">
          <div class="pt-3 text-center text-primary">
            <h3>Đơn đặt trước</h3>
          </div>
          <div class="p-2 text-center">
            <div
              class="table-responsive"
            >
              <table
                class="table table-striped"
              >
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Khách Hàng</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Ngày Đặt</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $stt = 1;
                  @endphp
                 @foreach ($hoadon as $items)
                  <tr class="">
                    <td scope="row">{{ $stt++ }}</td>
                    <td>{{ $items->khachhang->name }}</td>
                    <td>{{ $items->anpham->name }}</td>
                    <td>{{ $items->NgayThue }}</td>
                    <td><button type="button" class="btn btn-warning"><a class="nav-link text-white" href="{{ URL::to('re-order/'.$items->id.'/detail') }}">Xem</a></button></td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              {{ $hoadon->onEachSide(1)->links() }}
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <div class="footer">

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>