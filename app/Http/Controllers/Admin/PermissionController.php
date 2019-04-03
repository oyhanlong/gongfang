<?php

namespace App\Http\Controllers\Admin;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionInsert;
use App\Http\Requests\PermissionUpdate;
class PermissionController extends Controller
{
    /**
     * 展示权限列表视图
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取分页信息
        $count = $request -> input('count',5);
        // 获取关键字搜索信息
        $keys = $request -> input('keys','');
        $request = $request ->all();
        // 查找数据并分页
        $data = Permission::where('per_name','like','%'.$keys.'%')->paginate($count);

        return view('admin.permission.index',['title'=>'权限列表','data'=>$data,'request'=>$request]);

    }

    /**
     * 加载添加权限的视图
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.permission.create',['title'=>'添加权限']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionInsert $request)
    {
        // 获取表单提交数据
        $input = Input::except('_token');
        // 执行添加
        $per = Permission::create($input);
        // 判断是否添加成功
        if($per){
           return redirect('admin/permission');
        }else{
           return back()->with('errors','添加失败');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // 查询要修改的权限信息
        $per = Permission::find($id);
        $title = "权限修改";
        return view('admin.permission.edit',compact('per','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdate $request, $id)
    {
        //获取表单提交数据
        $input = Input::except('_method','_token');
        // 查找当前角色记录
        $per = Permission::find($id);
        // 执行修改
        $res = $per->update($input);
        if($res){
            return redirect('admin/permission');
        }else{
            return back()->with('errors','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 执行删除
        $res = Permission::find($id)->delete();

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
