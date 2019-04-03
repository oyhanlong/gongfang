<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Category;
use DB;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request -> input('count',3);
        $keys = $request -> input('keys','');
        $request = $request ->all();
        $data = Tag::where('tag_name','like','%'.$keys.'%')->join('zy_category','zy_tag.cid','=','zy_category.id')->orderBy('tag_id','asc')->paginate($count);

        return view('admin.tag.index',['title'=>'标签列表','data'=>$data,'request'=>$request]);
    }

    // 获取分类的父ID
    static public function getCatePid($id = 0)
    {
        $data = DB::table('zy_category')->where('pid',$id)->get();
        $arr = [];
        foreach ($data as $key => $value)
        {
            $value['sub'] = self::getCatePid($value['id']);
            $arr[] = $value;
        }
        return $arr;
    }
    /**
     * 返回标签添加视图
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = new Category;
        //查询所有父分类
        $pcate = $cate->where('pid','=','0')->get();
        // //查询所有子分类
        // $data2 = $cate->where('pid','>','0')->get();
        $title = "添加标签";
        // return view('admin.tag.create',['title'=>'标签添加','data1'=>$data1,'data2'=>$data2]);
        $data = self::getCatePid();

        // dd($data);
        return view('admin.tag.create',compact('pcate','data','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 二级分类的下拉项
     */

    //二级分类的添加
    public function fenlei(Request $request)
    {
        //是一个一维数组
       $id=$request->all();
       //获取到的data是一个二维数组
       $data=DB::table('zy_category')->where('pid',$id['id'])->get();

       $str=json_encode($data);

        return $str;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取提交的数据
        $tag = $request -> except('_token','funame');
        //将数据插入到数据库
        $res =DB::table('zy_tag')->insert($tag);
        if($res){
            return redirect('/admin/tag')->with('success','添加成功');
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
        //
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
        $res = Tag::find($id)->delete();
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
}
