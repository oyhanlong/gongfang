<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use App\Models\Home_user;

class LoginController extends Controller
{
    /**
     * 加载前台登陆页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('baiyi.login.index');
    }


    public function doLogin(Request $request)
    {
        $data = $request->all();
        $phone = $data['phone'];
        $password = $data['password'];

        $user =  Home_user::where('phone',$phone)->first();
        if(empty($user)){
            return 0;
        }

        if(!Hash::check($password,$user->password)){
           return 1;
       }

        // 把登录的用户存入session
        // \Session::flash('user',$user);
        session(['huser'=>$user]);
        return 2;
    }

    public function doLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

    public function checkLogin(){
        if(empty(session('huser'))){
            return 0;
        }else{
            $id = session('huser')->id;
            return $id;
        }
    }

}
