<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    //加载综合实践基地页面
    public function base()
    {
        return view('baiyi.base.base');
    }

    /**
     * Display a listing of the resource.
     *
     *加载泰山基地页面
     */
    public function mount()
    {
        return view('baiyi.base.mount');
    }

    //加载归零文化村页面
    public function zero()
    {
        return view('baiyi.base.zero');
    }

    //加载生态乐园页面
    public function paradise()
    {
        return view('baiyi.base.paradise');
    }
}
