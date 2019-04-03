<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminuserInsertRequest;
use App\Models\AdminUser;
use Hash;
use DB;
use Illuminate\Support\Facades\Input;
class AdminUserController extends Controller
{
    /**
     * 返回管理员列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request -> input('count',3);
        $keys = $request -> input('keys','');
        $request = $request ->all();
        $data = AdminUser::where('admin_name','like','%'.$keys.'%')->paginate($count);

        return view('admin.adminuser.index',['title'=>'管理员用户列表','data'=>$data,'request'=>$request,]);
    }

    /**
     * 返回管理员添加页
     *
     * @return 返回管理员添加视图
     */
    public function create()
    {
        return view('admin.adminuser.create',['title'=>'管理员添加']);
    }
    /**
     * 处理文件上传
     *
     * @param  AdminuserInsertRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        // 获取文件对象
        $file = Input::file('admin_photo');
        // 判断文件是否有效
        if($file->isValid()){

            $entension = $file->getClientOriginalExtension();//上传文件的后缀名

            $newName = date('Ymd').mt_rand(1000,9999).'.'.$entension;
            //上传到本地服务器
            // $path = $file->move('a/uploads/',$newName);
            //上传到七牛云存储
            \Storage::disk('qiniu')->writeStream('a/uploads/'.$newName, fopen($file->getRealPath(), 'r'));
            $filepath = 'a/uploads/'.$newName;

            session(['photo_path'=>$filepath]);

            return $filepath;

        }
    }
    /**
     * 处理添加管理员
     *
     * @param  AdminuserInsertRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminuserInsertRequest $request)
    {


        //获取表单数据
        $data = $request->except(['_token','admin_photo']);


        //处理插入
        $user = new AdminUser;
        $user->admin_name = $data['admin_name'];
        //hash::make()   哈希加密
        $user->admin_pass = Hash::make($data['admin_pass']);
        $user->admin_email = $data['admin_email'];
        $user->admin_photo = session('photo_path');
        if($user->save()){
            return redirect('/admin/adminuser')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //1 获取到当前用户
        $user = AdminUser::find($id);

//        2 获取到所有的角色
        $roles = Role::get();
//        获取当前用户已经被授予的角色
        $own_roles= DB::table('zy_role_adminuser')->where('admin_id',$id)->lists('role_id');
        $title = '授权角色';
//        3 将相关的数据（用户、角色）返回给授权页面
        return view('admin.adminuser.auth',compact('user','roles','own_roles','title'));
    }

    // 给角色添加相应权限
    public function auth()
    {
        //1 接收传过来的角色、要赋予的权限数据
        $input = Input::all();

        //角色ID
        $admin_id = $input['admin_id'];

        $role_id = $input['role_id'];

        //删除当期角色已经有的权限
        $res =  DB::table('zy_role_adminuser')->where('admin_id',$admin_id )->delete();
        if(!$res){
            back()->with('errors','授权角色失败，请重新授权');
        }

        //2 授权（向permission_role表中写记录）
        foreach ($role_id as $v) {
            DB::table('zy_role_adminuser')->insert(
                ['admin_id' => $admin_id, 'role_id' => $v]
            );
            $role = DB::table('zy_role')->where('id',$role_id)->first();
            $role_name = $role['role_name'];
            DB::table('zy_adminuser')->where('id',$admin_id)->update(['auth'=>$role_name]);
        }
        return redirect('admin/adminuser');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取表中的数据
        $user = new AdminUser;
        $data = $user->find($id);
        return view('admin.adminuser.edit',['title'=>'管理员修改','data'=>$data]);
    }

    /**
     * 执行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->except('_token','_method');

        $user = new AdminUser;
        $res= $user->find($id);
        // $res= $user->update($data);
        $res->admin_name = $data['admin_name'];
        $res->admin_email = $data['admin_email'];
        $res->admin_photo = session('photo_path');
        // 将添加的链接数据放到数据表中
        if($res->save())
            {
                return redirect('/admin/adminuser')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            };
    }

    /**
     * 删除管理员
     *
     * @param  int  管理员id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = [];
        $res =  AdminUser::find($id)->delete();
        //删除成功
        if($res){
            $data['status']= 0;
            $data['msg']='删除成功';
        }else{
           $data['status']= 1;
           $data['msg']='删除失败';
        }
        return $data;
    }

    public function admin_name(Request $request)
    {
        //检测用户名是否存在
        $admin_name = $request->input('admin_name');

        $user =  AdminUser::where('admin_name',$admin_name)->first();

        if($user){
            echo 1;
        }else{
            echo 2;
        }
    }

    public function admin_email(Request $request)
    {
        //检测邮箱是否存在
        $admin_email = $request->input('admin_email');

        $email =  AdminUser::where('admin_email',$admin_email)->first();

        if($email){
            echo 1;
        }else{
            echo 2;
        }
    }
}
