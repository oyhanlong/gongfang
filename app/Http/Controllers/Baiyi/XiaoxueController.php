<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class XiaoxueController extends Controller
{
   // 加载小学课程页面
    public function index()
    {
        //
        return view('baiyi.xiaoxue.index');
    }

}
