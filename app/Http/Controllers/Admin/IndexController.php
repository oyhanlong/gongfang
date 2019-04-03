<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Hash;
class IndexController extends Controller
{
    /**
     *返回后台主页面
     * @author lfm
     * @date 2017年8月26日14:27:38
     * @param
     * @return 返回后台主页视图
     */
    public function index()
    {
       return view('admin.index.index');
    }

    /**
     *返回修改密码页
     * @author lfm
     * @date 2017年8月26日14:27:38
     * @param
     * @return 返回修改密码视图
     */
    public function pass()
    {
        return view('admin.adminuser.pass',['title'=>'修改密码']);
    }

    /**
     *修改密码
     * @author lfm
     * @date 2017年8月26日14:27:38
     * @param
     * @return 返回修改密码视图
     */
    public function dopass()
    {

      // 1 获取用户提交过来的数据
       $input = Input::except('_token');

      // 2 做表单验证
        $rule = [
            'pass_o'=>'required|between:6,12',
            'admin_pass'=>'required|between:6,12',
            'pass_c'=>'required|same:admin_pass'
        ];

        $mess = [
            'pass_o.required'=>'原密码必须输入',
            'pass_o.between'=>'原密码的长度在6-12位之间',
            'admin_pass.required'=>'新密码必须输入',
            'admin_pass.between'=>'新密码的长度在6-12位之间',
            'pass_c.required'=>'确认密码必须输入',
            'pass_c.same'=>'确认密码跟新新密码必须一致',
        ];

        $validator = Validator::make($input, $rule, $mess);

        // 如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //修改密码
        $user = AdminUser::find(session('user')->id);
        $user->admin_pass = Hash::make($input['admin_pass']);
        $res =  $user->save();
        if($res){
           return redirect('/admin/index')->with('success','修改成功');
        }else{
           return back()->with('error','修改失败');
        }
    }

    /**
     *  退出登录
     *
     * @return
     */
    public function logout()
    {
        // session(['user'=>null]);

        session()->flush();
        return redirect('/admin');
    }
}
