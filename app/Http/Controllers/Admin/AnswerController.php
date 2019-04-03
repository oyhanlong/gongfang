<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 查询数据并分页
        $search = $request -> input('search','');
        $count = $request -> input('count',3);
        $request = $request -> all();
        $data=DB::table('zy_answer')->where('a_status','=','0')->where('q_title','like','%'.$search.'%')->join('zy_question','zy_answer.qid','=','zy_question.id')->orderBy('a_time','desc')->paginate($count);

        //展示用户问题的主页面
        return view('admin.answer.index',compact('data','request'));
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
    public function store(Request $request)
    {

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
        $data=Answer::find($id);
        $que = $data->questions()->first();

        //加载问题修改页面
        return view('admin.answer.edit',compact('data','que'));
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
        //获取修改的数据
        $data=$request->except('_token','_method');
        $content=$data['a_content'];
        $status=$data['a_status'];
        $time= $data['a_time'];
        //执行修改的动作
        $res=DB::table('zy_answer')->where('a_id','=',$id)->update(['a_content'=>$content,'a_status'=>$status,'a_time'=>$time]);
        if($res)
        {
            return redirect('/admin/answer')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        $data = [];
        $res = DB::table('zy_answer')->where('a_id','=',$id)->update(['a_status'=>'1']);

        //删除成功
        if($res){
            $data['status']= 0;
            $data['msg']='放入回收站成功';
        }else{
           $data['status']= 1;
           $data['msg']='放入回收站失败';
        }
        return $data;
    }

    //加载回收站页面
    public function history(Request $request)
    {
        // 查询数据并分页
        $search = $request -> input('search','');
        $count = $request -> input('count',3);
        $request = $request -> all();

       $data=DB::table('zy_answer')->where('a_status','=','1')->where('q_title','like','%'.$search.'%')->join('zy_question','zy_answer.qid','=','zy_question.id')->orderBy('a_time','desc')->paginate($count);
        // dd($data);
        return view('admin.answer.history',compact('data','request'));
    }

     //把回收站的还原到主页面
    public function do_history(Request $request)
    {
        $id=$request->id;
         //修改状态为0,还原
        $res=DB::table('zy_answer')->where('a_id','=',$id)->update(['a_status'=>'0']);
        if($res)
        {
            //修改成功返回主页面
            return redirect('/admin/answer')->with('success','还原成功');
        }else{
            return back()->with('error','还原失败');
        }
    }

}
