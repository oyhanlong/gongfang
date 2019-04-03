<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LittleController extends Controller
{
    //加载小班陶艺课程页面
     public function young_little_ceramic()
    {
        return view('baiyi.young_little.young_little_ceramic');
    }
    //加载小班木艺课程页面
    public function young_little_timber()
    {
        return view('baiyi.young_little.young_little_timber');
    }
     //加载小班纸艺课程页面
    public function young_little_paper()
    {
        return view('baiyi.young_little.young_little_paper');
    }
    //加载小班农艺课程页面
    public function young_little_farming()
    {
        return view('baiyi.young_little.young_little_farming');
    }
}
