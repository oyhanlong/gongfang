<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // //导航栏数据    分类 $cate_data 
        // $cate_data = self::getCatePid();
        // //链接列表  $link_data
        // $link = new Link;
        // $link_data = $link->all();
        // view()->share('cate_data', $cate_data);
        // view()->share('link_data', $link_data);

        \Carbon\Carbon::setLocale('zh');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
