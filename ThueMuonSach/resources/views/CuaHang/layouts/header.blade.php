<nav class="navbar navbar-expand-lg p-0">
    <div class="container-fluid p-0">

        <!-- Logo và tên website -->
        <a class="navbar-brand d-flex align-items-center" href="
            @if (auth()->user()->vaitro === 'admin')
                {{ route('route-cuahang-nhanvien') }}
            @elseif (auth()->user()->vaitro === 'quanlycuahang')
                {{ route('route-cuahang-quanlycuahang') }}
            @elseif (auth()->user()->vaitro === 'quanlykho')
                {{ route('route-cuahang-quanlykho') }}
            @elseif (auth()->user()->vaitro === 'nhanvien')
                {{ route('route-cuahang-nhanvien') }}
            @endif
        ">
            <img src="{{ URL::asset('app/logo_windway.jpg') }}" alt="Logo" width="70" height="70"
                class="d-inline-block align-text-top">
            <h3 class="ms-3 my-0">{{ config('app.name') }}</h3>
        </a>

        <!-- Phần hiển thị vai trò tài khoản -->
        <div class="d-flex align-items-center">
            <span class="me-3">
                <h5>
                    @if (auth()->user()->vaitro === 'admin')
                        {{-- Admin --}}
                        {{ auth()->user()->nhanvien->hoten }}
                    @elseif (auth()->user()->vaitro === 'quanlycuahang')
                        {{-- Quản lý cửa hàng --}}
                        {{ auth()->user()->nhanvien->hoten }}
                    @elseif (auth()->user()->vaitro === 'quanlykho')
                        {{-- Quản lý kho --}}
                        {{ auth()->user()->nhanvien->hoten }}
                    @elseif (auth()->user()->vaitro === 'nhanvien')
                        {{-- Nhân viên --}}
                        {{ auth()->user()->nhanvien->hoten }}
                    @else
                        {{-- Vai trò không xác định --}}
                    @endif
                </h5>
            </span>
        </div>

    </div>
</nav>
