<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\placard;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlacardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取表中的数据
        $link = new Placard;
        // 查询数据并分页
        $search = $request -> input('search','');
        $count = $request -> input('count',3);
        $request = $request -> all();
        $data = $link->where('p_title','like','%'.$search.'%')->paginate($count);
        
        //引入公告列表页
        return view('admin.placard.index',['data'=>$data,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // 加载公告添加页面
        return view('admin.placard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 执行添加动作
        $data = $request->except('_token');
        $placard = new Placard;
        $placard->p_title = $data['p_title'];
        $placard->p_content = $data['p_content'];
        $placard->p_time = $data['p_time'];

        // 将添加的链接数据放到数据表中
        if($placard->save())
            {
                return redirect('/admin/placard')->with('success','添加成功');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取表中的数据
        $placard = new Placard;
        $data = $placard -> find($id);

        // 加载修改页面
        return view('admin.placard.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //执行修改
        $data = $request->except('_token');

        // 获取到修改的数据
        $placard = new Placard;
        $res = $placard -> find($id);
        $res -> p_title = $data['p_title'];
        $res -> p_content = $data['p_content'];
        $res -> p_time = $data['p_time'];
        // 将添加的公告数据放到数据表中
        if($res->save())
            {
                return redirect('/admin/placard')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 定义一个空数组
        $data = [];
        // 获取表中的数据
        $placard = new Placard;
        $res = $placard->find($id);
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
