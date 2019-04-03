<?php

namespace App\Http\Middleware;

use Closure;

class HomeloginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 如果用户未登录
        if(!session('username')){
            return redirect('/baiyi')->with('error','您还未登录，前去登陆');
        }
        //登录放行
        return $next($request);
    }
}
