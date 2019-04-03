<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Article;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Hash;
use DB;


class ArticleController extends Controller
{

    //    文件上传
    public function upload(Request $request)
    {
// //        获取文件对象
        $file = Input::file('file_upload');

//        判断文件是否有效
        if($file->isValid()){
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;

//            1上传到本地服务器
            $path = $file->move(public_path().'/journalism',$newName);
//
            $filepath = 'journalism/'.$newName;
            return  $filepath;
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request -> input('search','');
        $count = $request -> input('count',3);
        $request = $request -> all();
        $data =  Article::where('art_title','like','%'.$search.'%')->paginate($count);
        return view('admin.article.index',compact('data','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载视图模板
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //获取到用户提交过来的数据
        $input = $request->except('_token','file_upload','editorValue');
        $input['art_time'] = time();
        //表单验证

        $re = Article::create($input);

        if($re){
            return redirect('admin/article')->with('success','添加成功');;
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
        $art = Article::find($id);
        return view('admin.article.edit',compact('art'));
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
        //
        $input = Input::except('_token','_method');
        $art = Article::find($id);

        $re = $art->update($input);
        if($re){
            return redirect('admin/article')->with('success','修改成功');
        }else{
            return bace()->with('errors','修改失败');
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
        $re =  Article::find($id)->delete();
        $data = [];
        if($re){
            $data['status']= 0;
            $data['msg']='删除成功';
        }else{
            $data['status']= 1;
            $data['msg']='删除失败';
        }
        return $data;
    }
}
