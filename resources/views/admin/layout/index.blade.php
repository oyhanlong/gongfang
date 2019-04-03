
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>{{Config::get('app.title')}}</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="{{asset('a/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('a/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link id="base-style" href="{{asset('a/css/style.css')}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{asset('a/css/style-responsive.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('a/info/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('a/info/font/css/font-awesome.min.css')}}">
    <!-- end: CSS -->
    <script type="text/javascript" src="{{asset('js/jquery-1.8.3.min.js')}}"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="/a/http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link id="ie-style" href="/a/css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
        <link id="ie9style" href="/a/css/ie9.css" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="{{asset('a/img/favicon.ico')}}">
    <!-- end: Favicon -->




</head>

<body>
        <!-- start: Header -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="{{url('admin/index')}}"><span><img src="{{url('a/logo/logo.png')}}" alt="百艺工坊" style="margin-top: 2px;width:120px;"/></span></a>

                <!-- start: Header Menu -->
                <div class="nav-no-collapse header-nav">
                    <ul class="nav pull-right">
                        <li class="dropdown hidden-phone">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="/a/#">
                                <i class="icon-bell"></i>
                                <span class="badge red">
                                7 </span>
                            </a>
                        </li>
                        <!-- start: Message Dropdown -->
                        <li class="dropdown hidden-phone">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="/a/#">
                                <i class="icon-envelope"></i>
                                <span class="badge red">
                                4 </span>
                            </a>
                        </li>

                        <!-- start: User Dropdown -->
                        <li class="dropdown">

                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="/a/#">
                                <img style="width:20px;height:20px;" src="http://phvbylvgz.bkt.clouddn.com/{{session('user')['admin_photo']}}">
                                <!-- <i class="halflings-icon white user"></i> -->
                                    @if (is_object(session('user')))
                                    {{session('user')->admin_name}}
                                    @else
                                    {{'xiaoming'}}
                                    @endif
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('admin/pass')}}"><i class="halflings-icon user"></i>修改密码</a></li>
                                <li><a href="{{url('admin/logout')}}"><i class="halflings-icon off"></i>退出登录</a></li>
                            </ul>
                        </li>
                        <!-- end: User Dropdown -->
                    </ul>
                </div>
                <!-- end: Header Menu -->
            </div>
        </div>
    </div>
        <div class="container-fluid-full">
            <div class="row-fluid">
            <!-- start: Main Menu -->
            <div id="sidebar-left" class="span2">
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li>
                            <a class="dropmenu" href="/a/#"><i class="halflings-icon white user"></i><span class="hidden-tablet">用户管理</span></a>
                            <ul>
                                <li><a class="submenu" href="{{url('admin/homeuser')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> 用户列表</span></a></li>
                                <li><a class="submenu" href="{{url('admin/homedetails')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> 用户详情</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li>
                            <a class="dropmenu" href="/a/#"><i class="halflings-icon white user"></i><span class="hidden-tablet"> 管理员管理</span></a>
                            <ul>
                                <li><a class="submenu" href="{{url('admin/adminuser')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> 管理员列表</span></a></li>
                                <li><a class="submenu" href="{{url('admin/adminuser/create')}}"><i class="halflings-icon plus-sign white"></i><span class="hidden-tablet"> 管理员添加</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                 <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li>
                            <a class="dropmenu" href="/a/#"><i class="icon-picture"></i><span class="hidden-tablet">动态管理</span></a>
                            <ul>
                                <li><a class="submenu" href="/admin/carousel"><i class="icon-file-alt"></i><span class="hidden-tablet">动态列表</span></a></li>
                                <li><a class="submenu" href="/admin/carousel/create"><i class="halflings-icon plus-sign white"></i><span class="hidden-tablet"> 添加动态</span></a></li>
                                <li><a class="submenu" href="/admin/carousel/{id}"><i class="halflings-icon trash white"></i><span class="hidden-tablet">动态回收站</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li>
                            <a class="dropmenu" href="/a/#"><i class="icon-group"></i><span class="hidden-tablet">角色管理</span></a>
                            <ul>
                                <li><a class="submenu" href="{{url('admin/role')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">角色列表</span></a></li>
                                <li><a class="submenu" href="{{url('admin/role/create')}}"><i class="halflings-icon plus-sign white"></i><span class="hidden-tablet">添加角色</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li>

                            <a class="dropmenu" href="/#"><i class="icon-unlock"></i><span class="hidden-tablet">权限管理</span></a>
                            <ul>
                                <li><a class="submenu" href="{{url('admin/permission')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">权限列表</span></a></li>
                                <li><a class="submenu" href="{{url('admin/permission/create')}}"><i class="halflings-icon plus-sign white"></i><span class="hidden-tablet">添加权限</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li>
                         <a class="dropmenu" href="/a/#"><i class=" icon-picture "></i><span class="hidden-tablet"> 轮播图管理</span></a>
                            <ul>
                                <li><a class="submenu" href="/admin/question"><i class="icon-file-alt"></i><span class="hidden-tablet"> 轮播图列表</span></a></li>
                                <li><a class="submenu" href="/admin/question/create"><i class="halflings-icon plus-sign white"></i><span class="hidden-tablet"> 轮播图添加</span></a></li>
                                <li><a class="submenu" href="/admin/question/do_delete/{id}"><i class="halflings-icon trash white"></i><span class="hidden-tablet">轮播图回收站</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li>
                            <a class="dropmenu" href="/#"><i class="halflings-icon cog white"></i><span class="hidden-tablet">网站配置</span></a>
                            <ul>
                                <li><a class="submenu" href="/admin/config"><i class="icon-file-alt"></i><span class="hidden-tablet">网站配置列表</span></a></li>
                                <li><a class="submenu" href="/admin/config/create"><i class="halflings-icon plus-sign white"></i><span class="hidden-tablet">网站配置添加</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li>
                            <a class="dropmenu" href="/a/#"><i class="halflings-icon volume-up white"></i><span class="hidden-tablet">系统公告</span></a>
                            <ul>
                                <li><a class="submenu" href="/admin/placard"><i class="icon-file-alt"></i><span class="hidden-tablet">公告列表</span></a></li>
                                <li><a class="submenu" href="/admin/placard/create"><i class="halflings-icon plus-sign white"></i><span class="hidden-tablet">公告添加</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- end: Main Menu -->
            <!-- start: Content -->
            <div id="content" class="span10">
            <!-- 内容开始 -->
            @if(session('success'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{session('error') }}
                </div>
            @endif
            @section('content')

            @show
            <!-- 内容结束 -->
            </div><!--/.fluid-container-->

            <!-- end: Content -->
            </div><!--/#content.span10-->
        </div><!--/fluid-row-->

    <div class="modal hide fade" id="myModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Settings</h3>
        </div>
        <div class="modal-body">
            <p>Here settings can be configured...</p>
        </div>
        <div class="modal-footer">
            <a href="/a/#" class="btn" data-dismiss="modal">Close</a>
            <a href="/a/#" class="btn btn-primary">Save changes</a>
        </div>
    </div>

    <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <ul class="list-inline item-details">
                <li><a href="/a/#">Admin templates</a></li>
                <li><a href="/a/http://themescloud.org">Bootstrap themes</a></li>
            </ul>
        </div>
    </div>

    <div class="clearfix"></div>

    <footer>
        <p>
            <span>{{date('Y-m-d H:i:s')}}</span>
        </p>
    </footer>

    <!-- start: JavaScript-->

        <script src="{{asset('a/js/jquery-1.9.1.min.js')}}"></script>
        <script src="{{asset('a/js/jquery-migrate-1.0.0.min.js')}}"></script>
        <script src="{{asset('a/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
        <script src="{{asset('a/js/jquery.ui.touch-punch.js')}}"></script>
        <script src="{{asset('a/js/modernizr.js')}}"></script>
        <script src="{{asset('a/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('a/js/jquery.cookie.js')}}"></script>
        <script src="{{asset('a/js/fullcalendar.min.js')}}"></script>
        <script src="{{asset('a/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('a/js/excanvas.js')}}"></script>
        <script src="{{asset('a/js/jquery.flot.js')}}"></script>
        <script src="{{asset('a/js/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('a/js/jquery.flot.stack.js')}}"></script>
        <script src="{{asset('a/js/jquery.flot.resize.min.js')}}"></script>
        <script src="{{asset('a/js/jquery.chosen.min.js')}}"></script>
        <script src="{{asset('a/js/jquery.uniform.min.js')}}"></script>
        <script src="{{asset('a/js/jquery.cleditor.min.js')}}"></script>
        <script src="{{asset('a/js/jquery.noty.js')}}"></script>
        <script src="{{asset('a/js/jquery.elfinder.min.js')}}"></script>
        <script src="{{asset('a/js/jquery.raty.min.js')}}"></script>
        <script src="{{asset('a/js/jquery.iphone.toggle.js')}}"></script>
        <script src="{{asset('a/js/jquery.uploadify-3.1.min.js')}}"></script>
        <script src="{{asset('a/js/jquery.gritter.min.js')}}"></script>
        <script src="{{asset('a/js/jquery.imagesloaded.js')}}"></script>
        <script src="{{asset('a/js/jquery.masonry.min.js')}}"></script>
        <script src="{{asset('a/js/jquery.knob.modified.js')}}"></script>
        <script src="{{asset('a/js/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('a/js/counter.js')}}"></script>
        <script src="{{asset('a/js/retina.js')}}"></script>
        <script src="{{asset('a/js/custom.js')}}"></script>
        <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
    <!-- end: JavaScript-->

</body>
</html>
