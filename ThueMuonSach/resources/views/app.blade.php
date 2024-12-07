<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Thuê Mượn Sách</title>
    {{-- Logo --}}
    <link rel="icon" type="image/jpg" href="{{ asset('app/logo_windway.jpg') }}">
    {{-- link css bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- link thư viện thông báo (Toastr.js) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    {{-- link icon font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- link css app --}}
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/cuong_dangbao.css') }}  ">
    <link rel="stylesheet" href="{{ asset('css/nhi_header.css') }}  ">
    <link rel="stylesheet" href="{{ asset('css/thanhba.css') }}  ">
    <link rel="stylesheet" href="{{ asset('css/nhi_contact.css') }}  ">
    <link rel="stylesheet" href="{{ asset('css/nhi_product.css') }}  ">
    <link rel="stylesheet" href="{{ asset('css/nhi_danhgia.css') }}  ">
    <link rel="stylesheet" href="{{ asset('css/quanlycuahang.css') }}">
    <link rel="stylesheet" href="{{ asset('css/huynh_xacthuc.css') }}  ">
    <link rel="stylesheet" href="{{ asset('css/loc-chitietanpham.css') }}  ">
    {{-- link Owl Carousel --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

</head>

@if (Request::routeIs('route-dangnhap*') || Request::routeIs('route-dangky*'))

    <body class="bg-light radiant-background">
    @else

        <body class="bg-light">
@endif

<div class="container-fluid">
    @yield('main')
</div>

{{-- link js bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

{{-- Jquery --}}
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
{{-- app js --}}
<script src="{{ asset('js/huy.js') }}"></script>
<script src="{{ asset('js/thanhba.js') }}"></script>
<script src="{{ asset('js/quanlycuahang.js') }}"></script>
<script src="{{ asset('js/loc-chitietanpham.js') }}"></script>
<script src="{{ asset('js/nhi_trangchu.js') }}"></script>

{{-- link thư viện vẽ chart --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>


{{-- link thư viện thông báo (Toastr.js) --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- Jquery --}}
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

{{-- link Owl Carousel --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

{{-- hiển thị thông báo --}}
<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}", "Thành công!", {
            positionClass: "toast-bottom-right", // Định vị trí thông báo
            timeOut: "3000", // Thời gian tự động ẩn
            closeButton: true,
            newestOnTop: false,
        });
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}", "Lỗi!", {
            positionClass: "toast-bottom-right", // Định vị trí thông báo
            timeOut: "3000", // Thời gian tự động ẩn
            closeButton: true,
            newestOnTop: false,
        });
    @endif
    @if (session('info'))
        toastr.info("{{ session('info') }}", "Thông báo!", {
            positionClass: "toast-bottom-right", // Định vị trí thông báo
            timeOut: "3000", // Thời gian tự động ẩn
            closeButton: true,
            newestOnTop: false,
        });
    @endif

    @if (session('warning'))
        toastr.warning("{{ session('warning') }}", "Cảnh báo!", {
            positionClass: "toast-bottom-right", // Định vị trí thông báo
            timeOut: "3000", // Thời gian tự động ẩn
            closeButton: true,
            newestOnTop: false,
        });
    @endif

</script>
</body>

</html>
