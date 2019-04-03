<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\AdminUser;
class HasRoleMiddleware
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
        // 思路：获取到当前请求的路由，判断此路由是否在用户对应的权限中

        //1 通过用户请求的路由来 获取当前用户想访问的控制器的方法
        // "App\Http\Controllers\Admin\IndexController@index"
        $route = \Route::current()->getActionName();

        //  获取当前用户具有的权限
        //  获取当前用户
        $user = AdminUser::find(session('user')->id);


        //  通过用户找角色,得到角色模型
        $roles = $user->roles()->get();

        if($user->admin_name=='admin'){
             return $next($request);
        }

        //  通过角色找权限
        // 定义一个空数组，存放当前用户所拥有的权限
        $arr = [];

        foreach($roles as $r){

        //  取出当前角色对应的权限
            $pers =  $r->permissons;


        //  遍历权限模型，取出权限的权限名per_name放入一个空数组
            foreach($pers as $per){

        // 取权限模型的ID
                 $arr[] = $per->per_name;
             }
         }

        //  取出重复的权限
        $newarr = array_unique($arr);

        // dd($newar);
        //dd($newarr);
        //  3  判断当前请求路由对应的控制器方法是否在用户具有的权限中，如果在，放行，如果不在提示用户没有权限
        if(in_array(trim($route),$newarr)){

            return $next($request);
        }else{

            return view('errors.403');
        }

    }
}
