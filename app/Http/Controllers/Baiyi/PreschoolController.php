<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PreschoolController extends Controller
{
    //加载学前陶艺课程页面
     public function young_preschool_ceramic()
    {
        return view('baiyi.young_preschool.young_preschool_ceramic');
    }
    //加载学前木艺课程页面
    public function young_preschool_timber()
    {
        return view('baiyi.young_preschool.young_preschool_timber');
    }
     //加载学前纸艺课程页面
    public function young_preschool_paper()
    {
        return view('baiyi.young_preschool.young_preschool_paper');
    }
    //加载学前农艺课程页面
    public function young_preschool_farming()
    {
        return view('baiyi.young_preschool.young_preschool_farming');
    }
}
