<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{Config::get('app.title')}}</title>
 <link rel="stylesheet" href="{{asset('h/login1/css/layui.css')}}" ></script>
      <link rel="stylesheet" href="{{asset('h/login1/css/public.css')}}" >
      <link rel="stylesheet" href="{{asset('h/login1/css/login.css')}}" >
      <script src="{{asset('h/login1/js/jquery-2.1.4.min.js')}}" ></script>
      <link rel="shortcut icon" href="{{asset('h/images/baiyigongfang.ico')}}" />
</head>
<body>
    <div id="header">
        <a ><img src="{{url('h/login1/image/logo.png')}}"  class="logo"></a>
    </div>
    <div id="register-main" class="clearfix">
        <div class="layui-tab layui-tab-brief reg-left fl">

            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show layui-form">
                    <div class="layui-form-item">
                        <input type="text" name="phone" autocomplete="off" id="phone" placeholder="请输入手机号" class="layui-input phoneNum">
                    </div>
                    <div class="layui-form-item">
                        <input type="password" name="password" autocomplete="off" id="pass" placeholder="请输入密码" class="layui-input phoneNum">
                    </div>
                    <div class="layui-form-item forgetpwd">
                        <a href="/forget">忘记密码？</a>
                    </div>
                    <a href="javascript:;" class="layui-btn register-btn">登　录</a>
                </div>
                <!-- <div class="layui-tab-item">内容2</div> -->
            </div>
        </div>
        <div class="reg-right right-box fr">
            <p>没有百艺账号：</p>
            <a href="/register">立即注册</a>
        </div>
    </div>
 <script src="{{asset('h/login1/js/jquery.md5.js')}}" ></script>

    <script src="{{asset('layer/layer.js')}}" ></script>
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
    </script>
    <script>
        $(function(){
            $('.register-btn').click(function(){
                //检测手机号
                if($('#phone').val()=='' ||$('#phone').val() == undefined){
                        $('#phone').focus();
                        return layer.tips('请输入手机号', '#phone');
                    }

                $.ajax({
                url : '/login/dologin',
                type : 'post',
                data : {'phone':$('#phone').val(),'password':$('#pass').val(),},//这里使用json对象
                success : function(data){
                    if(data == 0){
                        layer.msg('该用户不存在,请前去注册');
                    }else if(data == 1){
                        layer.msg('密码错误,请重新输入');
                    }else if(data == 2){
                        layer.msg('登录成功!');
                        setTimeout(function(){
                        location.href = '/'
                        }, 2000)
                    }
                },
                });
            });




        })




    </script>
</body>
</html>