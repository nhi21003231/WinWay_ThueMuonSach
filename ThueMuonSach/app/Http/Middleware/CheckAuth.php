<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        // Nếu người đã đăng nhập
        if (Auth::check()) {
            return $next($request);
        }

        // Nếu chưa đăng nhập 
        return back()->with('error', 'Bạn chưa đăng nhập!');
    }
}
