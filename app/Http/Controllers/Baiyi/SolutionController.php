<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SolutionController extends Controller
{
    /**
     * 加载技术支持页面.
     *
     * @return \Illuminate\Http\Response
     */
    public function solution()
    {

        return view('baiyi.sloution.index');
    }


}
