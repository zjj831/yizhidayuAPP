<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta https-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.bootcss.com/zepto/1.0rc1/zepto.min.js"></script>
    <script src='<?php echo C('Public');?>/Active/common/js/intercept.js?version=1.2'></script>
    <script>
    //intercept page
    intercept('<?php echo ($media_id); ?>','<?php echo ($entry_id); ?>','<?php echo ($intercept); ?>');
    //font resize standard for iphone6
    $(window).width()>540?$('html').css('font-size',''+540/375*312.5+'%'):$('html').css('font-size',''+$(window).width()/375*312.5+'%');
    window.onresize = function(){$(window).width()>540?$('html').css('font-size',''+540/375*312.5+'%'):$('html').css('font-size',''+$(window).width()/375*312.5+'%')};
    </script>
    <script src="/Public/Active/14_xie_zhua/js/loading.js"></script>
    <link rel="stylesheet" href="/Public/Active/common/css/1031_common.css">
    <link rel="stylesheet" href="/Public/Active/57_scene_panda/css/index.css">
    <title><?php echo ($tempInfo['title']); ?></title>
    <!-- Baidu Statistics -->

</head>
<body>
<!--//头部-->
<!--<header></header>-->
<!--//body-->
<div class="content">
    <section style="background-image:url(https://yun.yizhidayu.com/57-scene-newbg.jpg);background-size:100% 100%;background-repeat: no-repeat;">
        <a class="one_a" href="https://www.yizhidayu.com/index.php/Active/Active/index/media_id/<?php echo ($media_id); ?>/entry_id/<?php echo ($entry_id); ?>/active_id/81">
            <img src="https://yun.yizhidayu.com/57-panda-qiqiu.png" alt="" class="one">
        </a>
        <a class="two_a" href="https://www.yizhidayu.com/index.php/Active/Active/index/media_id/<?php echo ($media_id); ?>/entry_id/<?php echo ($entry_id); ?>/active_id/80">
            <img src="https://yun.yizhidayu.com/57-panda-phone.gif" alt="" class="two">
        </a>
        <a class="three_a" href="https://www.yizhidayu.com/index.php/Active/Active/index/media_id/<?php echo ($media_id); ?>/entry_id/<?php echo ($entry_id); ?>/active_id/72">
            <img src="https://yun.yizhidayu.com/57-panda-ll.gif" alt="" class="three">
        </a>
        <a class="four_a" href="https://www.yizhidayu.com/index.php/Active/Active/index/media_id/<?php echo ($media_id); ?>/entry_id/<?php echo ($entry_id); ?>/active_id/72">
            <img src="https://yun.yizhidayu.com/57-panda-food.gif" alt="" class="two">
        </a>
        <a class="pai_a" href="https://www.yizhidayu.com/index.php/Active/Active/index/media_id/<?php echo ($media_id); ?>/entry_id/<?php echo ($entry_id); ?>/active_id/73">
            <img src="https://yun.yizhidayu.com/57-panda-hb.gif" alt="" class="pai">
        </a>

        <a class="panda" href="https://www.yizhidayu.com/index.php/Active/Active/index/media_id/<?php echo ($media_id); ?>/entry_id/<?php echo ($entry_id); ?>/active_id/52">
            <img src="https://yun.yizhidayu.com/54-newphone-panda.gif" alt="">
        </a>
        <!--<img src="https://yun.yizhidayu.com/56-wenquan-light.png" alt="" class="laba1 laba">-->
        <!--<img src="https://yun.yizhidayu.com/56-wenquan-light.png" alt="" class="laba2 laba">-->
        <!--<img src="https://yun.yizhidayu.com/56-wenquan-light.png" alt="" class="laba3 laba">-->
        <!--<img src="https://yun.yizhidayu.com/56-wenquan-light.png" alt="" class="laba4 laba">-->
    </section>
</div>
</body>
</html>
<script>
    // 抽奖灯闪烁
    var numm = 1; // 闪烁灯基数
    function twinkle() {
        if(numm% 2){
            $(".laba").hide();
        };
        if(!(numm % 2)) {
            $(".laba").show();
        };
        numm++;
        if(numm === 5000) {
            numm = 1;
        }
    }
    intervalId3 = setInterval(twinkle, 300);


    //国恩的统计
    function check(){
        $.ajax({
            url:"/index.php/Active/Ajax/check.html",
            type:"POST",
            dataType:"json",
            data:{
                uid:"<?php echo ($uid); ?>",
            },                                                   
        });	
    }   
    check();  
</script>