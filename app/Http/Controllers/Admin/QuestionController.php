<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class QuestionController extends Controller
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
        $data=DB::table('zy_question')->where('status','=','0')->where('q_title','like','%'.$search.'%')->orderBy('q_time','desc')->paginate($count);

        //展示用户问题的主页面
        return view('admin.question.index',compact('data','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //session(['user'=>$user]);
        // $uid=session('user')->id;
        //加载问题的添加页面
        return view('admin.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取当前登录用户的id
        $uid=session('user')->id;

        $data=$request->except('_token');
        //执行问题的添加
        $res=DB::table('zy_question')->insert([
                                                'uid'=>$uid,
                                                'q_title'=>$data['q_title'],
                                                'q_content'=>$data['q_content'],
                                                'status'=>$data['status'],
                                                'q_time'=>$data['q_time']
                                                ]);
        if($res)
        {
            return redirect('/admin/question')->with('success','添加成功');
        }else{
            return back()->with('errors','添加失败');
        }
    }

    /**
     * Display the specified resource
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
        $data=DB::table('zy_question')->where('id','=',$id)->first();

        //加载问题修改页面
        return view('admin.question.edit',compact('data'));
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
        $title=$data['q_title'];
        $content=$data['q_content'];
        $status=$data['status'];

        //执行修改的动作
        $res=DB::table('zy_question')->where('id','=',$id)->update(['q_title'=>$title,'q_content'=>$content,'status'=>$status]);
        if($res)
        {
            return redirect('/admin/question')->with('success','修改成功');
        }else{
            return redirect('/admin/question')->with('error','修改失败');
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
        //

    }


    //把用户问题放入回收站
    public function delete(Request $request)
    {
        //获取文章的id
        $id=$request->id;
        //把文章id的状态改为1为放入回收站
        // $data=DB::table('zy_question')->where('id','=',$id)->first();
        //获取数据库文章状态
        // $status=$data['status'];

        //修改状态为1，放入回收站
        $res=DB::table('zy_question')->where('id','=',$id)->update(['status'=>'1']);

        if($res)
        {
            //修改成功返回回收站
            return redirect('/admin/question/do_delete/{$id}')->with('success','放入回收站成功');
        }else{
            return redirect('/admin/question')->with('error','放入回收站失败');
        }
    }


    //加载回收站页面
    public function do_delete(Request $request)
    {
        // 查询数据并分页
        $search = $request -> input('search','');
        $count = $request -> input('count',3);
        $request = $request -> all();

        $data=DB::table('zy_question')->where('status','=','1')->where('q_title','like','%'.$search.'%')->orderBy('q_time','desc')->paginate($count);
        // dd($data);
        return view('admin.question.do_delete',compact('data','request'));
    }

    //把回收站的还原到主页面
    public function do_history(Request $request)
    {
        $id=$request->id;
         //修改状态为0,还原
        $res=DB::table('zy_question')->where('id','=',$id)->update(['status'=>'0']);
        if($res)
        {
            //修改成功返回主页面
            return redirect('/admin/question')->with('success','还原成功');
        }else{
            return redirect('/admin/question/do_delete/{id}')->with('error','还原失败');
        }
    }
}
