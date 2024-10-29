<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckGuest
{
    public function handle(Request $request, Closure $next): Response
    {
        // Nếu người chưa đăng nhập
        if (!Auth::check()) {
            return $next($request);
        }

        // Nếu đã đăng nhập không cho truy cập
        return back()->with('error', 'Bạn đã đăng nhập!');
    }
}
