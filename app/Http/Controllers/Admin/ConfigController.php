<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use App\Models\Config;
use Illuminate\Support\Facades\Input;
class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function uploads(Request $request)
    {
            //获取文件对象
        $file = Input::file('web_logo');

        // 1.检测是否有文件上传
        // if($request -> hasFile($data['web_logo'])){
        if($file->isValid()){
            // 处理文件名称
            $temp_name = md5(time()+rand(1000,9999));

            // 获取后缀
            $hz = $request -> file('web_logo') ->getClientOriginalExtension();

            // 文件路径
            $temp_path = './uploads/'.date('Ymd',time());
              // 拼接文件名
            $name = ltrim($temp_path.'/'.$temp_name.'.'.$hz,'.');
            $temp_name2 =  $temp_name.'.'.$hz;

            // echo $temp_name2.'<br>';
            // echo $name;
            // 文件上传
            $request -> file('web_logo') -> move($temp_path,$temp_name2);

            return  $name;
        }
    }

    public function index(Request $request)
    {
        //
        $config = new Config;
        // 查询数据并分页
        $search = $request -> input('search','');
        $count = $request -> input('count',3);
        $request = $request -> all();
        $data = $config->where('web_name','like','%'.$search.'%')->paginate($count);

        return view('admin.config.index',['data'=>$data,'request'=>$request]);
    }

    /**
     *  返回添加配置信息页
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加页模板
        return view('admin.config.create');
    }

    /**
     * 处理添加配置信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取表单信息
        $data=$request->all();

        $web_name=$data['web_name'];
        $web_slogan=$data['slogan'];
        $copyright=$data['copyright'];
        $web_logo=$data['art_thumb'];
        $record_number=$data['record_number'];
        $web_telphone=$data['web_telphone'];
        $web_email=$data['web_email'];
        $web_keyword=$data['web_keyword'];
        $web_description=$data['web_description'];


        //项数据库添加数据
       $res= DB::table('zy_config')->insert([
                'web_name'=>$web_name,
                'slogan'=>$web_slogan,
                'copyright'=>$copyright,
                'web_logo'=>$web_logo,
                'record_number'=>$record_number,
                'web_telphone'=>$web_telphone,
                'web_email'=>$web_email,
                'web_keyword'=>$web_keyword,
                'web_description'=>$web_description
            ]);
            if($res)
            {
                return redirect('/admin/config')->with('success','恭喜添加成功');
            }else{
                return back()->with('error','抱歉添加失败');
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
        //查询要修改的网站配置
        $data=Config::where('web_id',$id)->first();
        return view('admin.config.edit',compact('data'));
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

    }
    public function config(Request $request, $id)
    {

        //获取提交的数据
        $data=$request->except('_token');
            $web_name=$data['web_name'];
            $web_slogan=$data['slogan'];
            $copyright=$data['copyright'];
            $web_logo=$data['art_thumb'];
            $record_number=$data['record_number'];
            $web_telphone=$data['web_telphone'];
            $web_email=$data['web_email'];
            $web_keyword=$data['web_keyword'];
            $web_description=$data['web_description'];
            $web_status=$data['web_status'];

        $res=Config::where('web_id',$id)->update([
                'web_name'=>$web_name,
                'slogan'=>$web_slogan,
                'copyright'=>$copyright,
                'web_logo'=>$web_logo,
                'record_number'=>$record_number,
                'web_telphone'=>$web_telphone,
                'web_email'=>$web_email,
                'web_keyword'=>$web_keyword,
                'web_description'=>$web_description,
                'web_status'=>$web_status
                    ]);
            if($res){
                return redirect('/admin/config')->with('success','修改成功');
            }else{
                return redirect('/admin/config')->with('error','修改失败');
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
        //查询要删除的配置信息
        $res=DB::table('zy_config')->where('web_id',$id)->delete();
        // 判断
        if($res)
        {
            return redirect('/admin/config')->with('success','删除成功');
        }else{
            return redirect('/admin/config')->with('error','删除失败');
        }
    }
}
