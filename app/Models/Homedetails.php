<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homedetails extends Model
{
     /**
     * 设置数据库访问的表
     *
     * @var string
     */
    protected $table = 'zy_userdetails';

    /**
     * 设置可以分配的属性
     *
     * @var array
     */
    protected $fillable = ['sex', 'age','email','photo','nickname','uid'];

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
