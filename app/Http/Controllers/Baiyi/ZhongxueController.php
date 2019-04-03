<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ZhongxueController extends Controller
{
    //加载中班课程页面
    public function index(){

        return view('baiyi.zhongxue.index');
    }


}
