<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Placard extends Model
{
     /**
     * 设置数据库访问的表
     *
     * @var string
     */
    protected $table = 'zy_placard';

    /**
     * 设置可以分配的属性
     *
     * @var array
     */
    protected $fillable = ['p_title', 'p_content','p_time'];

    /**
     * 要排除不分配的属性
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    /*
    * 设置不检测时间
    */
    public $timestamps = false;
}
