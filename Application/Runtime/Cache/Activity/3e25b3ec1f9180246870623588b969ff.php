<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta https-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
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
    <link rel="stylesheet" href="/test/Public/Activity/61_signup_card/css/index_001.css">
    <link rel="stylesheet" href="/test/Public/Activity/45_dug_gu/css/demo.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/test/Public/Activity/45_dug_gu/css/sweet-alert.css">
    <link rel="stylesheet" href="/test/Public/Activity/common/css/swiper.css">
    <script src="/test/Public/Activity/common/js//swiper.min.js"></script>
    <title><?php echo ($tempInfo['title']); ?></title>
</head>
<body>
<div class="content">
    <section style="background-image:url(https://yun.yizhidayu.com/61-signup-bj.jpg);background-size:100% 100%;background-repeat: no-repeat;">
        <!--提示红包雨信息   -->
        <img class="tishi" src="https://yun.yizhidayu.com/41-jian-newplane1.png" alt="">
        <!--红包雨-->
        <div class="hbrain">
            <ul class="couten">
            </ul>
            <div class="mo2">
                <span>7</span>
            </div>
            <img src="https://yun.yizhidayu.com/common-rain-bottom.png" alt="" class="rain-bottom">
        </div>
        <section class="dugzhezhao"></section>




        <img src="https://yun.yizhidayu.com/61-signup-title.png" alt="" class="title">
        <div class="zhezhao2"></div>
        <!--规则内容-->
        <div class="rule_content">
            <div class="rulefont">
                <h2><span></span>&nbsp;活动说明&nbsp;<span></span></h2>
                <p>天天抢福利，有红包哦<br>
                    <br>
                    活动说明：参与活动即有机会获得幸运大奖，每天有<?php echo ($tempInfo['times']); ?>次免费抽奖机会。此活动为概率中奖，奖品数量有限<br>
                    <br>
                    惊喜一：500元红包<br>
                    惊喜二：300元红包<br>
                    惊喜三：200元红包<br>
                    惊喜四：100元红包<br>
                    惊喜五：50元红包<br>
                    惊喜六：幸运福袋<br>
                    兑换项和活动均与设备生产商Apple lnc.无关</p>
            </div>
            <!--规则-->
            <div class="rule" style="background:url(https://yun.yizhidayu.com/61-signup-rule.png);background-size:100% 100%;background-repeat: no-repeat;">
            </div>
        </div>
        <!--我的奖品-->
        <a class="myprice" href="/test/index.php/Activity/Active/prize_list/member_id/<?php echo ($member_id); ?>">
            <span>我的奖品</span>
        </a>
        <!--/*****底部-->
        <img src="https://yun.yizhidayu.com/common_price_21.png" alt="" class="price">
        <div class="swiper-container" id="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="photo" src="https://yun.yizhidayu.com/61-signup-price1.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="photo" src="https://yun.yizhidayu.com/61-signup-price2.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="photo" src="https://yun.yizhidayu.com/61-signup-price3.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="photo" src="https://yun.yizhidayu.com/61-signup-price4.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="photo" src="https://yun.yizhidayu.com/61-signup-price5.png" alt="">
                </div>
            </div>
        </div>
        <img src="https://yun.yizhidayu.com/49-scene-rabbit.gif" alt="" class="person">
        <!--//走动的洋葱-->
        <img src="https://yun.yizhidayu.com/47-today-onion.gif" alt="" class="onion">
        <!--牌子-->
        <div class="card">
            <div class="card-img">
                <img src="https://yun.yizhidayu.com/61-signup-card.png" alt="">
            </div>
            <div class="card-img">
                <img src="https://yun.yizhidayu.com/61-signup-card.png" alt="">
            </div>
            <div class="card-img">
                <img src="https://yun.yizhidayu.com/61-signup-card.png" alt="">
            </div>
            <div class="card-img">
                <img src="https://yun.yizhidayu.com/61-signup-card.png" alt="">
            </div>
            <div class="card-img">
                <img src="https://yun.yizhidayu.com/61-signup-card.png" alt="">
            </div>
            <div class="card-img">
                <img src="https://yun.yizhidayu.com/61-signup-card.png" alt="">
            </div>
        </div>
        <!--抽奖文字-->
        <div class="font">
            <p>您还有<span style="font-weight: bold;"><?php echo ($times); ?></span>次机会</p>
        </div>
        <!--次数为0的时候显示的弹窗-->
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
            <img class="light" src="https://yun.yizhidayu.com/common_light_bg2_21.png" alt="">
            <div class="quan" style="background:url(https://yun.yizhidayu.com/33-welfare-newtc.png);background-size:100% 100%;background-repeat: no-repeat;">
                <img src="https://yun.yizhidayu.com/33-welfare-close.png" alt="" class="delete" id="delete">
                <img class="start start_one" style="z-index:1;" src="https://yun.yizhidayu.com/47-today-lighttwo.png" alt="" >
                <img class="start start_two" style="z-index:2;" src="https://yun.yizhidayu.com/47-today-lightone.png" alt="" >
                <section class="name"></section>
                <div class="linkone">
                    <img src="" alt="" class="quanimg">
                </div>
                <div class="linktwo">
                    <img src="https://yun.yizhidayu.com/33-welfare-tbtn.gif" alt="">
                </div>
            </div>
        </div>

        <!--//券的相关信息-->
        <div class="zhezhao-three">
            <!--<img class="light-three" src="http://ow5oe9l3t.bkt.clouddn.com/9_light_bg.png" alt="">-->
            <div class="quan-three" style="background:url(https://yun.yizhidayu.com/tc-rain-bg.png);background-size:100% 100%;background-repeat: no-repeat;">
                <img src="https://yun.yizhidayu.com/common-hb-tcdelete.png" alt="" class="delete" id="delete-three">
                <img class="start02-three" src="https://yun.yizhidayu.com/tc-rain-bg2.png" alt="">
                <img class="tc_one" src="https://yun.yizhidayu.com/tc-rain-b1.png" alt="">
                <img class="tc_two" src="https://yun.yizhidayu.com/tc-rain-b2.png" alt="">
                <img class="tc_three" src="https://yun.yizhidayu.com/tc-rain-b3.png" alt="">
                <img class="tc_four" src="https://yun.yizhidayu.com/tc-rain-b4.png" alt="">
                <img class="tc_five" src="https://yun.yizhidayu.com/tc-rain-b5.png" alt="">
                <img class="tc_six" src="https://yun.yizhidayu.com/tc-rain-b6.png" alt="">
                <img class="tc_seven" src="https://yun.yizhidayu.com/tc-rain-b7.png" alt="">
                <img class="tc_eight" src="https://yun.yizhidayu.com/tc-rain-b8.png" alt="">
                <img class="tc_nine" src="https://yun.yizhidayu.com/tc-rain-b9.png" alt="">
                <img class="tc_ten" src="https://yun.yizhidayu.com/tc-rain-b10.png" alt="">
                <img class="tc_eleven" src="https://yun.yizhidayu.com/tc-rain-b11.png" alt="">
                <img class="tc_twelve" src="https://yun.yizhidayu.com/tc-rain-b12.png" alt="">
                <img class="tc_thirty" src="https://yun.yizhidayu.com/tc-rain-b13.png" alt="">
                <section class="name-three"></section>
                <div class="linkone-three">
                    <img src="https://yun.yizhidayu.com/tc-rain-box.png" alt="" class="tc-box">
                    <img src="" alt="" class="quanimg-three">
                </div>
                <div class="linktwo-three">
                    <img src="https://yun.yizhidayu.com/tc-rain-btn.png" alt="">
                </div>
            </div>
        </div>
        <!--第一个弹窗  1个抽奖券-->
    </section>
    <div class="sekuai">*奖品和活动均与设备生产商Apple Inc.无关</div>
    <!--//跳转页面-->
    <div class="jump" data-href="" style="display: none;"></div>
    <!--//用户点击领券发送ajax-->
    <div class="sendajax" style="display: none;"></div>
    <!--//用户的id-->
    <div class="userid" style="display: none;"></div>
</div>

</body>
</html>
<script src="/test/Public/Activity/common/js/jquery.fly.min.js"></script>
<script>
    window.onload=function() {
        $(".zhan").on("touchend",function(){
            window.location.href="https://h5.adgame.ink/test/index.php/Activity/Active/index?member_id=<?php echo ($member_id); ?>&active_id=60";
        });
        $(".person").on("touchend",function(){
            window.location.href="https://h5.adgame.ink/test/index.php/Activity/Active/index?member_id=<?php echo ($member_id); ?>&active_id=59";
        });
        //****************************天降红包**********************************************
        //红包雨
        var win = (parseInt($(".couten").css("width"))+180);
        $(".mo").css("height", $(document).height());
        $(".couten").css("height", $(document).height());
        $(".backward").css("height", $(document).height());
        $("li").css({});
        // 点击确认的时候关闭模态层
        $(".sen a").click(function(){
            $(".mo").css("display", "none")
        });

        var del = function(){
            nums++;
            //					console.info(nums);
            //					console.log($(".li" + nums).css("left"));
            $(".li" + nums).remove();
            setTimeout(del,200)
        }

        var add = function() {
            var hb = parseInt(Math.random() * (3 - 1) + 1);
            var Wh = parseInt(Math.random() * (90 - 30) + 20);
            var Left = parseInt(Math.random() * (win - 0) + 0);
            var rot = (parseInt(Math.random() * (45 - (-45)) - 45)) + "deg";
            //				console.log(rot)
            num++;
            $(".couten").append("<li class='li" + num + "' ><img src='https://yun.yizhidayu.com/common-newrain2-hb.png'></li>");
            $(".li" + num).css({
                "left": Left,
            });
            $(".li" + num + " a img").css({
                "width": 80,
                "transform": "rotate(" + rot + ")",
                "-webkit-transform": "rotate(" + rot + ")",
                "-ms-transform": "rotate(" + rot + ")", /* Internet Explorer */
                "-moz-transform": "rotate(" + rot + ")", /* Firefox */
                "-webkit-transform": "rotate(" + rot + ")",/* Safari 和 Chrome */
                "-o-transform": "rotate(" + rot + ")" /* Opera */
            });
            $(".li" + num).animate({'top':$(window).height()+0},3000,function(){
                //删掉已经显示的红包
                this.remove();
            });
            //点击红包的时候弹出模态层
            $(".li" + num).click(function(){
                var arr=["https://yun.yizhidayu.com/common-rain2-click.png","https://yun.yizhidayu.com/common-rain2-click.png"];
                var index = Math.floor((Math.random()*arr.length));
//            alert(arr[index]);
                $(this).children("img").attr("src",arr[index]);
            });
            setTimeout(add,350);
        };

        // //增加红包
        var num = 0;
        //     setTimeout(add,3000);

        // //倒数计时
        var backward = function(){
            var numz=$(".mo2 span").html();
            numz--;
            if(numz>=0){
                $(".mo2 span").html(numz);
            }
            setTimeout(backward,1000)
        }
        //     var numz = 10;
        //天降红包弹窗出现
        function popshow3(){
            $('.zhezhao-three').show();
            $('.quan-three').show();
            //点击事件
            setTimeout(function(){
                $('.light-three').show();
            },1000);
            $('.zhezhao-three .quan-three').addClass('animated bounceUp');
        }
        //天降红包XX
        $('#delete-three').on("click",function() {
            //可以点击
            $('.dugzhezhao').hide();
            var num_fubiao = $('.font p span').html();
            if (num_fubiao == 0) {
                ajaxzero();
            }
            $('.quan-three').addClass("active");
            $('.zhezhao-three').css("display", "none");
            $('.light-three').css("display", "none");
            $('.hbrain').css("display", "none");
            var tt = setTimeout(function () {
                var tt = setTimeout(function () {
                    var width = $('.myprice').css("width");
                    var newwidth = width.replace("px", "") - 15;
                    $('<div class="test"></div>').fly({
                        start: {top: 200, left: 150},
                        end: {top: 24, left: newwidth, width: 10, height: 10},
                        onEnd: function () {
                            $('.quan').removeClass("active");
                        }
                    });
                }, 500);
            })

            $(".onion").show().addClass("go");
            var t=setTimeout(function(){
                $(".onion").attr("src","https://yun.yizhidayu.com/47-today-newyangcong.png");
                clearTimeout(t);
            },2200);
        })

        //天降红包领取
        //点击图片
        $("img.quanimg-three").on("click",function(){
            //可以点击
            $('.dugzhezhao').hide();
            $(".zhezhao").hide();
            $('.quan').hide();
            $('.light').hide();
            //点击领券
            handleClickAjax();
        })
        //点击立即领取
        $('.linktwo-three img').on("click",function(){
            //可以点击
            $('.dugzhezhao').hide();
            $(".zhezhao").hide();
            $('.quan').hide();
            $('.light').hide();
            //点击领券
            handleClickAjax();
        })

        // 点击抽奖时向后台传值
        function ajaxthree() {
            $.ajax({
                url:"/test/index.php/Activity/Ajax/run",
                type:"POST",
                dataType:"json",
                data:{
                    uid:"<?php echo ($uid); ?>",
                    member_id:"<?php echo ($member_id); ?>",
                    active_id:"<?php echo ($active_id); ?>",
                },
                success: function(data) {
//                    console.log(data);
                    if(data.status==1){
                        $(".font p span").html(data.last);
                        var result=data.prize;
                        $('.userid').html(data.recordID);
                        $('.quanimg-three').attr('src', result.pic);
                        $('.name-three').html(result.name);
                        $('.jump').attr("data-href",result.href);
                    }else if(data.status==0){
                        alert("活动暂未开放");
                    }
                },
                error:function(){
//                    console.log(123456)
                }
            })
        }
        //****************************天降红包**********************************************



        //iphone
        var u = navigator.platform;
        if(u=="iPhone"){
            $('.sekuai').show();
        }

        //滚动
        var swiper = new Swiper('.swiper-container',{
            slidesPerView: 4,
        });
        
        //卡片轮播
        var l=0,leadStart;
        function lead(){
            $(".card .card-img").eq(l).children("img").attr("src","https://yun.yizhidayu.com/61-signup-card2.png");
            $(".card .card-img").eq(l).siblings().children("img").attr("src","https://yun.yizhidayu.com/61-signup-card.png");
            l++;
            l>5?l=0:0;
        };
        function card(){
//            console.log(123)
            $(".card .card-img:eq(0)").show().animate({left:"0",top:'0'},300);
            $(".card .card-img:eq(1)").delay(300).animate({left:"33.33%",top:'0px'},300);
            $(".card .card-img:eq(2)").delay(600).animate({left:"66.66%",top:'0px'},300);
            $(".card .card-img:eq(3)").delay(900).animate({left:"0",top:'50%'},300);
            $(".card .card-img:eq(4)").delay(1200).animate({left:"33.33%",top:'50%'},300);
            $(".card .card-img:eq(5)").delay(1500).animate({left:"66.66%",top:'50%'},300);
            setTimeout(function(){
                leadStart=setInterval(lead,650);
            },200);
        }
        card();
        function defaultSet(){
            l=0;
            clearInterval(leadStart);
            $(".card .card-img:eq(0)").css("z-index","14").animate({left:"33.33%",top:'33.33%'},300).addClass("snake");
        }
        $('.card-img img').click(function(){
            $('.zhezhao2').show(0);
            defaultSet();
            setTimeout(function(){
                popshow();
            },750);
        });





        function popshow() {
            ajaxone();
            $(".card .card-img:eq(0)").css("z-index","1").removeClass("snake").hide();
            $(".zhezhao2").hide();
            $('.zhezhao').show();
            $('.quan').show();
            //点击事件
            setTimeout(function () {
                $('.light').show();
            }, 1000);
            $('.zhezhao .quan').addClass('animated bounceUp');
        }

        //点击弹窗的xx让弹窗消失
        $('#delete').on("click", function () {
            var num_fubiao = $('.font p span').html();
            if (num_fubiao == 0) {
                ajaxzero();
            }else if(num_fubiao == 7){
                //抽奖一次跳专注会场
                $(".person").show().addClass("trans");
            }else if(num_fubiao == 6){
                $(".person").hide();
            }else if(num_fubiao==5){
                //抽奖三次红包雨
                $(".hbrain").show();
                $(".tishi").show();
                $(".rain-bottom").show();
                backward();
                var t1=setTimeout(function(){
                    $(".mo2").show();
                    add();
                },3200);
                var tt=setTimeout(function(){
                    $(".dugzhezhao").show();
                    $(".couten").hide();
//                    $(".mo2").hide();
                    ajaxthree();
                    var t=setTimeout(function(){
                        popshow3();
                    },1000);
                },6200);
            }else if(num_fubiao==2){
                $(".onion").hide();
            }
            $('.quan').addClass("active");
            //恢复默认
            card();
            $(".card .card-img").css({left:"0",top:"0"});


            var t = setTimeout(function () {
                $('.zhezhao').css("display", "none");
            }, 500);
            $('.light').css("display", "none");
            var tt = setTimeout(function () {
                var tt = setTimeout(function () {
                    var width = $('.myprice').css("width");
                    var newwidth = width.replace("px", "") - 15;
                    $('<div class="test"></div>').fly({
                        start: {top: 200, left: 150},
                        end: {top: 24, left: newwidth, width: 10, height: 10},
                        onEnd: function () {
                            $('.quan').removeClass("active");
                        }
                    });
                }, 500);
            })
        })
        //点击明日再来消失
        $('.velocity .tomorrow').on("click", function () {
            $('.pop2').css("display", "none");
        })
        
        
        //点击规则规则从上而下出来
        $('.rule').on("click", function () {
            $('.rulefont').slideToggle();
            var display = $('.zhezhao2').css("display");
            if (display == "none") {
                $('.zhezhao2').css("display", "block");
                $('.myprice').hide();
                $('.test').hide();
            } else if (display == "block") {
                $('.zhezhao2').css("display", "none");
                $('.myprice').show(500);
                $('.test').show(500);
            }
        })

        //次数为0的时候第二个弹窗显现
        function pop2Show() {
            $('.pop2').show();
        }

        //点击活动的八叉
        $('.delete').on("click", function () {
            $('.pop2').hide();
        })

        //发送ajax
// 点击抽奖时向后台传值
        function ajaxone() {
//            console.log("<?php echo ($uid); ?>");
            $.ajax({
                url: "/test/index.php/Activity/Ajax/run",
                type: "POST",
                dataType: "json",
                data: {
                    uid: "<?php echo ($uid); ?>",
                    member_id:"<?php echo ($member_id); ?>",
                    active_id: "<?php echo ($active_id); ?>",
                },
                success: function (data) {
//                    console.log(data);
                    if (data.status == 1) {
                        $(".font p span").html(data.last);
                        var result = data.prize;
                        $('.userid').html(data.recordID);
                        $('.quanimg').attr('src', result.pic);
                        $('.name').html(result.name);
                        $('.jump').attr("data-href",result.href);
                    } else if (data.status == 0) {
                        alert("活动暂未开放");
//                        console.log(data.status);
                    }
                },
                error:function(){
//                    console.log(123456);
                }
            })
        }

        //点击图片
        $("img.quanimg").on("click", function () {

            $(".zhezhao").hide();
            $('.quan').hide();
            $('.light').hide();
            //点击领券
            handleClickAjax();
        })
        //点击立即领取
        $('.linktwo img').on("click", function () {

            $(".zhezhao").hide();
            $('.quan').hide();
            $('.light').hide();
            //点击领券
            handleClickAjax();
        })

        // 点击领取发送ajax
        function handleClickAjax() {
            var id = $('.userid').html();
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
                success: function (result) {
//                    console.log(result);
                    if (result.status == 1) {
                        $('.sendajax').html("yes");
                        window.location.href = $('.jump').attr("data-href");
                    } else if (result.status == 0) {
                        alert("程序员被台风吹走了");
                    } else {
                        alert("程序员离开一小会");
                    }
                },
            });
        }

        // 点击以后抽奖次数为0时发送请求
        function ajaxzero() {
            $.ajax({
                url: "/test/index.php/Activity/Ajax/active_data.html",
                type: "post",
                data: {
                    'activity_id': "<?php echo ($activity_id); ?>",
                    'uid': "<?php echo ($uid); ?>",
                    'member_id': "<?php echo ($member_id); ?>",
                },
                dataType: "json",
                success: function success(result) {
                    if (result.status == 0) {
                        var data = result.active;
                        $(".zhezhao").css("display", "none");
                        pop2Show();
                        if (data.length == 1) {
                            $('.activeone').addClass('animated bounceInDown');
                            $('.activeone').css("display", "block");
                            $('.boxone img').attr("src", data[0].pic);
                            $('.boxone').attr("href", "/test/index.php/Activity/Active/index.html?member_id=<?php echo ($memben_id); ?>&active_id=" + data[0].id);
                        } else if (data.length > 1) {
                            //two
                            $('.activetwo').addClass('animated bounceInDown');
                            $('.activetwo').css("display", "block");
                            $('.boxone img').attr("src", data[0].pic);
                            $('.boxtwo img').attr("src", data[1].pic);
                            $('.boxone').attr("href", "/test/index.php/Activity/Active/index.html?member_id=<?php echo ($memben_id); ?>&active_id=" + data[0].id);
                            $('.boxtwo').attr("href", "/test/index.php/Activity/Active/index.html?member_id=<?php echo ($memben_id); ?>&active_id=" + data[1].id);
                        } else if (data.length == 0) {
                            $('.tomorrow').show();
                        }
                    } else {
                        return;
                    }
                }
            });
        }

    };
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