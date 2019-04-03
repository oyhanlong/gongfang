<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class YoungController extends Controller
{
    //加载幼教课程小班页面
     public function young_little()
    {
        return view('baiyi.young.young_little');
    }

    //加载幼教课程中班页面
    public function young_centre()
    {
        return view('baiyi.young.young_centre');
    }

    //加载幼教课程大班页面
    public function young_big()
    {
        return view('baiyi.young.young_big');
    }

    //加载幼教课程学前页面
    public function young_preschool()
    {
        return view('baiyi.young.young_preschool');
    }
}
