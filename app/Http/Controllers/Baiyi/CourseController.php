<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function last_term()
    {
        //加载春季课程页面
        return view('baiyi.course.last_term');
    }


    public function next_term()
    {
        //加载秋季课程页面
        return view('baiyi.course.next_term');
    }

}
