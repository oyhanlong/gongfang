<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WorkshopController extends Controller
{
    /**
     * 加载陶工坊页面
     *
     * @return \Illuminate\Http\Response
     */
    public function pottery_workshop()
    {
        return view('baiyi.workshop.Pottery_workshop');
    }

    /**
     * 加载木工坊页面
     *
     * @return \Illuminate\Http\Response
     */
    public function wooden_workshop()
    {
        return view('baiyi.workshop.wooden_workshop');
    }

    /**
     * 加载纸工坊页面
     *
     * @return \Illuminate\Http\Response
     */
    public function paper_workshop()
    {
        return view('baiyi.workshop.paper_workshop');
    }

    /**
     * 加载农工坊页面
     *
     * @return \Illuminate\Http\Response
     */
    public function farmers_workshop()
    {
        return view('baiyi.workshop.farmers_workshop');
    }

    //加载创客教室页面
    public function creator()
    {
        return view('baiyi.workshop.creator');
    }
}
