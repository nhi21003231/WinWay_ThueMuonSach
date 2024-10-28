<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class XacThuc
{
    public function handle(Request $request, Closure $next, ...$vaiTro): Response
    {

        if (Auth::check()) {
            if (in_array(Auth::user()->vaitro, $vaiTro)) {
                return $next($request);
            } else {
                return back()->with('error', 'Bạn không có quyền truy cập trang này!');
            }
        } else {
            return redirect(route('route-dangnhap'));
        }
    }
}
