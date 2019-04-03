<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    /**
     * 设置数据库访问的表
     *
     * @var string
     */
    protected $table = 'zy_carousel';

    /**
     * 设置可以分配的属性
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * 要排除不分配的属性
     *
     * @var array
     */
    protected $hidden = [];

    /*
    * 设置不检测时间
    */
    public $timestamps = false;
}
