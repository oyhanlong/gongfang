$(function(){
    // $.ajax({
    //     type: 'POST',
    //     url: 'http://api.taoertao.com',
    //     // url: '/focus',
    //     contentType: "application/x-www-form-urlencoded;charset=utf-8",
    //     success: function(data){

    //         // if(data.success){
    //             // data.result.forEach(function(v, i){
    //             data.forEach(function(v, i){
    //                 $('.rImg').append('<li><a href="'+v.url+'" target="_blank"><img src="http://taoertao.com'+v.image+'" alt="'+v.words+'"></a></li>')
    //                 if(i == 0){
    //                     $('.button').append('<li class="on"></li>')
    //                 }else{
    //                     $('.button').append('<li></li>')
    //                 }
    //             })

                var rImg = $(".rImg li");
                var rButton = $(".button li");
                var focusMap = $(".focusMap");
                var index = 0;
                var interval = 5000;
                var t;
                var count = rImg.length;
                var prevNext = $(".focusMap span");//两个左右切换的按钮
                var prevImg = $(".focusMap .prev");
                var nextImg = $(".focusMap .next");

                focusMap.mouseover(function(){
                    prevNext.show();
                    clearInterval(t);
                }).mouseout(function(){
                    prevNext.hide();
                    t = setInterval(next,interval);
                });
                //隐藏全部
                var hideAll = function(){
                    rImg.hide();
                    rButton.removeClass("on");
                };
                //显示当前
                var showItem = function(){
                    hideAll();
                    $(rImg[index]).fadeIn();
                    $(rButton[index]).addClass("on");
                };
                //下一张
                var next = function(){
                    index += 1;
                    if(index == count){
                        index = 0;
                    } 
                    showItem();
                };

                t = setInterval(next,interval);
                //上一张
                prevImg.click(function(){
                    index -= 1;
                    if(index == -1){
                        index = count - 1;
                    }
                    showItem();
                });
                //下一张
                nextImg.click(function(){
                    index += 1;
                    if(index == count){
                        index = 0;
                    }
                    showItem();
                });

                rButton.each(function(i, n) {
                    $(n).bind("click",function(){
                        index = i;
                        showItem();
                    });
                });
            // }
    //     },
    //     error: function(data){
    //         console.log(data)
    //     }
    // })

    /*分类顶部固定*/
    $(document).scroll(function(){
        if($(document).scrollTop() > 140){

            $('.category').css({
                'position': 'fixed',
                'top': '20px'
            })

            $('.main-box').css('margin-left', '190.8px')
        }else{
            $('.category').removeAttr('style')
            $('.main-box').css('margin-left', '0px')
        }
    })

    /*分类特效*/
    // $('.category ul li a').mouseover(function(){
    //     $(this).find('i').show()
    //     $(this).find('i').animate({
    //         display: 'inline-block',
    //         right: '5px'
    //     }, 300)
    // }).mouseout(function(){
    //     $(this).find('i').stop()
    //     $(this).find('i').css({
    //         display: 'none',
    //         right: '80px'
    //     })

    // })

    /*分页*/
    layui.use(['laypage', 'flow'], function(){
        var laypage = layui.laypage

        laypage({
            cont: 'page'
            ,pages: goodsCount
            ,first: 1
            ,curr: Common.getQuery('p') || 1
            ,prev: '<em><</em>'
            ,next: '<em>></em>'
            ,jump: function(obj, first){
                var curr = obj.curr
                if(!first) location.href = '?' + (Common.getQuery('n') ? 'n=' + Common.getQuery('n') : '') + '&p=' + curr
            }
        });

        layui.flow.lazyimg();
    })
})