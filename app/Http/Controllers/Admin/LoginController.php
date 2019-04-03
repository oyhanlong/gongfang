<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\AdminUser;
use Hash;
class LoginController extends Controller
{
    /**
     * 加载后台登录页面
     */
   public function index()
   {
        return view('admin.login.index');
   }

   /**
    * 处理登录
    */
   public function do_login(Request $request)
   {

        //获取浏览器提交的数据
        $input =  Input::except('_token');

        //输入的数据是否符合表单验证规范
        $rule = [
            'admin_name'=>'required|between:5,12',
            'admin_pass'=>'required|between:6,18'
        ];

        $mess = [
            'admin_name.required'=>'用户名必须输入',
            'admin_name.between'=>'用户名的长度在5-12位之间',
            'admin_pass.required'=>'密码必须输入',
            'admin_pass.between'=>'密码的长度在6-18位之间',
        ];
        $validator = Validator::make($input, $rule, $mess);

        // 如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //获取验证码
        $code1 = session('code');
        $code2 = $request -> input('code');

        //验证输入的验证码
        if($code1 !== $code2){

            return back()->with('error','验证码验证失败');

        }

        // 验证 用户名 密码
        $user =  AdminUser::where('admin_name',$input['admin_name'])->first();

        //判断用户
        if(empty($user)){
            return back()->with('errors','此用户不存在');
        }

        // 判断密码
        if(!Hash::check($input['admin_pass'],$user->admin_pass)){
            return back()->with('errors','密码不正确');
         }

        // 如果登录成功，将用户信息保存如session中，表示用户已经登录
        session(['user'=>$user]);

        // 如果正确跳转到后台首页
        return redirect('admin/index');
   }
}
