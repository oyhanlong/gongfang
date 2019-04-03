<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use DB;
class CategoryController extends Controller
{
    /*
    *   处理分类
    */
    static public function getCategory()
    {
         // 排序
        $data = DB::table('zy_category')->select(DB::raw("*,concat(path,'-',id) as paths"))->orderBy('paths')->get();

        //遍历处理分类结构|--
        //                    |--|--
        foreach ($data as $key => $value) {
            // 统计一个字符串在另一个字符串出现次数
            $len = substr_count($value['path'],'-');
            // 重复的使用一个字符串
           $data[$key]['cate_name'] = str_repeat(' |----',$len).$value['cate_name'];
        }

        return $data;
    }

    /**
     * 显示分类主页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 引入分类列表页
        return view('admin.category.index',['data'=>self::getCategory(),'request'=>$request]);

    }

    /**
     * 加载添加子分类页面
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id = '')
    {

        //加载添加子分类页面
        return view('admin.category.add',['data'=>self::getCategory(),'id'=>$id]);
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
        $temp = $request -> except('_token');
        $pid = $temp['pid'];

        // 判断
        if($pid == 0){
            // 顶级分类
            $temp['path'] = 0;
        }else{
            // 不是顶级分类
            $parentData = DB::table('zy_category')->where('id',$pid)->first();
            $temp['path'] =  $parentData['path'].'-'.$parentData['id'];
        }
        //将数据插入到数据库
        $res =DB::table('zy_category')->insert($temp);
        if($res){
            return redirect('/admin/category')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * 加载显示分类下的问题列表
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // 1 查询出当前分类下的所有文章
        $questions = DB::table('zy_question') ->join('zy_category','zy_question.cate_pid','=','zy_category.id') -> where('cate_pid',$id) -> get();
        foreach($questions as $k=> $v){
            if($v['pid'] == 0){
            $questions = DB::table('zy_question')->join('zy_category','zy_question.cate_id','=','zy_category.id') -> where('cate_id',$id) ->orwhere('pid',$id)-> get();
            // 将查询后的结果变成一个字符串格式的表格
            $str ='<table class="list_tab">
                <tr>
                    <th class="tc">ID</th>
                    <th>问题标题</th>
                    <th>用户</th>
                    <th>内容</th>
                    <th>提问时间</th>
                </tr>';
            foreach($questions as $k=>$v){
              $str.= "<tr>
                   <td class='tc' style='width:30px'>{$v['id']}</td>
                   <td class='tc'>{$v['q_title']}</td>
                   <td class='tc'>{$v['username']}</td>
                   <td class='tc'>{$v['q_content']}</td>
                   <td class='tc'>{$v['q_time']}</td>
                  </tr>";
            }
            $str.= '</table>';


            return $str;

            }else{
                // 定义一个空字符串来接收每行的文章记录
                $str ='<table class="list_tab">
                        <tr>
                            <th class="tc">ID</th>
                            <th>问题标题</th>
                            <th>用户</th>
                            <th>内容</th>
                            <th>提问时间</th>
                        </tr>';
                foreach($questions as $k=>$v){
                  $str.= "<tr>
                       <td class='tc' style='width:30px'>{$v['id']}</td>
                       <td class='tc'>{$v['q_title']}</td>
                       <td class='tc'>{$v['username']}</td>
                       <td class='tc'>{$v['q_content']}</td>
                       <td class='tc'>{$v['q_time']}</td>
                      </tr>";
                }
                $str.= '</table>';

                return $str;
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
     * 执行分类的删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 定义一个空数组
        $data = [];
        // 获取表中的数据
        $cate = Category::find($id);
        $num = $cate -> where('pid',$id) -> count();


        // 判断分类下是否有子分类.
        if($num && $cate['pid'] == 0)
        {
            // 有子分类不能删除
            $data=[
               'status'=>3,
               'msg'=>'分类下有子分类,不允许删除'
           ];

        return $data;

        };

        // 获取要删除的数据进行判断
        $res = $cate -> delete();
        // 分类下没有子分类,可以删除
        if($res)
        {
            // 删除成功时
            $data=[
                'status'=>0,
                'msg'=>'删除成功'
            ];
        }else{

            // 删除失败时
            $data=[
                'status'=>1,
                'msg'=>'删除失败'
            ];
        }

        return $data;
    }

    /*
    *   加载添加分类页
    */
    public function create($id='')
    {

        //加载添加分类页面
        return view('admin.category.create',['data'=>self::getCategory(),'id'=>$id]);
    }
}
