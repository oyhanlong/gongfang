<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * 加载硬件服务页面
     *
     * @return \Illuminate\Http\Response
     */
    public function hardware()
    {
        return view('baiyi/service/hardware');
    }

    //加载运营服务页面
    public function  operation()
    {
        return view('baiyi/service/operation');
    }

    //加载活动服务页面
    public function activity()
    {
        return view('baiyi/service/activity');
    }

    //加载技能服务页面
    public function skill()
    {
        return view('baiyi/service/skill');
    }

}
