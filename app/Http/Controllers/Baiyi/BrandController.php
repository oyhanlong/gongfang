<?php

namespace App\Http\Controllers\Baiyi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * 品牌页面添加
     *
     * @return \Illuminate\Http\Response
     */
    public function brand()
    {
        return view('baiyi.brand.brand');
    }

    //企业文化页面添加

    public function culture()
    {
        return view('baiyi.brand.culture');
    }

    //合作伙伴页面添加
    public function partner()
    {
        return view('baiyi.brand.partner');
    }

}
