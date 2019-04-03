<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * 设置数据库访问的表
     *
     * @var string
     */
    protected $table = 'zy_friendlink';

    /**
     * 设置可以分配的属性
     *
     * @var array
     */
    protected $fillable = ['f_name', 'f_address'];

    /**
     * 要排除不分配的属性
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
    * 设置不检测时间
    */
    public $timestamps = false;
}
