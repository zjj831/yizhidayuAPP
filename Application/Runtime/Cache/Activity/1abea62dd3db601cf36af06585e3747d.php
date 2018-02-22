<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta https-equiv="X-UA-Compatible" content="ie=edge">
    <script src='/test/Public/Activity/common/js/jquery.min.js'></script>
    <script src='/test/Public/Activity/common/js/intercept.js?version=1.2'></script>
    <script>
        //intercept page
        intercept('<?php echo ($member_id); ?>','<?php echo ($intercept); ?>');
        //font resize standard for iphone6
        $(window).width()>540?$('html').css('font-size',''+540/375*312.5+'%'):$('html').css('font-size',''+$(window).width()/375*312.5+'%');
        window.onresize = function(){$(window).width()>540?$('html').css('font-size',''+540/375*312.5+'%'):$('html').css('font-size',''+$(window).width()/375*312.5+'%')};
    </script>
    <script src="/test/Public/Activity/14_xie_zhua/js/loading.js"></script>
    <link rel="stylesheet" href="/test/Public/Activity/common/css/1031_common.css">

    <link rel="stylesheet" href="/test/Public/Activity/42_dug_whackMole/css/index_001.css">
    <link rel="stylesheet" href="/test/Public/Activity/common/css/swiper.css">
    <script src="/test/Public/Activity/common/js/jquery.fly.min.js"></script>
    <script src="/test/Public/Activity/common/js//swiper.min.js"></script>
    <title><?php echo ($tempInfo['title']); ?></title>
    <!-- Baidu Statistics -->
    <script src="/test/Public/Activity/common/js/baidu-census.js"></script> 
</head>
<body>
    <section class="box" style="background-image:url(https://yun.yizhidayu.com/42-whackMole-bg.jpg);background-size:100% 100%;background-repeat: no-repeat;">
        <!--/**中奖公式**/-->
        <img class="prize-scale" src="https://yun.yizhidayu.com/prize-common-btn.png" alt="">
        <div class="prize-z">
            <div class="prize-c">
                <div class="prize-btn">
                    <span>中奖用户</span>
                    <span>中奖奖品</span>
                </div>
                <div class="ul">
                    <ul>
                        <li>
                            <div>153****7204</div>
                            <div>0.19元支付宝红包</div>
                        </li>
                        <li>
                            <div>189****7725</div>
                            <div>0.26元支付宝红包</div>
                        </li>
                        <li>
                            <div>180****3195</div>
                            <div>2.36元支付宝红包</div>
                        </li>
                        <li>
                            <div>游客</div>
                            <div>0.54元支付宝红包</div>
                        </li>
                        <li>
                            <div>150****6065</div>
                            <div>0.39元支付宝红包</div>
                        </li>
                        <li>
                            <div>游客</div>
                            <div>1.91元支付宝红包</div>
                        </li>
                        <li>
                            <div>151****8010</div>
                            <div>0.48元支付宝红包</div>
                        </li>
                        <li>
                            <div>180****6114</div>
                            <div>2.6元支付宝红包</div>
                        </li>
                        <li>
                            <div>186****6596</div>
                            <div>0.3元支付宝红包</div>
                        </li>
                        <li>
                            <div>150****6065</div>
                            <div>0.18元支付宝红包</div>
                        </li>
                        <li>
                            <div>游客</div>
                            <div>0.32元支付宝红包</div>
                        </li>
                        <li>
                            <div>151****8010</div>
                            <div>0.31元支付宝红包</div>
                        </li>

                        <!--第二遍-->


                        <li>
                            <div>153****7204</div>
                            <div>0.19元支付宝红包</div>
                        </li>
                        <li>
                            <div>189****7725</div>
                            <div>0.26元支付宝红包</div>
                        </li>
                        <li>
                            <div>180****3195</div>
                            <div>2.36元支付宝红包</div>
                        </li>
                        <li>
                            <div>游客</div>
                            <div>0.54元支付宝红包</div>
                        </li>
                        <li>
                            <div>150****6065</div>
                            <div>0.39元支付宝红包</div>
                        </li>
                        <li>
                            <div>游客</div>
                            <div>1.91元支付宝红包</div>
                        </li>
                        <li>
                            <div>151****8010</div>
                            <div>0.48元支付宝红包</div>
                        </li>
                        <li>
                            <div>180****6114</div>
                            <div>2.6元支付宝红包</div>
                        </li>
                        <li>
                            <div>186****6596</div>
                            <div>0.3元支付宝红包</div>
                        </li>
                        <li>
                            <div>150****6065</div>
                            <div>0.18元支付宝红包</div>
                        </li>
                        <li>
                            <div>游客</div>
                            <div>0.32元支付宝红包</div>
                        </li>
                        <li>
                            <div>151****8010</div>
                            <div>0.31元支付宝红包</div>
                        </li>
                    </ul>
                </div>
                <img src="https://yun.yizhidayu.com/prize-common-delete.png" alt="" class="prize-delete">
            </div>
        </div>




        <!--蛋蛋-->
        <section class="dugzhezhao"></section>
        <section class="dug">
            <div>
                <img class="one" src="https://yun.yizhidayu.com/42-whackMole-hide.png" alt="">
            </div>
            <div>
                <img class="two" src="https://yun.yizhidayu.com/42-whackMole-hide.png" alt="">
            </div>
            <div>
                <img class="three" src="https://yun.yizhidayu.com/42-whackMole-hide.png" alt="">
            </div>
            <div>
                <img class="four" src="https://yun.yizhidayu.com/42-whackMole-hide.png" alt="">
            </div>
            <div>
                <img class="five" src="https://yun.yizhidayu.com/42-whackMole-hide.png" alt="">
            </div>
            <div>
                <img class="six" src="https://yun.yizhidayu.com/42-whackMole-hide.png" alt="">
            </div>
        </section>
        <!--//抽奖机会-->
        <div class="font">
            <p>您还有&nbsp;<span><?php echo ($times); ?></span>&nbsp;次抽奖机会</p>
        </div>
        <!--//奖品列表-->
        <img src="https://yun.yizhidayu.com/42-whackMole-hummer.png" alt="" class="hummer">
        <img src="https://yun.yizhidayu.com/common_price_21.png" alt="" class="price">
        <div class="swiper-container" id="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="photo" src="https://yun.yizhidayu.com/42-whackMole-price1.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="photo" src="https://yun.yizhidayu.com/42-whackMole-price2.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="photo" src="https://yun.yizhidayu.com/42-whackMole-price3.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="photo" src="https://yun.yizhidayu.com/42-whackMole-price4.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="photo" src="https://yun.yizhidayu.com/41-jian-price6.png" alt="">
                </div>
            </div>
        </div>
        <div class="pop2" style="z-index:100;">
            <div class="velocity">
                <div class="tomorrow">
                    <img style="position:absolute;top:0;left:0;bottom:0;right:0;margin:auto;" src="https://yun.yizhidayu.com/common_end_21.png" alt="">
                </div>
                <section class="activetwo">
                    <img class="bg_two" src="https://yun.yizhidayu.com/common_two_21.png" alt="">
                    <a href="" class="boxone">
                        <img src="" alt="" class="active1">
                    </a>
                    <a href="" class="boxtwo">
                        <img src="" alt="" class="active2">
                    </a>
                    <img class="delete" src="https://yun.yizhidayu.com/common_pop2_close_21.png" alt="">
                </section>
                <section class="activeone">
                    <img class="bg_two" src="https://yun.yizhidayu.com/common_two_21.png" alt="">
                    <a href="" class="boxone">
                        <img src="" alt="" class="active1">
                    </a>
                    <img class="delete" src="https://yun.yizhidayu.com/common_pop2_close_21.png" alt="">
                </section>
            </div>
        </div>
        <!--//券的相关信息-->
        <div class="zhezhao">
            <img class="light" src="https://yun.yizhidayu.com/42-whackMole-tclight.png" alt="">
            <div class="quan" style="background:url(https://yun.yizhidayu.com/42-whackMole-tcbgnew.png);background-size:100% 100%;background-repeat: no-repeat;">
                <img src="https://yun.yizhidayu.com/42-whackMole-tcdelete.png" alt="" class="delete" id="delete">
                <section class="name"></section>
                <div class="linkone">
                    <img src="" alt="" class="quanimg">
                </div>
                <div class="linktwo">
                    <img src="https://yun.yizhidayu.com/42-whackMole-tcbtn.png" alt="">
                </div>
            </div>
        </div>
        <!--规则内容-->
        <div class="zhezhao2"></div>
        <div class="rule_content">
            <div class="rulefont">
                <h2><span></span>&nbsp;活动说明&nbsp;<span></span></h2>
                <p>妈妈再也不担心我的话费啦<br>
                    <br>
                    活动说明：参与活动即有机会获得幸运大奖，每天有<?php echo ($tempInfo['times']); ?>次免费抽奖机会。此活动为概率中奖，奖品数量有限<br>
                    <br>
                    惊喜一：200元话费<br>
                    惊喜二：100元话费<br>
                    惊喜三：50元话费<br>
                    惊喜四：5元红包<br>
                    惊喜五：红包福袋<br>
                    兑换项和活动均与设备生产商Apple lnc.无关</p>
            </div>
            <!--规则-->
            <div class="rule" style="background:url(https://yun.yizhidayu.com/42-whackMole-rule.png);background-size:100% 100%;background-repeat: no-repeat;">
            </div>
        </div>
        <!--我的奖品-->
        <a class="myprice" href="/test/index.php/Activity/Active/prize_list/member_id/<?php echo ($member_id); ?>">
            <span>我的奖品</span>
        </a>

        <!--//跳转页面-->
        <div class="jump" data-href="" style="display: none;"></div>
        <!--//用户点击领券发送ajax-->
        <div class="sendajax" style="display: none;"></div>
        <!--//用户的id-->
        <div class="userid" style="display: none;"></div>
    </section>
    <div class="sekuai">*奖品和活动均与设备生产商Apple Inc.无关</div>


</body>
</html>
<script>
    if(localStorage.aa42){
        $(".prize-scale").removeClass("scale-move").css("left", "-0.5rem");
    }else{
        localStorage.aa42="yes";
        $(".prize-scale").addClass("scale-move");
    }
    //点击奖品的球球中奖公式出现
    $(".prize-scale").on("touchend",function(){
        $(".prize-z").show();
    })
    //点击奖品xx中奖公式消失
    $(".prize-delete").on("touchend",function(){
        $(".prize-z").hide();
    })


        //iphone
        var u = navigator.platform;
        if(u=="iPhone"){
            $('.sekuai').show();
        }
        //滚动
        var swiper = new Swiper('.swiper-container',{
            slidesPerView: 4,
        });

        //蛋蛋跳起来
        var t1=setTimeout(move1,0);
        function move1(){
            $('.dug div:first-child img:first-child').attr("src","https://yun.yizhidayu.com/42-whackMole-show.png");
            var t1=setInterval(move1,300);
            function move1(){
                $('.dug div:first-child img:first-child').animate({},"easing",function(){
                    $(this).attr("src","https://yun.yizhidayu.com/42-whackMole-hide.png");
                    clearInterval(t1);
                });
            }
        }
        var t2=setTimeout(move22,500);
        function move22(){
            $('.dug div:nth-child(2) img:first-child').attr("src","https://yun.yizhidayu.com/42-whackMole-show.png");
            var t2=setInterval(move2,300);
            function move2(){
                $('.dug div:nth-child(2) img:first-child').animate({},"easing",function(){
                    $(this).attr("src","https://yun.yizhidayu.com/42-whackMole-hide.png");
                    clearInterval(t2);
                });
            }
        }
        var t3=setTimeout(move33,1000);
        function move33(){
            $('.dug div:nth-child(3) img:first-child').attr("src","https://yun.yizhidayu.com/42-whackMole-show.png");
            var t3=setInterval(move3,300);
            function move3(){
                $('.dug div:nth-child(3) img:first-child').animate({},"easing",function(){
                    $(this).attr("src","https://yun.yizhidayu.com/42-whackMole-hide.png");
                    clearInterval(t3);
                });
            }
        }
        var t4=setTimeout(move44,1500);
        function move44(){
            $('.dug div:nth-child(4) img:first-child').attr("src","https://yun.yizhidayu.com/42-whackMole-show.png");
            var t4=setInterval(move4,300);
            function move4(){
                $('.dug div:nth-child(4) img:first-child').animate({},"easing",function(){
                    $(this).attr("src","https://yun.yizhidayu.com/42-whackMole-hide.png");
                    clearInterval(t4);
                });
            }
        }
        var t5=setTimeout(move55,2000);
        function move55(){
            $('.dug div:nth-child(5) img:first-child').attr("src","https://yun.yizhidayu.com/42-whackMole-show.png");
            var t5=setInterval(move5,300);
            function move5(){
                $('.dug div:nth-child(5) img:first-child').animate({},"easing",function(){
                    $(this).attr("src","https://yun.yizhidayu.com/42-whackMole-hide.png");
                    clearInterval(t5);
                });
            }
        }
        var t6=setTimeout(move66,2500);
        function move66(){
            $('.dug div:nth-child(6) img:first-child').attr("src","https://yun.yizhidayu.com/42-whackMole-show.png");
            var t6=setInterval(move6,300);
            function move6(){
                $('.dug div:nth-child(6) img:first-child').animate({},"easing",function(){
                    $(this).attr("src","https://yun.yizhidayu.com/42-whackMole-hide.png");
                    clearInterval(t6);
                });
            }
        }
        var t=setInterval(move,3000);
        var t11,t22,t33,t44,t55,t66;
        function move (){
            t11=setTimeout(move1,500);
            t22=setTimeout(move22,1000);
            t33=setTimeout(move33,1500);
            t44=setTimeout(move44,2000);
            t55=setTimeout(move55,2500);
            t66=setTimeout(move66,3000);
        }
        function clearMove(){
            clearInterval(t1);
            clearTimeout(t22);
            clearTimeout(t33);
            clearTimeout(t44);
            clearTimeout(t55);
            clearTimeout(t66);
        }
    //锤子自己动
        $(".hummer").addClass('add_transform');
    //点击
        $('.dug div img').on("click",function(evt){
            //锤子不动
            $(".hummer").removeClass('add_transform');
            var hummer=setTimeout(function(){
                $(".hummer").addClass('add_transform');
            },150);
            var lottNum = $(".font p span").html(); // 获取抽奖次数
            if(lottNum==0){
                $(".font p span").html("0");
                ajaxzero();
            }
            if(lottNum>0){
                clearInterval(t);
                clearMove();
                //其他不能点击
                $(".dugzhezhao").show();
                var that=$(this);
                //加锤子
                if($(this).attr("class")=="one"){
                    $(".hummer").animate({top:"3.8rem",right:"5.4rem"},500);
                }else if($(this).attr("class")=="two"){
                    $(".hummer").animate({top:"3.5rem",right:"3rem"},500);
                }else if($(this).attr("class")=="three"){
                    $(".hummer").animate({top:"3.8rem",right:"0.3rem"},500);
                }else if($(this).attr("class")=="four"){
                    $(".hummer").animate({top:"6.2rem",right:"5.4rem"},500);
                }else if($(this).attr("class")=="five"){
                    $(".hummer").animate({top:"5.9rem",right:"3rem"},500);
                }else if($(this).attr("class")=="six"){
                    $(".hummer").animate({top:"6.2rem",right:"0.3rem"},500);
                }
                var time=setTimeout(function(){
                    that.attr("src","https://yun.yizhidayu.com/42-whackMole-yes.png");
                },850);

                ajaxone();
                var t=setTimeout(function(){
                    popshow();
                },1400);
            }
        });
       //弹窗出现
        function popshow(){
            $('.zhezhao').show();
            $('.quan').show();
            //点击事件
            setTimeout(function(){
                $('.light').css("display","block");
            },1000);
            $('.zhezhao .quan').addClass('animated bounceUp');
        }
        //点击弹窗的xx让弹窗消失
        $('#delete').on("click",function(){
            //可以点击
            $('.dugzhezhao').hide();
            //恢复原状
            $('.dug div img:first-child').attr("src","https://yun.yizhidayu.com/42-whackMole-hide.png");
            $('.hummer').css({top:"3rem",right:"0.2rem"});
            //浮标出来
            var num_fubiao=$('.font p span').html();
            if(num_fubiao==0){
                ajaxzero();
            }
//            if(num_fubiao==5){
//                $('#fubiao').show();
//            }
            $('.quan').addClass("active");
            var t=setTimeout(function(){
                $('.zhezhao').css("display","none");
                $('#point').show();
            },500);
            $('.light').css("display","none");
            var tt=setTimeout(function(){
                var width=$('.myprice').css("width");
                var newwidth=width.replace("px","")-15;
                $('<div class="test"></div>').fly({
                    start: {top: 200, left: 150},
                    end: {top: 24, left: newwidth, width: 10, height: 10},
                    onEnd: function(){
                        $('.quan').removeClass("active");
                    }
                });
            },500);
        })
        //点击明日再来消失
        $('.velocity .tomorrow').on("click",function(){
            $('.pop2').css("display","none");
        })
        //点击规则规则从上而下出来
        $('.rule').on("click",function(){
            $('.rulefont').slideToggle();
            var display=$('.zhezhao2').css("display");
            $('rule_content').css("height","6.1rem");
            if(display=="none"){
                $('.zhezhao2').css("display","block");
                $('.myprice').hide(500);
                $('.test').hide();
            }else if(display=="block"){
                $('.zhezhao2').css("display","none");
                $('.myprice').show(500);
                $('.test').show(500);
            }
        })
        //次数为0的时候第二个弹窗显现
        function pop2Show(){
            $('.pop2').show();
        }
        //点击次数为0的时候的活动的八叉
        $('.delete').on("click",function(){
            $('.pop2').hide();
        })
        // 点击抽奖时向后台传值
        function ajaxone() {
            $.ajax({
                url:"/test/index.php/Activity/Ajax/run",
                type:"POST",
                dataType:"json",
                data:{
                    uid: "<?php echo ($uid); ?>",
                    member_id:"<?php echo ($member_id); ?>",
                    active_id: "<?php echo ($active_id); ?>",
                },
                success: function(data) {
                    if(data.status==1){
                        $(".font p span").html(data.last);
                        var result=data.prize;
                        $('.userid').html(data.recordID);
                        $('.quanimg').attr('src', result.pic);
                        $('.name').html(result.name);
                        $('.jump').attr("data-href",result.href);
                    }else if(data.status==0){
                        alert("活动暂未开放");
                    }
                }
            })
        }
        //点击图片
        $("img.quanimg").on("click",function(){
            //可以点击
            $('.dugzhezhao').hide();
            //恢复原状
            $('.dug div img:first-child').attr("src","https://yun.yizhidayu.com/42-whackMole-hide.png");
//            $('.dug div img').addClass("jump");
            $('.hummer').css({top:"3rem",right:"0.2rem"});
            $(".zhezhao").hide();
            $('.quan').hide();
            $('.light').hide();
            //点击领券
            handleClickAjax();
        })
        //点击立即领取
        $('.linktwo img').on("click",function(){
            //可以点击
            $('.dugzhezhao').hide();
            //恢复原状
            $('.dug div img:first-child').attr("src","https://yun.yizhidayu.com/42-whackMole-hide.png");
            $('.hummer').css({top:"3rem",right:"0.2rem"});
            $(".zhezhao").hide();
            $('.quan').hide();
            $('.light').hide();
            //点击领券
            handleClickAjax();
        })
        // 点击领取发送ajax
        function handleClickAjax() {
            var id=$('.userid').html();
            $.ajax({
                url: "/test/index.php/Activity/Ajax/receive",
                type: "post",
                data: {
                    uid: "<?php echo ($uid); ?>",
                    member_id: "<?php echo ($member_id); ?>",
                    active_id: "<?php echo ($active_id); ?>",
                    record_id: id,
                },
                dataType: "json",
                success: function(result) {
                    if(result.status==1){
                        $('.sendajax').html("yes");
                        window.location.href=$('.jump').attr("data-href");
                    }else if(result.status==0){
                        alert("程序员被台风吹走了");
                    }else{
                        alert("程序员离开一小会");
                    }
                },
            });
        }
        // 点击以后抽奖次数为0时发送请求
        function ajaxzero(){
            $.ajax({
                url: "/test/index.php/Activity/Ajax/active_data.html",
                type: "post",
                data: {
                    'activity_id': "<?php echo ($activity_id); ?>",
                    'uid': "<?php echo ($uid); ?>",
                    'member_id': "<?php echo ($member_id); ?>",
                } ,
                dataType: "json",
                success: function success(result) {
                    console.log(result);
                    if(result.status == 0) {
                        var data = result.active;
                        $(".zhezhao").css("display","none");
                        pop2Show();
                        if(data.length == 1) {
                            $('.activeone').addClass('animated bounceInDown');
                            $('.activeone').css("display","block");
                            $('.boxone img').attr("src",data[0].pic);
                            $('.boxone').attr("href","/test/index.php/Activity/Active/index.html?member_id=<?php echo ($memben_id); ?>&active_id=" + data[0].id);
                        }else if(data.length>1) {
                            //two
                            $('.activetwo').addClass('animated bounceInDown');
                            $('.activetwo').css("display","block");
                            $('.boxone img').attr("src",data[0].pic);
                            $('.boxtwo img').attr("src",data[1].pic);
                            $('.boxone').attr("href","/test/index.php/Activity/Active/index.html?member_id=<?php echo ($memben_id); ?>&active_id=" + data[0].id);
                            $('.boxtwo').attr("href","/test/index.php/Activity/Active/index.html?member_id=<?php echo ($memben_id); ?>&active_id=" + data[1].id);
                        }else if(data.length==0){
                            $('.tomorrow').show();
                        }
                    } else {
                        return;
                    }
                }
            });
        }

        function check(){
            $.ajax({
                url:"/test/index.php/Activity/Ajax/check.html",
                type:"POST",
                dataType:"json",
                data:{
                    uid:"<?php echo ($uid); ?>",
                },
            });
        }
        check();
</script>