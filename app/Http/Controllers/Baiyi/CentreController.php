<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CentreController extends Controller
{
     //加载小班陶艺课程页面
     public function young_centre_ceramic()
    {
        return view('baiyi.young_centre.young_centre_ceramic');
    }
    //加载小班木艺课程页面
    public function young_centre_timber()
    {
        return view('baiyi.young_centre.young_centre_timber');
    }
     //加载小班纸艺课程页面
    public function young_centre_paper()
    {
        return view('baiyi.young_centre.young_centre_paper');
    }
    //加载小班农艺课程页面
    public function young_centre_farming()
    {
        return view('baiyi.young_centre.young_centre_farming');
    }
}
