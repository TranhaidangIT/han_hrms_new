<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem admin đã đăng nhập chưa
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login'); // Redirect đến trang login nếu chưa đăng nhập
        }

        return $next($request);
    }
}
