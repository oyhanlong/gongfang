<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{Config::get('app.title')}}</title>
    <link rel="stylesheet" href="{{asset('h/login1/css/layui.css')}}" >
    <link rel="stylesheet" href="{{asset('h/login1/css/public.css')}}" >
    <link rel="stylesheet" href="{{asset('h/login1/css/login.css')}}" >
    <script src="{{asset('h/login1/js/jquery-2.1.4.min.js')}}" ></script>
    <link rel="shortcut icon" href="{{asset('h/images/baiyigongfang.ico')}}" />
</head>
<body>
    <div id="header">
        <a href="http://www.ceshi.com"><img src="{{url('h/login1/image/logo.png')}}"  class="logo"></a>
    </div>
    <div id="register-main" class="clearfix">
        <div class="layui-tab layui-tab-brief reg-left fl">
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show layui-form">
                    <div class="layui-form-item">
                        <input type="text" name="phone" autocomplete="off" id="phone" placeholder="请输入手机号" class="layui-input phoneNum">
                    </div>
                    <div class="layui-form-item captcha" id="code">
                        <input type="text" name="acode" id="acode" autocomplete="off" placeholder="请输入图形验证码" class="layui-input captchaCode">
                        <!-- <a href="javascript:;" class="layui-btn get-captchaCode">获取验证码</a> -->
                        <img class="captchaImage" src="/register/code/1" onclick="this.src='/register/code/'+Math.random()" title="点击刷新" />
                    </div>
                    <div class="layui-form-item phone">
                        <input type="text" name="phoneCode" id="phoneCode" autocomplete="off" placeholder="请输入短信验证码" class="layui-input phoneCode">
                        <!-- <a href="javascript:;" class="layui-btn get-phoneCode" id="style-btn">获取验证码</a> -->
                        <input type="button" class="layui-btn get-phoneCode" value="获取验证码" id="sendbtn">

                    </div>
                    <div class="layui-form-item">
                        <input type="password" name="password" id="pass" autocomplete="off" placeholder="请输入新密码" class="layui-input password">
                    </div>
                    <div class="layui-form-item">
                        <input type="password" name="repassword" id="repass" autocomplete="off" placeholder="请确认新密码" class="layui-input repassword">
                    </div>

                    <a href="javascript:;" class="layui-btn register-btn">修改密码</a>
                </div>
                <!-- <div class="layui-tab-item">内容2</div> -->
            </div>
        </div>
        <div class="reg-right right-box fr">
            <p>已有百艺账号：</p>
            <a href="{{url('baiyi')}}">立即登录</a>
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
            //请求短信验证码
            $('.get-phoneCode').click(function(){
                //检测手机号
                var phoneReg = /^1[3|4|5|7|8][0-9]\d{8}$/;
                if($('#phone').val()=='' ||$('#phone').val() == undefined){
                        $('#phone').focus();
                        return layer.tips('请输入手机号', '#phone');
                    }else if(!phoneReg.test($('#phone').val())){
                        $('#phone').focus();
                        return layer.tips('手机号格式有误', '#phone')
                    }

                //检测图形验证码
                if($('#acode').val() == '' || $('#acode').val() == undefined){
                    $('#acode').focus();
                    return layer.tips('请输入图形验证码', '#acode');
                }

                $.ajax({
                url : '/forget/getverifycode',
                type : 'get',
                data : {'code':$('#acode').val(),'phone':$('#phone').val(),},//这里使用json对象
                success : function(data){
                    if(data == 2){
                        layer.msg('验证码已发送');
                        // console.log(data);
                        countdown();
                    }else if(data == 1){
                        layer.msg('该手机号未注册,请前去注册');
                    }
                        // $('.get-phoneCode').hide();
                        // $('.showbox').show();
                    else if(data == 0){
                        layer.msg('图形验证码错误,或已经被使用过');
                    }
                },
                });
            });

            //修改
            $('.register-btn').click(function(){
                //检测手机号
                var phoneReg = /^1[3|4|5|7|8][0-9]\d{8}$/;
                if($('#phone').val()=='' ||$('#phone').val() == undefined){
                        $('#phone').focus();
                        return layer.tips('请输入手机号', '#phone');
                    }else if(!phoneReg.test($('#phone').val())){
                        $('#phone').focus();
                        return layer.tips('手机号格式有误', '#phone')
                    }

                //检测图形验证码
                if($('#acode').val() == '' || $('#acode').val() == undefined){
                    $('#acode').focus();
                    return layer.tips('请输入图形验证码', '#acode');
                }

                // 检测短信验证码
                if($('#phoneCode').val() == '' || $('#phoneCode').val() == undefined){
                    $('#phoneCode').focus();
                    return layer.tips('请输入短信验证码','#phoneCode');
                }


                // 检测密码
                if($('#pass').val() == '' || $('#pass').val() == undefined){
                    $('#pass').focus();
                    return layer.tips('请输入密码', '#pass');
                }


                // 检测确认密码
                if($('#repass').val() == '' || $('#repass').val() == undefined){
                    $('#repass').focus()
                    return layer.tips('请输入确认密码', '#repass')
                }else if($('#repass').val() != $('#pass').val()){
                    $('#repass').focus();
                    return layer.tips('两次密码不一致,请重新输入', '#repass')
                }

                $.ajax({
                url : '/forget/doforget',
                type : 'post',
                data : {'phone':$('#phone').val(),'password':$('#pass').val(),'phoneCode':$('#phoneCode').val()},//这里使用json对象
                success : function(data){
                    if(data == 0){
                        layer.msg('手机验证码输入有误,请重新输入');
                    }else if(data == 1){
                        layer.msg('修改成功!');
                        setTimeout(function(){
                        location.href = '/baiyi'
                    }, 2000)
                    }
                },
                });
            });

            function countdown(){
                document.getElementById("sendbtn").setAttribute("disabled", true);
                var i = 60;
                var intervalid;
                intervalid = setInterval(function(){
                    i--;
                    document.getElementById("sendbtn").value = i+'秒后重新发送';

                    if(i == 0){
                        document.getElementById("sendbtn").value = '发送验证码';
                        clearInterval(intervalid);
                    }

                }, 1000);


            }
        })




    </script>
</body>
</html>