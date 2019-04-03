<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BigController extends Controller
{
     //加载小班陶艺课程页面
     public function young_big_ceramic()
    {
        return view('baiyi.young_big.young_big_ceramic');
    }
    //加载小班木艺课程页面
    public function young_big_timber()
    {
        return view('baiyi.young_big.young_big_timber');
    }
     //加载小班纸艺课程页面
    public function young_big_paper()
    {
        return view('baiyi.young_big.young_big_paper');
    }
    //加载小班农艺课程页面
    public function young_big_farming()
    {
        return view('baiyi.young_big.young_big_farming');
    }
}
