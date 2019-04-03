<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// Route::get('/', function () {
//     return view('welcome');
// });

//验证码路由
Route::get('/code','CodeController@index');
//后台登录路由
Route::get('/admin','Admin\LoginController@index');
//处理后台登录
Route::post('/admin/login','Admin\LoginController@do_login');
//后台标签二级分类
    Route::get('/admin/tag/fenlei','Admin\TagController@fenlei');
//后台路由组
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['login','hasrole']],function(){
    //后台主页
    Route::get('index','IndexController@index');
    //退出登录
    Route::get('logout','IndexController@logout');
    //修改密码
    Route::get('pass','IndexController@pass');
    Route::post('pass','IndexController@dopass');
    //处理上传头像
    Route::post('upload','AdminUserController@upload');
    //管理员管理
    Route::resource('adminuser','AdminUserController');


    Route::get('admin_name','AdminUserController@admin_name');
    Route::get('admin_email','AdminUserController@admin_email');
    //网站配置路由
    Route::resource('config','ConfigController');
    //网站配置logo
    Route::post('uploads','ConfigController@uploads');
    //网站修改logo
    Route::post('config/edit/{id}','ConfigController@config');
    // 后台友情链接
    Route::resource('link','LinkController');
    // 后台分类管理
    Route::get('category/add/{id}','CategoryController@add');
    Route::resource('category','CategoryController');

    // 后台标签管理
    Route::resource('tag','TagController');
    //后台标签二级分类
    Route::get('/admin/tag/fenlei','Admin\TagController@fenlei');
    //后台问题管理路由
    Route::resource('question','QuestionController');
    //后台问题回收站
    Route::get('question/delete/{id}','QuestionController@delete');
    //展示回收站
    Route::get('question/do_delete/{id}','QuestionController@do_delete');
    //还原回收站的问题
    Route::get('question/do_history/{id}','QuestionController@do_history');


    //后台回复管理路由
    Route::resource('answer','AnswerController');
    //展示回复回收站
    Route::get('history','AnswerController@history');
    //还原回收站的回复
    Route::get('answer/do_history/{id}','AnswerController@do_history');

    //角色路由
    Route::resource('role','RoleController');
    Route::post('role/auth','RoleController@auth');
    //权限路由
    Route::resource('permission','PermissionController');
    Route::post('adminuser/auth','AdminUserController@auth');


    //后台动态路由管理
    Route::resource('carousel','CarouselController');
    //后台动态上传路由
    Route::post('carousel/upload','CarouselController@upload');
    //后台动态修改logo
    Route::post('carousel/edit/{id}','CarouselController@do_delete');
    //后台动态放入回收站
    Route::get('carousel/do_history/{id}','CarouselController@do_history');
    //后台动态还原
    Route::get('carousel/delete/{id}','CarouselController@delete');
    //后台动态删除
    Route::get('carousel/delete_lunbo/{id}','CarouselController@delete_lunbo');

    // 后台 公告模块
    Route::resource('placard','PlacardController');

    //前台(后台)用户
    Route::resource('homeuser','HomeuserController');

    //前台(后台)用户详情
    Route::resource('homedetails','HomedetailsController');

    // 后台 用户反馈及建议
    Route::resource('suggest','SuggestController');
});

//-------------------home--------------------------------------------

//前台登录
    // Route::get('/baiyi','Baiyi\LoginController@index');

//前台执行登录路由
    // Route::post('/login/dologin','Baiyi\LoginController@doLogin');


//前台注册页面路由
    // Route::get('/register','Baiyi\RegisterController@index');

//前台验证码路由
    // Route::get('/register/code/{tmp}','Baiyi\RegisterController@code');
//ajax发送验证码到后台路由
    // Route::get('/register/getverifycode','Baiyi\RegisterController@getVerifyCode');
//ajax发送数据到后台并保存到数据库
    // Route::get('/register/doregister','Baiyi\RegisterController@doRegister');
//前台执行修改密码逻辑路由
    // Route::post('/forget/doforget','Baiyi\ForgetController@doForget');
//前台登录
    // Route::get('/baiyi','Baiyi\LoginController@index');

//忘记密码路由
    // Route::get('/forget','Baiyi\ForgetController@index');

//前台修改密码验证码路由
    // Route::get('/forget/getverifycode','Baiyi\ForgetController@getVerifyCode');


//前台协议
    // Route::get('/baiyi/deal','Baiyi\RegisterController@deal');



//加载前台主页面
    Route::resource('/','Baiyi\IndexController');
//加载陶工坊页面
    Route::get('/baiyi/pottery_workshop','Baiyi\WorkshopController@pottery_workshop');
//加载木工坊页面
    Route::get('/baiyi/wooden_workshop','Baiyi\WorkshopController@wooden_workshop');
//加载纸工坊页面
    Route::get('/baiyi/paper_workshop','Baiyi\WorkshopController@paper_workshop');
//加载农工坊页面
    Route::get('/baiyi/farmers_workshop','Baiyi\WorkshopController@farmers_workshop');

//加载创客教室页面
    Route::get('baiyi/creator','Baiyi\WorkshopController@creator');

//加载动态新闻页面
    Route::get('/baiyi/baiyi_dynamic','Baiyi\DynamicController@baiyi_dynamic');

//加载技术支持页面
    Route::get('/baiyi/solution','Baiyi\SolutionController@solution');

//加载关于我们页面
    Route::get('/baiyi/about','Baiyi\AboutController@about');

//加载联系我们页面
    Route::get('/baiyi/contact','Baiyi\ContactController@contact');

//加载联系我们页面
    Route::get('/baiyi/join','Baiyi\ContactController@join');

//加载培训视频页面
    Route::get('/baiyi/cultivate','Baiyi\CultivateController@index');

//加载幼教课程小班页面
    Route::get('/baiyi/young_little','Baiyi\YoungController@young_little');

    //加载幼教课程小班陶工坊页面
        Route::get('/baiyi/young_little_ceramic','Baiyi\LittleController@young_little_ceramic');

    //加载幼教课程小班木工坊页面
        Route::get('/baiyi/young_little_timber','Baiyi\LittleController@young_little_timber');

    //加载幼教课程小班纸工坊页面
        Route::get('/baiyi/young_little_paper','Baiyi\LittleController@young_little_paper');

    //加载幼教课程小班农工坊页面
        Route::get('/baiyi/young_little_farming','Baiyi\LittleController@young_little_farming');

//加载幼教课程中班页面
    Route::get('/baiyi/young_centre','Baiyi\YoungController@young_centre');

    //加载幼教课程中班陶工坊页面
        Route::get('/baiyi/young_centre_ceramic','Baiyi\CentreController@young_centre_ceramic');

    //加载幼教课程中班木工坊页面
        Route::get('/baiyi/young_centre_timber','Baiyi\CentreController@young_centre_timber');

    //加载幼教课程中班纸工坊页面
        Route::get('/baiyi/young_centre_paper','Baiyi\CentreController@young_centre_paper');

    //加载幼教课程中班农工坊页面
        Route::get('/baiyi/young_centre_farming','Baiyi\CentreController@young_centre_farming');


//加载幼教课程大班页面
    Route::get('/baiyi/young_big','Baiyi\YoungController@young_big');

    //加载幼教课程大班陶工坊页面
        Route::get('/baiyi/young_big_ceramic','Baiyi\BigController@young_big_ceramic');

    //加载幼教课程大班木工坊页面
        Route::get('/baiyi/young_big_timber','Baiyi\BigController@young_big_timber');

    //加载幼教课程大班纸工坊页面
        Route::get('/baiyi/young_big_paper','Baiyi\BigController@young_big_paper');

    //加载幼教课程大班农工坊页面
        Route::get('/baiyi/young_big_farming','Baiyi\BigController@young_big_farming');


//加载幼教课程学前页面
    Route::get('/baiyi/young_preschool','Baiyi\YoungController@young_preschool');

    //加载幼教课程学前陶工坊页面
        Route::get('/baiyi/young_preschool_ceramic','Baiyi\PreschoolController@young_preschool_ceramic');

    //加载幼教课程学前木工坊页面
        Route::get('/baiyi/young_preschool_timber','Baiyi\PreschoolController@young_preschool_timber');

    //加载幼教课程学前纸工坊页面
        Route::get('/baiyi/young_preschool_paper','Baiyi\PreschoolController@young_preschool_paper');

    //加载幼教课程学前农工坊页面
        Route::get('/baiyi/young_preschool_farming','Baiyi\PreschoolController@young_preschool_farming');

//加载小学课程页面
    Route::get('baiyi/xiaoxue','Baiyi\XiaoxueController@index');

//加载中学课程页面
    Route::get('baiyi/zhongxue','Baiyi\ZhongxueController@index');

//加载品牌故事页面
    Route::get('baiyi/brand','Baiyi\BrandController@brand');

//加载企业文化页面
    Route::get('baiyi/culture','Baiyi\BrandController@culture');

//加载合作伙伴页面
    Route::get('baiyi/partner','Baiyi\BrandController@partner');

//加载技能服务页面
    Route::get('baiyi/hardware','Baiyi\ServiceController@hardware');

//加载运营服务页面
    Route::get('baiyi/operation','Baiyi\ServiceController@operation');

//加载活动服务页面
    Route::get('baiyi/activity','Baiyi\ServiceController@activity');

//加载技能服务页面
    Route::get('baiyi/skill','Baiyi\ServiceController@skill');

//处理前台退出登录
    Route::get('/baiyi/logout','Baiyi\IndexController@logout');

//加载泰山基地路由基地
    Route::get('baiyi/mount','Baiyi\BaseController@mount');

//加载归零文化村
    Route::get('baiyi/zero','Baiyi\BaseController@zero');

//加载生态乐园路由
    Route::get('baiyi/paradise','Baiyi\BaseController@paradise');

//加载综合实践基地路由基地
    Route::get('baiyi/base','Baiyi\BaseController@base');

// // 前台路由组判断是否登录
// Route::group(['middleware'=>['Homelogin']],function(){





//         //前台回复路由
//         Route::resource('home/answer','Home\AnswerController');
//         //前台问题路由展示
//         Route::resource('/home/question','Home\QuestionController');
//         //前台处理提交回答
//         Route::post('/home/answer','Home\AnswerController@store');
//         //前台个人中心--我的问题
//         Route::get('/home/user/question','Home\UserController@question');

//         //前台个人中心--我的回答
//         Route::get('/home/user/answer','Home\UserController@answer');

//         //前台个人中心--成长与徽章
//         Route::get('/home/user/grow','Home\UserController@grow');

//         //前台个人中心--修改设置
//         Route::get('/home/user/modify','Home\UserController@modify');

//         //前台个人中心--账号设置
//         Route::get('/home/usersettings/index','Home\UsersettingsController@index');

//         //前台个人中心--基本设置
//         Route::get('/home/usersettings/edit','Home\UsersettingsController@edit');
//         Route::post('/home/usersettings/doedit','Home\UsersettingsController@doedit');

//         //前台个人中心--头像设置
//         Route::get('/home/usersettings/photos','Home\UsersettingsController@photos');
//         Route::post('/home/usersettings/dophotos','Home\UsersettingsController@dophotos');

//         //前台个人中心--头像设置
//         Route::get('/home/usersettings/photos','Home\UsersettingsController@photos');
//         Route::post('/home/usersettings/dophotos','Home\UsersettingsController@dophotos');
//         //前台个人中心--账户安全
//         Route::get('/home/usersettings/security','Home\UsersettingsController@security');
//         //修改密码
//         Route::get('/home/usersecurity/userpass','Home\UsersettingsController@userpass');

//         Route::post('/home/usersecurity/passedit','Home\UsersettingsController@passedit');

//         Route::post('/home/usersecurity/passcomplete','Home\UsersettingsController@passcomplete');

//         //修改手机
//         Route::get('/home/usersecurity/userphone','Home\UsersettingsController@userphone');

//         Route::post('/home/do_phone_edit','Home\UsersettingsController@do_phone_edit');

//         Route::post('/home/usersecurity/phonecomplete','Home\UsersettingsController@phonecomplete');

//         //修改邮箱
//         Route::get('/home/usersecurity/useremail','Home\UsersettingsController@useremail');

//         Route::post('/home/usersecurity/emailedit','Home\UsersettingsController@emailedit');


//         Route::post('/home/usersecurity/emailcomplete','Home\UsersettingsController@emailcomplete');

// });
//  // 前台 用户反馈及建议
// Route::resource('/home/suggest','Home\SuggestController');
// // 前台 用户反馈图片
// Route::post('/home/upload','Home\SuggestController@upload');

// // Route::get('/{id}','Home\IndexController@show');

// // 前台公告内容显示
// Route::get('/{id}','Home\IndexController@showPlacard');
// // 前台用户中心.排行
// Route::get('/home/userdetail/{id}','Home\IndexController@showDetail');

// Route::post('/home/usersettings/dophotos','Home\UsersettingsController@dophotos');


// Route::post('/home/usersettings/doedit','Home\UsersettingsController@doedit');



















