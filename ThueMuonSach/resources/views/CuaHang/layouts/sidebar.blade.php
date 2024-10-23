@php
    $isAdmin = request()->is('admin*');
@endphp

@if ($isAdmin)
    <div class="dropend w-100">
        <button class="btn fs-4 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            @if (Request::routeIs('route-admin-quanlycuahang*'))
                Quản lý cửa hàng
            @elseif (Request::routeIs('route-admin-quanlykho*'))
                Quản lý kho
            @elseif (Request::routeIs('route-admin-nhanvien*'))
                Nhân viên
            @endif
        </button>
        <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="{{ route('route-admin-nhanvien') }}">Nhân viên</a></li>
            <li><a class="dropdown-item" href="{{ route('route-admin-quanlykho') }}">Quản lý kho</a></li>
            <li><a class="dropdown-item" href="{{ route('route-admin-quanlycuahang') }}">Quản lý cửa hàng</a></li>
        </ul>
    </div>
@endif

@if (Request::routeIs('route-cuahang-quanlycuahang*') || Request::routeIs('route-admin-quanlycuahang*'))
    @if (!$isAdmin)
        <a href="{{ route('route-cuahang-quanlycuahang') }}"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-4">Quản lý cửa hàng</span>
        </a>
    @endif
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ $isAdmin ? route('route-admin-quanlycuahang-quanlynhanvien') : route('route-cuahang-quanlycuahang-quanlynhanvien') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-quanlynhanvien*') || Request::routeIs('route-admin-quanlycuahang-quanlynhanvien*') ? 'active' : 'link-dark' }}">
                Quản lý nhân viên
            </a>
        </li>
        <li>
            <a href="{{ $isAdmin ? route('route-admin-quanlycuahang-xembaibao') : route('route-cuahang-quanlycuahang-xembaibao') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-xembaibao*') || Request::routeIs('route-admin-quanlycuahang-xembaibao*') ? 'active' : 'link-dark' }}">
                Xem bài báo
            </a>
        </li>
        <li>
            <a href="{{ $isAdmin ? route('route-admin-quanlycuahang-chamcong') : route('route-cuahang-quanlycuahang-chamcong') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-chamcong*') || Request::routeIs('route-admin-quanlycuahang-chamcong*') ? 'active' : 'link-dark' }}">
                Chấm công
            </a>
        </li>
        <li>
            <a href="{{ $isAdmin ? route('route-admin-quanlycuahang-dinhgiaanpham') : route('route-cuahang-quanlycuahang-dinhgiaanpham') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-dinhgiaanpham*') || Request::routeIs('route-admin-quanlycuahang-dinhgiaanpham*') ? 'active' : 'link-dark' }}">
                Định giá ấn phẩm
            </a>
        </li>
        <li>
            <a href="{{ $isAdmin ? route('route-admin-quanlycuahang-taokhuyenmai') : route('route-cuahang-quanlycuahang-taokhuyenmai') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-taokhuyenmai*') || Request::routeIs('route-admin-quanlycuahang-taokhuyenmai*') ? 'active' : 'link-dark' }}">
                Tạo khuyến mãi
            </a>
        </li>
        <li>
            <a href="{{ $isAdmin ? route('route-admin-quanlycuahang-quanlydanhgia') : route('route-cuahang-quanlycuahang-quanlydanhgia') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-quanlydanhgia*') || Request::routeIs('route-admin-quanlycuahang-quanlydanhgia*') ? 'active' : 'link-dark' }}">
                Quản lý đánh giá
            </a>
        </li>
    </ul>
@elseif (Request::routeIs('route-cuahang-quanlykho*') || Request::routeIs('route-admin-quanlykho*'))
    @if (!$isAdmin)
        <a href="{{ route('route-cuahang-quanlykho') }}"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-4">Quản lý kho</span>
        </a>
    @endif
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ $isAdmin ? route('route-admin-quanlykho-quanlyanpham') : route('route-cuahang-quanlykho-quanlyanpham') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlykho-quanlyanpham*') || Request::routeIs('route-admin-quanlykho-quanlyanpham*') ? 'active' : 'link-dark' }}">
                Quản lý ấn phẩm
            </a>
        </li>
        <li>
            <a href="{{ $isAdmin ? route('route-admin-quanlykho-quanlydanhmuc') : route('route-cuahang-quanlykho-quanlydanhmuc') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlykho-quanlydanhmuc*') || Request::routeIs('route-admin-quanlykho-quanlydanhmuc*') ? 'active' : 'link-dark' }}">
                Quản lý danh mục
            </a>
        </li>
        <li>
            <a href="{{ $isAdmin ? route('route-admin-quanlykho-taobaocao') : route('route-cuahang-quanlykho-taobaocao') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlykho-taobaocao*') || Request::routeIs('route-admin-quanlykho-taobaocao*') ? 'active' : 'link-dark' }}">
                Tạo báo cáo
            </a>
        </li>
    </ul>
@elseif (Request::routeIs('route-cuahang-nhanvien*') || Request::routeIs('route-admin-nhanvien*'))
    @if (!$isAdmin)
        <a href="{{ route('route-cuahang-nhanvien-quanlyanpham') }}"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-4">Nhân viên</span>
        </a>
    @endif
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ $isAdmin ? route('route-admin-nhanvien-quanlyanpham') : route('route-cuahang-nhanvien-quanlyanpham') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-nhanvien-quanlyanpham*') || Request::routeIs('route-admin-nhanvien-quanlyanpham') ? 'active' : 'link-dark' }}">
                Quản lý ấn phẩm
            </a>
        </li>
        <li>
            <a href="{{ $isAdmin ? route('route-admin-nhanvien-quanlykhachhang') : route('route-cuahang-nhanvien-quanlykhachhang') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-nhanvien-quanlykhachhang*') || Request::routeIs('route-admin-nhanvien-quanlykhachhang') ? 'active' : 'link-dark' }}">
                Quản lý khách hàng
            </a>
        </li>
        <li>
            <a href="{{ $isAdmin ? route('route-admin-nhanvien-dangkythanhvien') : route('route-cuahang-nhanvien-dangkythanhvien') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-nhanvien-dangkythanhvien*') || Request::routeIs('route-admin-nhanvien-dangkythanhvien') ? 'active' : 'link-dark' }}">
                Đăng ký thành viên
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ $isAdmin ? route('route-admin-nhanvien-dangbaibao') : route('route-cuahang-nhanvien-dangbaibao') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-nhanvien-dangbaibao*') || Request::routeIs('route-admin-nhanvien-dangbaibao') ? 'active' : 'link-dark' }}">
                Đăng bài báo
            </a>
        </li>
        <li>
            <a href="{{ $isAdmin ? route('route-admin-nhanvien-dondactruoc') : route('route-cuahang-nhanvien-dondactruoc') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-nhanvien-dondactruoc*') || Request::routeIs('route-admin-nhanvien-dondactruoc') ? 'active' : 'link-dark' }}">
                Đơn đặc trước
            </a>
        </li>
        <li>
            <a href="{{ $isAdmin ? route('route-admin-nhanvien-thongkedoanhthu') : route('route-cuahang-nhanvien-thongkedoanhthu') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-nhanvien-thongkedoanhthu*') || Request::routeIs('route-admin-nhanvien-thongkedoanhthu') ? 'active' : 'link-dark' }}">
                Thống kê doanh thu
            </a>
        </li>
    </ul>
@endif

<hr>
<a href="{{ route('route-dangxuat') }}" class="nav-link">
    <h5>Đăng xuất</h5>
</a>
