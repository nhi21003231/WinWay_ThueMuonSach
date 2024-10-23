<nav class="navbar navbar-expand-lg p-0">
    <div class="container-fluid p-0">

        <!-- Logo và tên website -->
        <a class="navbar-brand d-flex align-items-center"
            href="
                    @if (Request::routeIs('route-admin*')) {{ route('route-admin') }}
                    @elseif (Request::routeIs('route-cuahang-quanlycuahang*'))
                        {{ route('route-cuahang-quanlycuahang') }}
                    @elseif (Request::routeIs('route-cuahang-quanlykho*'))
                        {{ route('route-cuahang-quanlykho') }}
                    @elseif (Request::routeIs('route-cuahang-nhanvien*'))
                        {{ route('route-cuahang-nhanvien') }} @endif
        ">
            <img src="{{ URL::asset('app/logo_windway.jpg') }}" alt="Logo" width="70" height="70"
                class="d-inline-block align-text-top">
            <h3 class="ms-3 my-0">{{ config('app.name') }}</h3>
        </a>

        <!-- Phần hiển thị vai trò tài khoản -->
        <div class="d-flex align-items-center">
            <span class="me-3">
                <h5>
                    @if (Request::routeIs('route-admin-quanlycuahang*'))
                        Admin / Nhân viên
                    @elseif (Request::routeIs('route-admin-quanlykho*'))
                        Admin / Quản lý cửa hàng
                    @elseif (Request::routeIs('route-admin-nhanvien*'))
                        Admin / Quản lý kho
                    @elseif (Request::routeIs('route-cuahang-quanlycuahang*'))
                        Quản lý cửa hàng
                    @elseif (Request::routeIs('route-cuahang-quanlykho*'))
                        Quản lý kho
                    @elseif (Request::routeIs('route-cuahang-nhanvien*'))
                        Nhân viên
                    @endif
                </h5>
            </span>
        </div>

    </div>
</nav>
