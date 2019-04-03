<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Suggest;
use Input;
class SuggestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        // 获取search搜索的关键字
        $search = $request -> input('search','');
        
        // 获取count提交的分页条件
        $count = $request -> input('count','5');

        // 获取提交的数据进行分页搜索
        $request = $request -> all();

        // 获取模型中已有的数据
        $suggest = new Suggest;
        
        // 根据获取到的条件返回符合的数据
        $data = $suggest->where('s_title','like','%'.$search.'%')->paginate($count);
       
        // 加载用户反馈及建议列表页
        return view('admin.suggest.index',compact('data','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        // 获取要修改状态的数据
        $suggest = new Suggest;
        $res = $suggest->where('id',$id)->lists('status');

        if($res[0] == 0)
        {
            $res = $suggest->where('id',$id)->update(['status'=>'1']);
            $data = [
                'msg'=>'修改状态成功',
                ];
        }else
        {
            $res = $suggest->where('id',$id)->update(['status'=>'0']);
            $data = [
                'msg'=>'修改状态成功',
                ];
        }

        return $data;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
