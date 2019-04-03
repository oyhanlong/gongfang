<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\linkInsert;
use App\Http\Requests\linkUpdate;
use App\Http\Controllers\Controller;
use App\Models\Link;

class LinkController extends Controller
{
    /**
     * 加载友情链接页面.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取表中的数据
        $link = new Link;
        // 查询数据并分页
        $search = $request -> input('search','');
        $count = $request -> input('count',3);
        $request = $request -> all();
        $data = $link->where('f_name','like','%'.$search.'%')->paginate($count);
        //引入友情链接列表页
        return view('admin.link.index',['data'=>$data,'request'=>$request]);
    }

    /**
     * 显示创建链接的表单
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载链接添加页面
        return view('admin.link.create');
    }

    /**
     *  将新创建的资源存储在数据表中,执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(linkInsert $request)
    {
        // 执行添加动作
        $data = $request->except('_token');
        $link = new Link;
        $link->f_name = $data['f_name'];
        $link->f_address = $data['f_address'];

        // 将添加的链接数据放到数据表中
        if($link->save())
            {
                return redirect('/admin/link')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            };

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
     * 加载链接修改页面.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取表中的数据
        $link = new Link;
        $data = $link->find($id);

        // 加载修改页面
        return view('admin.link.edit',['data'=>$data]);
    }

    /**
     * 执行修改动作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(linkUpdate $request, $id)
    {
        //执行修改
        $data = $request->except('_token');

        $link = new Link;
        $res=$link->find($id);
        $res->f_name = $data['f_name'];
        $res->f_address = $data['f_address'];

        // 将添加的链接数据放到数据表中
        if($res->save())
        {
            return redirect('/admin/link')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        };
    }

    /**
     * 执行删除动作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 定义一个空数组
        $data = [];
        // 获取表中的数据
        $link = new Link;
        $res = $link->find($id);
        if($res->delete())
        {
            // 删除成功时
             $data['msg']='删除成功';

        }else{

            // 删除失败时
             $data['msg']='删除失败';
        }

       return $data;
    }
}
