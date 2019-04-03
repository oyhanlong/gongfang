<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleInsert;
use App\Http\Requests\RoleUpdate;
use DB;
class RoleController extends Controller
{
    /**
     * 展示角色列表视图
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取分页信息
        $count = $request -> input('count',3);
        // 获取关键字搜索信息
        $keys = $request -> input('keys','');
        $request = $request ->all();
        // 查找数据并分页
        $data =  Role::where('role_name','like','%'.$keys.'%')->paginate($count);

        return view('admin.role.index',['title'=>'角色列表','data'=>$data,'request'=>$request]);
    }

    /**
     * 返回添加角色的视图
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.role.create',['title'=>'添加角色']);
    }

    /**
     * 处理添加角色
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleInsert $request)
    {
        // 获取表单提交数据
        $input =  Input::except('_token');
        // 执行添加
        $role = Role::create($input);
        // 判断是否添加成功
        if($role){
           return redirect('admin/role');
        }else{
           return back()->with('errors','添加失败');
        }
    }

    /**
     * 返回授权视图
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //1 获取到当前角色
        $role = Role::find($id);
        //2 获取到所有的权限
        $pers = Permission::get();
        //获取当前角色已经被授予的权限
       $own_pers= \DB::table('zy_role_permission')->where('role_id',$id)->lists('per_id');
       //dd($own_pers);
       $title = "角色授权";
        //3 将相关的数据（角色、权限）返回给授权页面
        return view('admin.role.auth',compact('role','pers','own_pers','title'));
    }

    /**
     * 给角色添加相应权限
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function auth()
    {
        //1 接收传过来的角色、要赋予的权限数据
         $input = Input::all();

        //角色ID
        $role_id = $input['role_id'];
        $pers_id = $input['per_id'];


        //删除当期角色已经有的权限
        $re =  DB::table('zy_role_permission')->where('role_id',$role_id )->delete();
        if(!$re){
            back()->with('errors','授权失败，请重新授权');
        }

        //2 授权（向permission_role表中写记录）
        foreach ($pers_id as $v) {
            \DB::table('zy_role_permission')->insert(
                ['role_id' => $role_id, 'per_id' => $v]
            );
        }
        return redirect('admin/role');
    }
    /**
     * 展示修改角色视图
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 查询要修改的角色信息
        $role = Role::find($id);
        $title = "角色修改";
        return view('admin.role.edit',compact('role','title'));
    }

    /**
     * 处理修改角色
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdate $request, $id)
    {
        //获取表单提交数据
        $input = Input::except('_method','_token');
        // 查找当前角色记录
        $role = Role::find($id);
        // 执行修改
        $re = $role->update($input);
        if($re){
            return redirect('admin/role');
        }else{
            return back()->with('errors','修改失败');
        }
    }

    /**
     * 处理删除角色
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 执行删除
        $res =  Role::find($id)->delete();

        // 判断是否删除成功
        if($res){
           $data =[
             'status'=>0,
               'msg'=>'删除成功'
           ];
        }else{
           $data =[
               'status'=>1,
               'msg'=>'删除失败'
           ];
        }
        // 返回data
        return $data;

    }
}
