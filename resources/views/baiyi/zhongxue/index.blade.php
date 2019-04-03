<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-language" content="zh-CN"/>
  <meta http-equiv="pragma" content="no-cache"/>
  <meta http-equiv="Cache-Control" content="no-cache">
  <meta http-equiv="expires" content="0"/>
  <meta name="referrer" content="never"/>
  <meta name="renderer" content="webkit"/>
  <meta name="msapplication-tap-highlight" content="no"/>
  <meta name="HandheldFriendly" content="true"/>
  <meta name="x5-page-mode" content="app"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>{{Config::get('app.title')}}</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><!-- 强制使用当前版本的兼容模式 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
  <link rel="stylesheet" href="{{asset('h/css/amazeui.css')}}" />
  <link rel="stylesheet" href="{{asset('h/css/common.min.css')}}" />
  <link rel="stylesheet" href="{{asset('h/css/contact.min.css')}}" />
  <link rel="stylesheet" href="{{asset('h/css/index.min.css')}}" />
  <link rel="stylesheet" href="{{asset('h/css/product.min.css')}}" />
  <link rel="stylesheet" href="{{asset('h/css/solution.min.css')}}" />
  <link rel="stylesheet" href="{{asset('h/css/about.min.css')}}" />
  <link rel="stylesheet" href="{{asset('h/css/news.min.css')}}" />
  <link rel="stylesheet" href="{{asset('h/lunbo/lunbo.css')}}" />
  <link rel="stylesheet" href="{{asset('h/css/join.min')}}.css" />
  <link rel="stylesheet" href="{{asset('h/css/3nav.css')}}"/>
  <link rel="shortcut icon" href="{{asset('h/images/baiyigongfang.ico')}}">
  <!-- 视频播放核心样式 -->
  <link rel="stylesheet" href="{{asset('h/vioe/css/ckin.css')}}" />

<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            /* .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            } */

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                margin-top: 220px;

                padding-left: 0px;
                font-size: 72px;
                margin-bottom: 220px;
            }
        </style>
</head>
<body>
  <div class="layout">
    <!--===========layout-header================-->
    <div class="layout-header am-hide-sm-only">
      <!--topbar start-->
      <div class="topbar">
        <div class="container">
          <div class="am-g">
            <div class="am-u-md-3">
              <div class="topbar-left">
                <i class="am-icon-globe"></i>
                <div class="am-dropdown" data-am-dropdown>
                    <button class="am-btn am-btn-primary am-dropdown-toggle" data-am-dropdown-toggle>欢迎您来到百艺工坊官方网站 </button>
                </div>
              </div>
            </div>
            <div class="am-u-md-9">
              <div class="topbar-right am-text-right am-fr">
                <!-- <a href="{{asset('/baiyi')}}">登录</a> -->
                <!-- <a href="{{asset('/register')}}">注册</a> -->
                <div class="am-dropdown" data-am-dropdown>
                  <!-- <button class="am-btn am-btn-primary am-dropdown-toggle" >个人中心 </button> -->
                  <ul class="am-dropdown-content">
                   <li ><a href="#">账户设置</a></li>
                    <li><a href="{{url('baiyi/logout')}}">退出</a></li>
                  </ul>
                </div>
                <div class="am-dropdown" data-am-dropdown>
                  <button class="am-btn am-btn-primary am-dropdown-toggle" data-am-dropdown-toggle>微信关注我们 <span class="am-icon-caret-down"></span></button>
                  <ul class="am-dropdown-content">
                    <img src="{{url('h/images/weixin.jpg')}}" alt="" />
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--topbar end-->


      <div class="header-box" data-am-sticky>
        <!--header start-->
          <div class="container">
            <div class="header">
              <div class="am-g">
                <div class="am-u-lg-2 am-u-sm-12">
                  <div class="logo">
                    <a href="{{url('/')}}"><img src="{{url('h/images/logo.png')}}" alt="" /></a>
                  </div>
                </div>
                <div class="am-u-md-10">
                  <div class="header-right am-fr">
                    <div class="header-contact">
                    <div class="header_contacts--item">
                        <div class="contact_mini">
                            <i style="color:#c4161c" class="contact-icon am-icon-phone"></i>
                            <strong>400-900-7795</strong>
                            <span>周一~周五, 9:00 - 18:00</span>
                        </div>
                    </div>
                    <div class="header_contacts--item">
                        <div class="contact_mini">
                            <i style="color:#c4161c" class="contact-icon am-icon-envelope-o"></i>
                            <strong>baiyigongfang@163.com</strong>
                            <span>随时欢迎您的来信！</span>
                        </div>
                    </div>
                    <div class="header_contacts--item">
                        <div class="contact_mini">
                            <i style="color:#c4161c" class="contact-icon am-icon-map-marker"></i>
                            <strong>百艺工坊</strong>
                            <span>北京市丰台区科技园百强大道六号院1-60</span>
                        </div>
                    </div>
                    </div>
                      <a href="html/contact.html" class="contact-btn">
                        <button type="button" class="am-btn am-btn-secondary am-radius">联系我们</button>
                      </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!--header end-->
        <!--nav start-->
        <div class="nav-contain">
              <div class="nav-inner">
                <ul class="am-nav am-nav-pills am-nav-justify">
                  <li class=""><a href="{{url('/')}}">首页</a></li>
                  <li><a href="{{url('baiyi/baiyi_dynamic')}}">新闻动态</a>
                  </li>
                  <li><a href="">品牌</a>
                     <!-- sub-menu start-->
                      <ul class="sub-menu">
                        <li class="menu-item"><a href="">品牌故事</a></li>
                        <li class="menu-item"><a href="">企业文化</a></li>
                        <li class="menu-item"><a href="">合作伙伴</a></li>
                      </ul>
                      <!-- sub-menu end-->
                  </li>
                  <li><a href="{{url('baiyi/creator')}}">项目</a>
                    <ul class="sub-menu">
                         <li class="menu-item">
                              <a href="{{url('baiyi/creator')}}" style="padding-right: 0px;padding-left: 5px;">非遗综合实践教室</a>
                                <ul class="sub-menu-3">
                                    <li class="menu-item">
                                      <a href="{{url('baiyi/pottery_workshop')}}">陶工坊</a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="{{url('baiyi/wooden_workshop')}}">木工坊</a>
                                    </li>
                                    <li class="menu-item">
                                      <a href="{{url('baiyi/paper_workshop')}}">纸工坊</a>
                                    </li>
                                    <li class="menu-item">
                                      <a href="{{url('baiyi/farmers_workshop')}}">农工坊</a>
                                    </li>
                                </ul>
                          </li>
                          <li class="menu-item">
                              <a href="{{url('baiyi/base')}}" style="padding-right: 0px;padding-left: 5px;">非遗综合实践基地</a>
                                <ul class="sub-menu-3">
                                    <li class="menu-item">
                                      <a href="{{url('baiyi/mount')}}">新郑泰山基地</a>
                                    </li>
                                    <li class="menu-item">
                                      <a href="{{url('baiyi/zero')}}">归零文化村</a>
                                    </li>
                                    <li class="menu-item">
                                      <a href="{{url('baiyi/paradise')}}" style="padding-right: 0px;padding-left: 5px;">熊大熊二生态乐园</a>
                                    </li>

                                </ul>
                          </li>
                         <!--  <li class="menu-item">
                              <a href="{{url('baiyi/last_term')}}">非遗研学基地</a>
                          </li> -->
                      </ul>
                  </li>
                  <li><a href="{{url('baiyi/young_little')}}">幼教课程</a>
                      <ul class="sub-menu">
                        <li class="menu-item">
                          <a href="{{url('baiyi/young_little')}}">小班</a>
                            <ul class="sub-menu-3">
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_little_ceramic')}}">陶工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_little_timber')}}">木工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_little_paper')}}">纸工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_little_farming')}}">农工坊课程</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                          <a href="{{url('baiyi/young_centre')}}">中班</a>
                            <ul class="sub-menu-3">
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_centre_ceramic')}}">陶工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_centre_timber')}}">木工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_centre_paper')}}">纸工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_centre_farming')}}">农工坊课程</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                          <a href="{{url('baiyi/young_big')}}">大班</a>
                            <ul class="sub-menu-3">
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_big_ceramic')}}">陶工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_big_timber')}}">木工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_big_paper')}}">纸工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_big_farming')}}">农工坊课程</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                          <a href="{{url('baiyi/young_preschool')}}">学前</a>
                            <ul class="sub-menu-3">
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_preschool_ceramic')}}">陶工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_preschool_timber')}}">木工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_preschool_paper')}}">纸工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/young_preschool_farming')}}">农工坊课程</a>
                                </li>
                            </ul>
                        </li>
                      </ul>
                  </li>
                  <li><a href="{{url('baiyi/xiaoxue')}}">小学课程</a>
                  <!--   <ul class="sub-menu">
                       <li class="menu-item">
                          <a href="{{url('baiyi/last_term')}}">上学期</a>
                             <ul class="sub-menu-3">
                                <li class="menu-item">
                                  <a href="{{url('baiyi/last_term/spring_ceramic')}}">陶工坊课程</a>

                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/last_term/spring_timber')}}">木工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/last_term/spring_paper')}}">纸工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/last_term/spring_farming')}}">农工坊课程</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="{{url('baiyi/next_term')}}">下学期</a>
                             <ul class="sub-menu-3">
                                <li class="menu-item">
                                  <a href="./html/Ceramic.html">陶工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="./html/timber.html">木工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="./html/paper.html">纸工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="./html/farming.html">农工坊课程</a>
                                </li>
                            </ul>
                        </li>
                    </ul> -->
                  </li>
                  <li><a href="{{url('baiyi/zhongxue')}}">中学课程</a>
                   <!--  <ul class="sub-menu">
                       <li class="menu-item">
                          <a href="{{url('baiyi/last_term')}}">上学期</a>
                             <ul class="sub-menu-3">
                                <li class="menu-item">
                                  <a href="{{url('baiyi/last_term/spring_ceramic')}}">陶工坊课程</a>

                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/last_term/spring_timber')}}">木工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/last_term/spring_paper')}}">纸工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="{{url('baiyi/last_term/spring_farming')}}">农工坊课程</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="{{url('baiyi/next_term')}}">下学期</a>
                             <ul class="sub-menu-3">
                                <li class="menu-item">
                                  <a href="./html/Ceramic.html">陶工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="./html/timber.html">木工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="./html/paper.html">纸工坊课程</a>
                                </li>
                                <li class="menu-item">
                                  <a href="./html/farming.html">农工坊课程</a>
                                </li>
                            </ul>
                        </li>
                    </ul> -->
                  </li>
                  <li><a href="{{url('baiyi/hardware')}}">技术服务</a>
                     <!-- sub-menu start-->
                      <ul class="sub-menu">
                        <li class="menu-item"><a href="{{url('baiyi/hardware')}}">硬件服务</a></li>
                        <li class="menu-item"><a href="{{url('baiyi/operation')}}">运营服务</a></li>
                        <li class="menu-item"><a href="{{url('baiyi/activity')}}">活动服务</a></li>
                        <li class="menu-item"><a href="{{url('baiyi/skill')}}">技能服务</a></li>
                      </ul>
                      <!-- sub-menu end-->
                  </li>
                  <li><a href="{{url('baiyi/join')}}">加入我们</a>
                   <!--  <ul class="sub-menu">
                        <li class="menu-item"><a href="{{url('baiyi/contact')}}">联系我们</a></li>
                        <li class="menu-item"><a href="{{url('baiyi/join')}}">加入我们</a></li>
                    </ul> -->
                  </li>
                </ul>
              </div>
        </div>
        <!--nav end-->
      </div>
    </div>

    <!--mobile header start-->
    <div class="m-header">
      <div class="am-g am-show-sm-only">
        <div class="am-u-sm-2">
          <div class="menu-bars">
            <a href="#doc-oc-demo1" data-am-offcanvas="{effect: 'push'}">
              <i class="am-menu-toggle-icon am-icon-bars"></i>
            </a>
            <!-- 侧边栏内容 -->
            <nav data-am-widget="menu" class="am-menu  am-menu-offcanvas1" data-am-menu-offcanvas >
              <a href="javascript: void(0)" class="am-menu-toggle"></a>

              <div class="am-offcanvas" >
                <div class="am-offcanvas-bar">
                    <ul class="am-menu-nav am-avg-sm-1">
                        <li><a href="{{url('/')}}" class="" >首页</a></li>
                        <li class="am-parent">
                          <a href="#" class="" >百艺动态</a>
                            <ul class="am-menu-sub am-collapse ">
                                <li class="am-parent">
                                  <a href="html/baiyi_dynamic.html" class="" >百艺动态</a>
                                </li>
                            </ul>
                        </li>
                        <li class="am-parent">
                          <a href="#" class="" >品牌</a>
                             <ul class="am-menu-sub am-collapse ">
                                <li class="">
                                  <a href="{{url('baiyi/brand')}}" class="" >品牌故事</a>
                                </li>
                                <li class="">
                                  <a href="{{url('baiyi/culture')}}" class="" >企业文化</a>
                                </li>
                                <li class="">
                                  <a href="{{url('baiyi/partner')}}" class="" >合作伙伴</a>
                                </li>
                            </ul>
                        </li>
                        <li class="am-parent">
                          <a href="" class="" >项目</a>
                          <ul class="am-menu-sub am-collapse  ">
                                <li class="am-parent">
                                  <a href="" class="" >非遗创客教室</a>
                                  <ul class="am-menu-sub am-collapse  ">
                                      <li class="">
                                        <a href="{{url('baiyi/pottery_workshop')}}" class="" >陶工坊课程</a>

                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/wooden_workshop')}}" class="" >木工坊课程</a>

                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/paper_workshop')}}" class="" >纸工坊课程</a>

                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/young_little_farming')}}" class="" >农工坊课程</a>

                                      </li>
                                   </ul>
                                </li>
                                <li class="am-parent">
                                  <a href="" class="" >非遗综合实践基地</a>
                                    <ul class="am-menu-sub am-collapse  ">
                                      <li class="">
                                        <a href="{{url('baiyi/mount')}}" class="" >新郑泰山教育基地</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/zero')}}" class="" >归零文化村</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/paradise')}}" class="" >熊大熊二生态乐园</a>
                                      </li>

                                   </ul>
                                </li>
                            </ul>
                        </li>
                <li class="am-parent">
                          <a href="" class="" >幼教课程</a>
                            <ul class="am-menu-sub am-collapse  ">
                                <li class="am-parent">
                                  <a href="" class="" >小班</a>
                                  <ul class="am-menu-sub am-collapse  ">
                                      <li class="">
                                        <a href="{{url('baiyi/young_little_ceramic')}}" class="" >陶工坊课程</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/young_little_timber')}}" class="" >木工坊课程</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/young_little_paper')}}" class="" >纸工坊课程</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/young_little_farming')}}" class="" >农工坊课程</a>
                                      </li>
                                   </ul>
                                </li>
                                 <li class="am-parent">
                                  <a href="" class="" >中班</a>
                                  <ul class="am-menu-sub am-collapse  ">
                                      <li class="">
                                        <a href="{{url('baiyi/young_centre_ceramic')}}" class="" >陶工坊课程</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/young_centre_timber')}}" class="" >木工坊课程</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/young_centre_paper')}}" class="" >纸工坊课程</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/young_centre_farming')}}" class="" >农工坊课程</a>
                                      </li>
                                   </ul>
                                </li>
                                 <li class="am-parent">
                                  <a href="" class="" >大班</a>
                                  <ul class="am-menu-sub am-collapse  ">
                                      <li class="">
                                        <a href="{{url('baiyi/young_big_ceramic')}}" class="" >陶工坊课程</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/young_big_timber')}}" class="" >木工坊课程</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/young_big_paper')}}" class="" >纸工坊课程</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/young_big_farming')}}" class="" >农工坊课程</a>
                                      </li>
                                   </ul>
                                </li>
                                 <li class="am-parent">
                                  <a href="" class="" >学前</a>
                                  <ul class="am-menu-sub am-collapse  ">
                                      <li class="">
                                        <a href="{{url('baiyi/young_preschool_ceramic')}}" class="" >陶工坊课程</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/young_preschool_timber')}}" class="" >木工坊课程</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/young_preschool_paper')}}" class="" >纸工坊课程</a>
                                      </li>
                                      <li class="">
                                        <a href="{{url('baiyi/young_preschool_farming')}}" class="" >农工坊课程</a>
                                      </li>
                                   </ul>
                                </li>
                            </ul>
                        </li>
                         <li class=""><a href="{{url('baiyi/xiaoxue')}}" class="" >小学课程</a></li>
                       <li class=""><a href="{{url('baiyi/zhongxue')}}" class="" >中学课程</a></li>
                        <!-- <li class=""><a href="{{url('baiyi/solution')}}" class="" >技术支持</a></li> -->
                        <li class="am-parent">
                          <a href="" class="" >技术服务</a>
                            <ul class="am-menu-sub am-collapse ">
                                <li class="am-parent">
                                  <a href="{{url('baiyi/hardware')}}" class="" >硬件服务</a>
                                </li>
                                <li class="am-parent">
                                  <a href="{{url('baiyi/operation')}}" class="" >运营服务</a>
                                </li>
                                <li class="am-parent">
                                  <a href="{{url('baiyi/activity')}}" class="" >活动服务</a>
                                </li>
                                <li class="am-parent">
                                  <a href="{{url('baiyi/skill')}}" class="" >技能服务</a>
                                </li>
                            </ul>
                        </li>
                        <li class=""><a href="{{url('baiyi/join')}}" class="" >加入我们</a></li>
                       <!--  <li class=""><a href="html/login.html" class="" >登录</a></li>
                        <li class=""><a href="html/register.html" class="" >注册</a></li> -->
                    </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
        <div class="am-u-sm-5 am-u-end">
          <div class="m-logo">
            <a href=""><img src="h/images/logo.png" alt=""></a>
          </div>
      </div>
      </div>
    </div>

        <div class="container">
        <div class="content">
            <div class="title">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp课程正在更新中……敬请期待</div>
        </div>
     </div>






 <!--===========layout-footer================-->
  <div class="layout-footer">
    <div class="footer">
      <div style="background-color:#bb131a" class="footer--bg"></div>
      <div class="footer--inner">
        <div class="container">
          <div class="footer_main">
            <div class="am-g">
              <div class="">
                <div class="footer_main--column">
                  <div class="footer-floor2">
                     <p>Copyright © 2013-2018 baiyigongfang.com. All Rights Reserved. 百艺工坊 版权所有</p>
                      <p></p>
                      <p>

                        <a href="#" target="_blank">京ICP备18036723号-1</a>

                      </p>

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{asset('h/js/jquery-2.1.0.js')}}" charset="utf-8"></script>
  <script src="{{asset('h/js/amazeui.js')}}" charset="utf-8"></script>
  <script src="{{asset('h/js/common.js')}}" charset="utf-8"></script>
  <script src="{{asset('h/lunbo/jquery-1.11.3.min.js')}}" charset="utf-8"></script>
  <script src="{{asset('h/lunbo/wySilder.min.js')}}" charset="utf-8"> </script>
  <script src="{{asset('h/vioe/js/ckin.js')}}" charset="urt-8"></script>
    <script>
      $(function (){
        $(".js-silder").silder({
                auto: true,//自动播放，传入任何可以转化为true的值都会自动轮播
                speed: 20,//轮播图运动速度
                sideCtrl: true,//是否需要侧边控制按钮
                bottomCtrl: true,//是否需要底部控制按钮
                defaultView: 0,//默认显示的索引
                interval: 2000,//自动轮播的时间，以毫秒为单位，默认3000毫秒
                activeClass: "active",//小的控制按钮激活的样式，不包括作用两边，默认active
            });
      });
    </script>
</body>

</html>
