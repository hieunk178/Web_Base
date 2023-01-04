<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next,  ...$guards)
    {
        if (!Auth::check()) {// Chưa đăng nhập
            return redirect()->route('login');
        }
        $user = Auth::user();  //Lấy thông tin user khi đã đăng nhập
        //Kiểm tra quyền của người dùng
        $route = $request->route()->getName();
        // dd($user->can($route));
        return $next($request);
    }
}
