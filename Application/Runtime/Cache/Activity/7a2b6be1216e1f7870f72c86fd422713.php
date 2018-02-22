<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($tempInfo['title']); ?></title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <link rel="shortcut icon" href="<?php echo C('Public');?>/Core/core/images/ico.png" type="image/x-icon">


    <!-- JavaScript Code -->
    <script src='https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js'></script>
    <script src='/test/Public/Activity/common/js/intercept.js?version=1.2'></script>
    <script>
        //intercept page
        intercept('<?php echo ($member_id); ?>','<?php echo ($intercept); ?>');
        //font resize standard for iphone6
        $(window).width()>540?$('html').css('font-size',''+540/375*125+'%'):$('html').css('font-size',''+$(window).width()/375*125+'%');
        window.onresize = function(){$(window).width()>540?$('html').css('font-size',''+540/375*125+'%'):$('html').css('font-size',''+$(window).width()/375*125+'%')};
    </script>
    <!-- CSS Code -->
    <link rel="stylesheet" href="/test/Public/Activity/common/css/1028_common.css?version=1.2" type="text/css">
    <link rel="stylesheet" href="/test/Public/Activity/26_welfare/css/wap_style.css?version=1.2" type="text/css">

    <!-- Baidu Statistics -->

</head>
<body bgcolor="#fafafa">
<!-- 主要内容 -->
<div class="index">
    <header></header>
    <section class="nav">
        <div>
            <a href="http://www.chipshare.net/finance/index.html">
                <img src="https://yun.yizhidayu.com/53-service-jinrong.png" alt="">
                <p>金融福利</p>
            </a>
        </div>
        <div>
            <a href="https://m.taobao.com/?sprefer=sypc00#index">
                <img src="https://yun.yizhidayu.com/53-service-atb.png" alt="">
                <p>爱淘宝</p>
            </a>
        </div>
        <div>
            <a href="https://www.yizhidayu.com/Application/Guanwei/book.html">
                <img src="https://yun.yizhidayu.com/53-service-book.png" alt="">
                <p>有声读物</p>
            </a>
        </div>
        <div>
            <a href="https://www.yizhidayu.com/Application/Guanwei/fortunetelling.html">
                <img src="https://yun.yizhidayu.com/53-service-tjsm.png" alt="">
                <p>天机算命</p>
            </a>
        </div>
    </section>

    <ul class="list">
        <li><span></span><span>精选活动</span></li>
        <li>
            <a href="https://www.yizhidayu.com/index.php/Active/Active/index/media_id/<?php echo ($media_id); ?>/entry_id/<?php echo ($entry_id); ?>/active_id/69">
                <img src="https://yun.yizhidayu.com/53-service-coming.png" alt="">
                <p>抢千元油卡</p>
            </a>
        </li>
        <li>
            <a href="https://www.yizhidayu.com/index.php/Active/Active/index/media_id/<?php echo ($media_id); ?>/entry_id/<?php echo ($entry_id); ?>/active_id/80">
                <img src="https://yun.yizhidayu.com/53-service-phone2.png" alt="">
                <p>送大屏好手机</p>
            </a>
        </li>
        <li>
            <a href="https://www.yizhidayu.com/index.php/Active/Active/index/media_id/<?php echo ($media_id); ?>/entry_id/<?php echo ($entry_id); ?>/active_id/81">
                <img src="https://yun.yizhidayu.com/53-service-vip.png" alt="">
                <p>看精彩好剧</p>
            </a>
        </li>
        <li>
            <a href="https://www.yizhidayu.com/index.php/Active/Active/index/media_id/<?php echo ($media_id); ?>/entry_id/<?php echo ($entry_id); ?>/active_id/72">
                <img src="https://yun.yizhidayu.com/53-service-ll.png" alt="">
                <p>抢流量话费</p>
            </a>
        </li>
        <li>
            <a href="https://www.yizhidayu.com/index.php/Active/Active/index/media_id/<?php echo ($media_id); ?>/entry_id/<?php echo ($entry_id); ?>/active_id/61">
                <img src="https://yun.yizhidayu.com/53-service-phone.png" alt="">
                <p>苹果整套送</p>
            </a>
        </li>
        <li>
            <a href="https://ultimavip.cn/m/mposter.html?source=dayu_001_t_mposter">
                <img src="https://yun.yizhidayu.com/heika.png" alt="">
                <p>刷卡送豪礼</p>
            </a>
        </li>
        <li>
            <a href="http://opt.778668.cn:9082/adv/yj019.html">
                <img src="https://yun.yizhidayu.com/53-service-caipiao.png" alt="">
                <p>快抢！奖池已爆棚</p>
            </a>
        </li>
        <li>
            <a href="https://www.yizhidayu.com/index.php/Active/Active/index/media_id/<?php echo ($media_id); ?>/entry_id/<?php echo ($entry_id); ?>/active_id/60">
                <img src="https://yun.yizhidayu.com/53-service-hl.png" alt="">
                <p>送暖心好礼</p>
            </a>
        </li>
        <li>
            <a href="https://w.5lovesong.cn/book/25606/0/?ADU=17798283&islogin=yes">
                <img src="https://yun.yizhidayu.com/book-zongcai.png" alt="">
                <p>我的绝色总裁未婚妻</p>
            </a>
        </li>
        <li>
            <a href="http://www.vr-rose.cn/Item/detail/id/1180536/BLyz/UU6Jk/sid/8000975.html?pid=6507343">
                <img src="https://yun.yizhidayu.com/yima.png" alt="">
                <p>女神专享</p>
            </a>
        </li>
    </ul>
    <div class="footer">期待更多...</div>
    <div class="fail">
        <div class="news">
            <div class="title">提示</div>
            <div class="font"></div>
            <div class="enter">确定</div>
        </div>
    </div>
    <div class='overlay-gift f-over'>
        <div class='error'></div>
        <div class='box'>
            <div class="light"></div>
            <div class='top'></div>
            <div class="instr"></div>
            <div class='mid'>
                <div class='banner'>
                    <img>
                </div>
            </div>
            <div class='get'>
                点击领取
            </div>
        </div>
    </div>
    <p class="apple" style="display: block;color: #333;text-align: center;font-size: 12px;">*奖品和活动均与设备生产商Apple Inc.无关</p>
</div>
<div id='redPage' class='f-over'>
    <div class='close'></div>
    <div class='pack'>
        <div class='get'></div>
    </div>
</div>
<script type="text/javascript">

    $("header").on("click",function(){
        window.location.href="https://h5.adgame.ink/test/index.php/Activity/Active/index?member_id=<?php echo ($member_id); ?>&active_id=60";
    })

//    var certId,certHref,protect=false;
//    $('aside li,.main li').click(function(){
//        certId=$(this).attr('data-id');
//        certHref=$(this).attr('data-href');
//        if(protect===true){
//            return;
//        }
//        protect=true;
//        $.ajax({
//            url:"/test/index.php/Activity/Ajax/receive",
//            type:"POST",
//            dataType:"json",
//            data:{
//                uid: "<?php echo ($uid); ?>",
//                member_id: "<?php echo ($member_id); ?>",
//                active_id: "<?php echo ($active_id); ?>",
//                record_id: id,
//            },
//            success: function(data){
//                protect=false;
//                if(data.status===1){
//                    window.location.href=certHref;
//                }
//            },
//            error: function(){
//                //丢包统计
//                protect=false;
//                window.location.href=certHref;
//            },
//        });
//    });
//
//    function activeList(){
//        $.ajax({
//            url:"/test/index.php/Activity/Ajax/active_data.html",
//            type:"POST",
//            dataType:"json",
//            data:{
//                'activity_id': "<?php echo ($activity_id); ?>",
//                'uid': "<?php echo ($uid); ?>",
//                'member_id': "<?php echo ($member_id); ?>",
//            },
//            success: function(data){
//                if(data.status===0){
//                    for(var d=0;d<data.active.length;d++){
//                        $('.active ul').append(
//                            "<li>"+
//                            "<div class='banner' data-id="+data.active[d].id+">"+
//                            "<img src="+data.active[d].pic+">"+
//                            "</div>"+
//                            "<div class='foot'>"+
//                            "<div class='title'>"+data.active[d].title+"</div>"+
//                            "<div class='btn' data-id="+data.active[d].id+">立即参与</div>"+
//                            "</div>"+
//                            "</li>"
//                        );
//                    }
//                    $('.active ul li .banner,.active ul li .btn').click(function(){
//                        window.location.href="/index.php/Active/Active/index/media_id/<?php echo ($media_id); ?>/entry_id/<?php echo ($entry_id); ?>/active_id/"+$(this).attr('data-id')+"";
//                    });
//                }
//            },
//            error: function(){
//                //丢包统计
//            },
//        });
//    }
//    $('.fail .enter').click(function(){
//        $('.fail').hide(0);
//    });
//
//    //天降红包
//    var frist="<?php echo ($frist); ?>";
//    console.log(frist);
//    if(history.state.page==='intercept'&&frist==='1'){
//        $('#redPage').show(0);
//    }
//    $('#redPage .get').click(function (){
//        $('#redPage').hide(0);
//        $.ajax({
//            url:"/test/index.php/Activity/Ajax/run",
//            type:"POST",
//            dataType:"json",
//            data:{
//                uid:"<?php echo ($uid); ?>",
//                media_id:"<?php echo ($media_id); ?>",
//                entry_id:"<?php echo ($entry_id); ?>",
//                type:2,
//                active_id:"49",
//            },
//            success: function(data) {
//                if(data.status===1){
//                    $('.overlay-gift .get').attr('data-id',data.recordID).attr('data-href',data.prize.href);
//                    $('.overlay-gift .instr').html(data.prize.name);
//                    $('.overlay-gift .banner img').attr('src',data.prize.pic);
//                    $('.overlay-gift').show(0);
//                }
//            },
//            error: function() {
//                $('.fail').show(0);
//                $('.fail .font').html("网络不给力,再试一次吧");
//            },
//        });
//    });
//    $('#redPage .close').click(function (){
//        $('#redPage').hide(0);
//    });
//    $('.overlay-gift .get,.overlay-gift .banner').click(function(){
//        if(protect===true){
//            return;
//        }
//        protect=true;
//        $.ajax({
//            url:"/test/index.php/Activity/Ajax/receive",
//            type:"POST",
//            dataType:"json",
//            data:{
//                uid:"<?php echo ($uid); ?>",
//                member_id: "<?php echo ($member_id); ?>",
//                record_id:$('.overlay-gift .get').attr('data-id')
//            },
//            success: function(data){
//                protect=false;
//                if(data.status===1){
//                    window.location.href=$('.overlay-gift .get').attr('data-href');
//                }
//            },
//            error: function(){
//                //丢包统计
//                protect=false;
//                window.location.href=$('.overlay-gift .get').attr('data-href');
//            },
//        });
//    });
//
//    $('.overlay-gift .error').click(function(){
//        $('.overlay-gift').hide(0);
//    });
//
//    activeList();
</script>
</body>
</html>