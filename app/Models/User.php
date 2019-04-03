<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     /**
     * 设置数据库访问的表
     *
     * @var string
     */
    protected $table = 'zy_user';

    /**
     * 设置可以分配的属性
     *
     * @var array
     */
    protected $guarded = [];

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

    public $primaryKey = 'id';

}
