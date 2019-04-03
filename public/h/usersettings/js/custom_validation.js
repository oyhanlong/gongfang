/**
 * Created by longyunrui on 2016/10/8.
 */

//手机号码验证js
function check_mobile(mobile) {
    var check_result = '';
    if(mobile.length==0)
    {
        check_result = '请输入手机号码！';
        return check_result;
    }
    var myreg = /^(?=\d{11}$)^1(?:3\d|4[57]|5[^4\D]|7[^249\D]|8\d)\d{8}$/;
    if(!myreg.test(mobile))
    {
        check_result = '请输入有效的手机号码！';
        return check_result;
    }
    return 200;
}

//密码验证js(只验证密码长度6-16位)
function check_password(password) {
    var check_result = password.length;
    if(check_result < 6 || check_result > 16){
        check_result = '密码长度只能是6-16位！';
        return check_result;
    }
    return 200;
}

//确认密码验证js(只验证密码长度6-16位)
function check_confirm_password(password,confirm_pass) {
    if(password != confirm_pass){
        return '确认密码与密码不一致！';
    }
    return 200;
}

//验证提示信息显示方法
function doreg_tips(_this,_str) {
    var _check = _this.children().length;
    if(_check == 0){
        _this.append(_str);
    }else{
        _this.empty();
        _this.append(_str);
    }
}

//验证提示信息隐藏方法
function doreg_tips_hide(_this) {
    _this.empty();
}

//邮箱规范验证
function check_email(email) {
    var myreg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    if(!myreg.test(email)){
        return "请输入有效的邮箱地址！";
    }
    return 200;
}

//检查qq是否是纯数字
function check_qq(qq) {
    if(!$.isNumeric(qq)){
        return "请输入正确的qq号";
    }
    return 200;
}
