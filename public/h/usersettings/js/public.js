/**
 * Created by Administrator on 2016/8/22.
 */
   //个人中心公共单选  复选框
$.fn.ui_radio=function ($fn) {
   var _obj=$(this);
   _obj.find('span').on('click',function(){
       var _this=$(this);
       if(_this.find('.on').length==1){
           return false;
       }
       else{
           _obj.find('.on').removeClass('on');
           _obj.find('input').prop('checked',false);
           _this.find('i').addClass('on');
           _this.find('input').prop('checked',true);
           if($fn){
               $fn();
           }
       }
   });
}
$.fn.ui_checkbox=function () {
   var _obj=$(this);
   _obj.find('span').on('click',function(){
       var _this=$(this);
       if(_this.find('.on').length==1){
           _this.find('i').removeClass('on');
           _this.find('input').prop('checked',false);
       }
       else{
           _this.find('i').addClass('on');
           _this.find('input').prop('checked',true);
       }
   });
}
//选项卡切换
function table_card(s_title,s_content){
s_title.click(function(e){
    var _this=$(this);
    var _index=_this.attr('o_index')||_this.index();
    if(!_this.hasClass('active')){
        _this.addClass('active').siblings('.active').removeClass('active');
        if(s_content!=''){
            s_content.removeClass('active').eq(_index).addClass('active');
        }
    }
});
}
/****设备宽度过小***/
if(screen.width<1200) {
    var first_Class = $('body').children();
    first_Class.each(function () {
        if ($(this).find('.w1200').length) {
            $(this).css('minWidth', '1200px');
        }
    })
}

$(function () {
    //搜索切换
    if($('.m_sear_t span').length){
        $('.m_sear_t span').click(function() {
            var _this = $(this);
            _this.parents('.m_sear_box').find('.search form').attr('action', _this.attr('data_url'));
            _this.addClass('active').siblings().removeClass('active');
            _this.parents('.m_sear_t').siblings('.search').find('input[type="text"]').attr("placeholder",'请输入' + _this.text() + '关键字');
        });

        $('.search .s_btn').click(function () {
           if($(this).closest("form").find("input[name='key']").val() == ""){
              window.location.href = $(this).closest("form").attr("action");
              return false;
           };
        });

    }
        //如果scroll_absolute方法不存在,会报错
    try {
        //自定义滚动条
        if($('.menu_right .div_scroll').length){
            $('.menu_right .div_scroll').scroll_absolute({
                arrows:false
            });
        }
    }catch (e){

    }


    if($('.servicesExp .type_checkbox').length){
        $('.servicesExp .type_checkbox').click(function () {
            var $this = $(this).find('i');
            var input = $(this).find('input');
            $this.toggleClass('on');
            if($this.hasClass('on')){
                input.prop('checked',true);
            }
            else{
                input.prop('checked',true);
            }
        })
    }
  //底部悬浮
  $(document).on('click', '.www-scroll-top-button-container',function() {
        $('html,body').animate({
            scrollTop:0,
        })
    });
    $(window).scroll(function () {
        if($(window).scrollTop()>0){
            $('.www-scroll-top-button-container').show();
        }
        else{
            $('.www-scroll-top-button-container').hide();
        }
    })
});
