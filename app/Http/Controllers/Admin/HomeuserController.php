<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\HuserStoreRequest;
use App\Http\Requests\HuseEditRequest;

use App\Models\Home_user;

use Hash;
use DB;
class HomeuserController extends Controller
{
    /**
     * 用户列表首页显示
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request -> input('count',5);
        $search = $request -> input('search','');
        $request = $request -> all();

        //查询数据分页
        $data = Home_user::where('username','like','%'.$search.'%')->paginate($count);

        // 加载链接添加页面
        return view('admin.homeuser.index',['data'=>$data,'request'=>$request,'title'=>"用户列表"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HuserStoreRequest $request)
    {


    }

    /**
     * 用户列权限显示页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //修改用户的权限
        //获取用户现在的权限
        $res = DB::table('zy_user') -> where('id',$id) -> first();
        $status = $res['status'];

        //判断权限
        if($status == 1){
            $arr = ['status'=>0];
            $res1 = DB::table('zy_user') -> where('id',$id) ->update($arr);

            //判断是否修改成功
            if($res1){
                return redirect('/admin/homeuser') -> with('success','切换成功');
            }else{
                return back() -> with('error','切换失败');
            }
        }else{
            $arr = ['status'=>1];
            $res2 = DB::table('zy_user') -> where('id',$id) ->update($arr);

            //判断是否修改成功
            if($res2){
                return redirect('/admin/homeuser') -> with('success','切换成功');
            }else{
                 return back() -> with('error','切换失败');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HuseEditRequest $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
