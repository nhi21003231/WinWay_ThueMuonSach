<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckGuestOrCustomer
{
    public function handle(Request $request, Closure $next): Response
    {
        // Nếu người dùng đã đăng nhập
        if (Auth::check()) {
            // Nếu vai trò là 'khachhang', cho phép truy cập
            if (Auth::user()->vaitro === 'khachhang') {
                return $next($request);
            }
            // Nếu không phải khách hàng, chuyển hướng hoặc trả về lỗi
            return back()->with('error', 'Không thể truy cập trang này!');
        }

        // Nếu chưa đăng nhập, cho phép truy cập
        return $next($request);
    }
}
