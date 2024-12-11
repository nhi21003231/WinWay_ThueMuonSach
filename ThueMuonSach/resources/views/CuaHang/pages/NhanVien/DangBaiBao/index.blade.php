@extends('CuaHang.layouts.index')

@section('content')


<h2 class="mb-4">Danh sách thông tin Bài Báo</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- <div class="hstack gap-2 mb-4">
    <div class="w-25">
        <input id="cuong-timkiem" class="cuong-bb-form-control me-2" type="text" placeholder="Tìm kiếm..." aria-label="Search">
    </div>

    <button id="cuong-nuttimkiem" class="cuong-bb-btn-primary me-auto">Tìm kiếm</button>
    <a href="{{ route('route-cuahang-nhanvien-dangbaibao-thembaibao') }}" class="btn btn-success" id="cuong-dangbaibao">Đăng bài báo mới</a>
</div> --}}

@csrf
<div class="scroll-container ba-fixed-header-table mb-4">
    <table class="cuong-bb-table mb-3 text-center align-middle">
        <thead>
            <tr class="cuong-bb-table-primary align-middle">
                <th scope="col" width="15%">Hình Ảnh</th> <!-- Cột hình ảnh -->
                <th scope="col" width="18%">Tiêu Đề</th>
                <th scope="col" width="18%">Nội Dung</th>
                <th scope="col" width="15%">Ngày Đăng</th>
                <th scope="col" width="10%">Mã Nhân Viên</th>
                <th scope="col" width="10%">Hành Động</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($dsCTBaiBao as $index => $CTBaiBao)
                <tr>
                    <td>
                        @if ($CTBaiBao->hinhanh) <!-- Kiểm tra có hình ảnh không -->
                            <img src="{{ asset('img/anh-bai-bao/' . $CTBaiBao->hinhanh) }}" alt="Hình ảnh bài báo" class="cuong-bb-img-thumbnail">
                        @else
                            <span>Không có hình</span>
                        @endif
                    </td>
                    <td class="search-column">{{ $CTBaiBao->tieude }}</td>
                    <td class="search-column">{{ $CTBaiBao->noidung }}</td>
                    <td class="search-column">{{ $CTBaiBao->ngaydang }}</td>
                    <td class="search-column">{{ $CTBaiBao->nhanVien->hoten }}</td>
                    <td class="search-column">
                        <a href="{{ route('route-cuahang-nhanvien-dangbaibao-suabaibao', ['tieude' => $CTBaiBao->tieude]) }}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square text-black"></i></a>
                        <form action="{{ route('route-cuahang-nhanvien-dangbaibao-xoa', ['tieude' => $CTBaiBao->tieude]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xoá bài báo này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="cuong-bb-py-5">Không có thông tin ấn phẩm nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection