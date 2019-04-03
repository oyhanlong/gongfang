<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Carousel;
use DB;
use Illuminate\Support\Facades\Redis;
class CarouselController extends Controller
{


    public function upload(Request $request)
    {
            //获取文件对象
        $file = Input::file('c_pic');

        // 1.检测是否有文件上传
        // if($request -> hasFile($data['web_logo'])){
        if($file->isValid()){
            // 处理文件名称
            $temp_name = md5(time()+rand(1000,9999));

            // 获取后缀
            $hz = $request -> file('c_pic') ->getClientOriginalExtension();

            // 文件路径
            $temp_path = './carousel/'.date('Ymd',time());
              // 拼接文件名
            $name = ltrim($temp_path.'/'.$temp_name.'.'.$hz,'.');
            $temp_name2 =  $temp_name.'.'.$hz;

            // echo $temp_name2.'<br>';
            // echo $name;
            // 文件上传
            $request -> file('c_pic') -> move($temp_path,$temp_name2);



            return  $name;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         // 查询数据并分页
        $search = $request -> input('search','');
        $count = $request -> input('count',3);
        $request = $request -> all();
        $carousel=new Carousel;
        $data=$carousel::where('c_status','=','0')->where('id','like','%'.$search.'%')->orderBy('c_time','desc')->paginate($count);
        return view('admin.carousel.index',compact('data','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.carousel.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


         //定义redis
        // $listkey='LIST:CAROUSEL';
        // $hashkey='HASH:CAROUSEL:';
        //获取数据
        $data=$request->except('_token');
        $data['c_time'] = time();
        //实例化模型
        $carousel=new Carousel;
        $carousel->c_pic=$data['c_path'];
        $carousel->c_editor=$data['c_editor'];
        $carousel->c_tag=$data['c_tag'];
        $carousel->c_title=$data['c_title'];
        $carousel->c_content=$data['c_content'];
        $carousel->c_description=$data['c_description'];
        $carousel->c_time=$data['c_time'];
        $carousel->c_status=$data['c_status'];

        // dd($carousel);
        $res=$carousel->save();
        if($res){
            //添加成功
            // 将刚添加的文章的键保存到list
            // Redis::rpush($listkey,$res->id);
              // 将文章添加到hash中
            // Redis::hmset($hashkey.$re->id,$re->toArray());

            return redirect('/admin/carousel')->with('success','添加成功');
        }else{
            //添加失败
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
           // 查询数据并分页
        $search = $request -> input('search','');
        $count = $request -> input('count',3);
        $request = $request -> all();
          $carousel=new Carousel;
        //加载轮播回收站页面
        $data=$carousel::where('c_status','=','1')->where('id','like','%'.$search.'%')->orderBy('c_time','desc')->paginate($count);
         return view('admin.carousel.huishou',compact('data','request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取用户提交的数据

        $carousel=new Carousel;
        $data=$carousel::where('id',$id)->first();
        // dd($data);
        return view('admin.carousel.edit',compact('data'));
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
        //
    }


    //修改轮播图片
    public function do_delete(Request $request,$id)
    {
        $data=$request->all();
        $data['c_time'] = time();

        $c_pic=$data['c_path'];
        $c_editor=$data['c_editor'];
        $c_tag=$data['c_tag'];
        $c_content=$data['c_content'];
        $c_title=$data['c_title'];
        $c_description=$data['c_description'];
        $c_status=$data['c_status'];
        $c_time=$data['c_time'];

        $res=DB::table('zy_carousel')->where('id',$id)->update(['c_pic'=>$c_pic,'c_description'=>$c_description,'c_status'=>$c_status,'c_editor'=>$c_editor,'c_tag'=>$c_tag,'c_content'=>$c_content,'c_title'=>$c_title,'c_time'=>$c_time,]);
        if($res)
        {
            return redirect('/admin/carousel')->with('success','修改成功');
        }else{
            return redirect('/admin/carousel')->with('error','修改失败');
        }

    }

   //把轮播图片放入回收站
    public function do_history(Request $request,$id)
    {
        $res=DB::table('zy_carousel')->where('id',$id)->update(['c_status'=>'1']);
        if($res)
        {
            return redirect('/admin/carousel/'.$id)->with('success','修改成功');
        }else{
            return redirect('/admin/carousel')->with('error','修改失败');
        }
    }

    //把轮播图片还原
    public function delete(Request $request,$id)
    {
        $res=DB::table('zy_carousel')->where('id',$id)->update(['c_status'=>'0']);
         if($res)
        {
            return redirect('/admin/carousel')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    //删除轮播图片
    public function delete_lunbo(Request $request,$id)
    {
        $res=DB::table('zy_carousel')->where('id',$id)->delete();
        if($res)
        {
            return redirect('/admin/carousel/'.$id)->with('success','删除成功');
            $data=[
                    'status'=>'0',
                    'msg'=>'删除成功'
                ];
        }else{
            return redirect('/admin/carousel/'.$id)->with('error','删除失败');
            $data=[
                    'status'=>'1',
                    'msg'=>'删除失败'
                ];
        }
    }
}
