$(function(){

  	//首次加载图形验证
  	Common.getCaptcha()
  	//点击刷新图片验证码
  	$('.captchaImage').click(function(){
  		Common.getCaptcha()
  	})

  	//请求短息验证码
  	$('.get-phoneCode').click(function(){
  		//检测手机号
  		var phoneReg = /^1[3|4|5|7|8][0-9]\d{8}$/
  		if($('.phoneNum').val() == '' || $('.phoneNum').val() == undefined){
  			$('.phoneNum').focus()
  			return layer.tips('请输入手机号', '.phoneNum')
  		}else if(!phoneReg.test($('.phoneNum').val())){
  			$('.phoneNum').focus()
  			return layer.tips('手机号格式有误', '.phoneNum')
  		}
  		//检测图形验证码
  		if($('.captchaCode').val() == '' || $('.captchaCode').val() == undefined){
  			$('.captchaCode').focus()
  			return layer.tips('请输入图形验证码', '.captchaCode')
  		}
  		var url = '/user/get_verify_code'
		var Data = {
			phonenum: $('.phoneNum').val(),
			captcha: $('.captchaCode').val(),
			id: $('.captchaImage').attr('data-id'),
			type: 2
		}
		Common.ajax(url, Data, function (data) {
		    if(data.success){
		        layer.msg(data.msg)
		        $('.get-phoneCode').hide()
		        $('.showbox').show()
		        Common.time()
		    }else{
		        layer.msg(data.msg)
		    }
		}, function (err) {
		    console.log(err)
		}, function (){}, true, 'POST')
  	})

  	//注册
  	$('.register-btn').click(function(){
  		//检测手机号
  		var phoneReg = /^1[3|4|5|7|8][0-9]\d{8}$/
  		if($('.phoneNum').val() == '' || $('.phoneNum').val() == undefined){
  			$('.phoneNum').focus()
  			return layer.tips('请输入手机号', '.phoneNum')
  		}else if(!phoneReg.test($('.phoneNum').val())){
  			$('.phoneNum').focus()
  			return layer.tips('手机号格式有误', '.phoneNum')
  		}
  		//检测图形验证码
  		if($('.captchaCode').val() == '' || $('.captchaCode').val() == undefined){
  			$('.captchaCode').focus()
  			return layer.tips('请输入图形验证码', '.captchaCode')
  		}

  		//检测短息验证码
  		if($('.phoneCode').val() == '' || $('.phoneCode').val() == undefined){
  			$('.phoneCode').focus()
  			return layer.tips('请输入短信验证码', '.phoneCode')
  		}

  		//检测密码
  		if($('.password').val() == '' || $('.password').val() == undefined){
  			$('.password').focus()
  			return layer.tips('请输入密码', '.password')
  		}

  		//检测用户协议
  		if($('.checkbox[name=checkbox]:checked').length != 1){
  			return layer.tips('请同意《淘二淘用户协议》', '.checkbox')
  		}

  		var url = '/user/register'
		var Data = {
			phone_number: $('.phoneNum').val(),
			password: $.md5($('.password').val()),
			phoneCode: $('.phoneCode').val(),
			reg_ip: returnCitySN.cip
		}
		Common.ajax(url, Data, function (data) {
		    if(data.success){
		        layer.msg(data.msg)
		        setTimeout(function(){
		        	location.href = '/login'
		        }, 2000)
		    }else{
		        layer.msg(data.msg)
		    }
		}, function (err) {
		    console.log(err)
		}, function (){}, true, 'POST')
  	})

})