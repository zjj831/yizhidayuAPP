<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        一只大鱼后台管理系统
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo C('PUBLIC');?>/adminlte/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo C('PUBLIC');?>/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
    <link rel="stylesheet" href="<?php echo C('PUBLIC');?>/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="<?php echo C('PUBLIC');?>/adminlte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo C('PUBLIC');?>/adminlte/dist/css/skins/skin-purple-light.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo C('PUBLIC');?>/dist/bgypage.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo C('PUBLIC');?>/css/common.css"/>
    
   
    <style type="text/css">
        * {
            font-family: 'Microsoft Yahei', verdana;
        }
    </style>
</head>
<body class="hold-transition skin-purple-light sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo U('Index/index');?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">一只大鱼</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">一只大鱼后台管理系统</span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                  
                <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?php echo C('PUBLIC');?>/adminlte/dist/img/user2-160x160.jpg" class="user-image"
                                 alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo (session('admin_nickname')); ?> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?php echo C('PUBLIC');?>/adminlte/dist/img/user2-160x160.jpg" class="img-circle"
                                     alt="User Image">
                                <p>
                                   <?php echo (session('admin_nickname')); ?>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                <!--<a href="{{url('admin/user/')}}" class="btn btn-default btn-flat">
												个人信息
											</a>-->
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo U('Login/logout');?>" class="btn btn-default btn-flat">
                                        退出
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- search form (Optional) -->

            <div class="temp" style="height: 30px;">

            </div>
           
            <!-- /.search form -->
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <!--<li class="header">
                    导航
                </li>-->
                <!-- Optionally, you can add icons to the links -->
                <li class="">
                    <a href="<?php echo U('Index/index');?>">
                        <i class="fa fa-link">
                        </i> <span>首页</span>
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <i class="fa fa-link">
                        </i> <span>优惠卷管理</span>
                        <i class="fa fa-angle-left pull-right">
                        </i>
                    </a>
                    <ul class="treeview-menu ">
                        <li class="">
                            <a href="<?php echo U('Coupon/index');?>">
                                <i class="fa fa-circle-o"></i>优惠卷信息管理
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo U('Coupon/couponcate');?>">
                                <i class="fa fa-circle-o"></i>优惠卷种类管理
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo U('Coupon/couponcate2');?>">
                                <i class="fa fa-circle-o"></i>优惠卷分区管理
                            </a>
                        </li>
                        <!--<li class="">
                          <a href="#"><i class="fa fa-circle-o"></i>颜究所<i class="fa fa-angle-left pull-right"></i></a>
                          <ul class="treeview-menu  menu-open" style="display: block;">
                            <li>
                                <a href="<?php echo U('Worthbuy/index');?>">
                                    <i class="fa fa-circle-o"></i>值得买商品管理
                                </a>
                            </li>
                          </ul>
                        </li>-->
                    </ul>
                </li>
                <li class="">
                    <a href="#">
                        <i class="fa fa-link">
                        </i> <span>值得买管理</span>
                        <i class="fa fa-angle-left pull-right">
                        </i>
                    </a>
                    <ul class="treeview-menu ">
                        <li class="">
                            <a href="<?php echo U('Worthbuy/index');?>">
                                <i class="fa fa-circle-o"></i>值得买商品管理
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo U('Worthbuy/buycate');?>">
                                <i class="fa fa-circle-o"></i>值得买种类管理
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#">
                        <i class="fa fa-link">
                        </i> <span>分发活动管理</span>
                        <i class="fa fa-angle-left pull-right">
                        </i>
                    </a>
                    <ul class="treeview-menu ">
                        <li class="">
                            <a href="<?php echo U('Active/active');?>">
                                <i class="fa fa-circle-o"></i>活动管理
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo U('Active/coupon');?>">
                                <i class="fa fa-circle-o"></i>分发优惠卷管理
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="<?php echo U('User/index');?>">
                        <i class="fa fa-link">
                        </i> <span>会员信息管理</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo U('Feedback/index');?>">
                        <i class="fa fa-link">
                        </i> <span>反馈管理</span>
                    </a>
                </li>
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        
    <section class="content-header">
        <h1>
            添加单卷
            <!--<small>Optional description</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo U('Index/index');?>">
                    <i class="fa fa-dashboard">
                    </i> 首页
                </a>
            </li>
            <li class="active">
                添加单卷
            </li>
        </ol>
    </section>
 
        <section class="content">
       
    <div class="box">
        <div class="box-header">

        </div><!-- /.box-header -->

        <div class="box-body" >
            <div  class="">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-1">


                        <form class="form-horizontal" method="post" action="<?php echo U('Active/coupon_add_store');?>"  enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label" title="必填">卷权重 <span id=""  style="color: red;">
                      	*
                      </span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="0" id="weight" name="weight" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">类型:</label>
                                    <div class="col-sm-10">
                                        <input type="radio" name="type" value="CPC" ><label for="">CPC</label>
                                        <input type="radio" name="type" value="CPA"><label for="">CPA</label>
                                        <input type="radio" name="type" value="CPS" ><label for="">CPS</label>
                                        <input type="radio" name="type" value="CPM"><label for="">CPM</label>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label for="inputEmail3" class="col-sm-2 control-label" title="必填">优惠卷icon <span id=""  style="color: red;">
                      	*
                      </span> </label>
                                    <div class="col-sm-10" style="width:100px;height:100px;border:1px solid #ccc;position:relative;">
                                        <input type="hidden" value="<?php echo ($list["id"]); ?>" name="id" id="id">
                                        <input style="width:100px;height:100px;position:absolute;top:0;left:0;opacity: 0;z-index:5;" type="file" class="form-control" name="icon" id="inputEmail3" placeholder="">
                                        <input id="imgurl" type="hidden" class="form-control" name="imgurl" value="" placeholder="">
                                        <img id="img" style="width:100px;height:100px;position:absolute;top:0;left:0;" src="" alt="">
                                    </div>
                                </div>
                               <!-- <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label" title="必填">优惠卷banner <span id=""  style="color: red;">
                      	*
                      </span> </label>
                                    <div class="col-sm-10" style="width:100px;height:100px;border:1px solid #ccc;position:relative;">
                                     <input type="hidden" value="<?php echo ($list["id"]); ?>" name="id" id="id2">
                                        <input style="width:100px;height:100px;position:absolute;top:0;left:0;opacity: 0;z-index:5;" type="file" class="form-control" name="pic" id="inputEmail5" placeholder="">
                                        <input id="imgurl2"  type="hidden" class="form-control" name="imgurl2" value="" placeholder="">
                                        <img id="img2" style="width:100px;height:100px;position:absolute;top:0;left:0;" src="" alt="">
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label" title="必填">优惠卷banner <span id=""  style="color: red;">
                      	*
                      </span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"value=""  name="imgurl2"  id="imgurl2" placeholder="填写图片链接">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label" title="必填">后台名称 <span id=""  style="color: red;">
                      	*
                      </span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"value=""  name="title"  id="title" placeholder="后台标题名称,主要用于管理">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label" title="必填">优惠卷名称 <span id=""  style="color: red;">
                      	*
                      </span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"value=""  name="name"  id="name" placeholder="例:浪漫之夏手链优惠券">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label" title="必填">落地页链接 <span id=""  style="color: red;">
                      	*
                      </span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="href" name="href"  placeholder="如 https://www.yizhidayu.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label" title="必填">结算单价 <span id=""  style="color: red;">
                      	*
                      </span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="price" name="price"  placeholder="例:3元/A单价">
                                        <div class="tip">根据实际情况填写,比如6+2元</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label" title="必填">卷充值金 <span id=""  style="color: red;">
                      	*
                      </span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="0" id="total" name='total' placeholder="请填写优惠券金额">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label" title="必填">截止时间: <span id=""  style="color: red;">
                      	*
                      </span></label>
                                    <div class="col-sm-10">
                                        <input style="margin-left: 15px;" placeholder="请选择截止时间" id='expiry_time' name="expiry_time" value="<?php echo date('Y-m-d',$today);?>" maxlength="30"  style='cursor: pointer;margin-right: 0px;color: #444'>
                                   </div>
                                    <!--<div class="col-sm-10">-->
                                        <!--<input  type="text" class="form-control"value="<?php echo date('Y-m-d',$starttime);?>" id="expiry_time" name="expiry_time"  placeholder="">-->
                                    <!--</div>-->
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">操作系统:</label>
                                    <div class="col-sm-10">
                                        <input type="radio" name="system" value="" ><label for="">全部</label>
                                        <input type="radio" name="system" value="ios" ><label for="">IOS</label>
                                        <input type="radio" name="system" value="android"><label for="">android</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label" title="必填">日限制量 <span id=""  style="color: red;">
                      	*
                      </span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="0" id="daily_limit" name="daily_limit"  placeholder="">
                                    <div class="tip">0为不限制</div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label" title="必填">总限制量 <span id=""  style="color: red;">
                      	*
                      </span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="0" id="full_limit" name="full_limit"  placeholder="">
                                        <div class="tip">0为不限制</div>
                                    </div>
                                </div>
                               <!-- <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label" title="必填">日领券限制 <span id=""  style="color: red;">
                      	*
                      </span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="0" id="catch_day_limit" name="catch_day_limit"  placeholder="">
                                        <div class="tip">0为不限制</div>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label" title="必填">领券限制 <span id=""  style="color: red;">
                      	*
                      </span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="0" id="catch_limit" name="catch_limit"  placeholder="">
                                        <div class="tip">0为不限制</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">是否上架:</label>
                                    <div class="col-sm-10">
                                        <input type="radio" name="status" value="1" ><label for="">上架</label>
                                        <input type="radio" name="status" value="0"><label for="">下架</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">是否可以单卷上架:</label>
                                    <div class="col-sm-10">
                                        <input type="radio" name="isalone" value="1" ><label for="">是</label>
                                        <input type="radio" name="isalone" value="2"><label for="">否</label>
                                    </div>
                                </div>

                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right">保存</button>
                            </div><!-- /.box-footer -->
                        </form>

                    </div>
                </div>

            </div>
        </div><!-- /.box-body -->
    </div>

        <!-- Your Page Content Here -->
        </section>
    </div>
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            一只大鱼后台管理系统
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2017
         
            .</strong> All rights reserved.
    </footer>
    <!-- Control Sidebar -->

    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg">
    </div>
</div><!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.1.4 -->
<script src="<?php echo C('PUBLIC');?>/adminlte/plugins/jQuery/jQuery-2.1.4.min.js">
</script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo C('PUBLIC');?>/adminlte/bootstrap/js/bootstrap.min.js">
</script>
<!-- AdminLTE App -->
<script src="<?php echo C('PUBLIC');?>/adminlte/dist/js/app.min.js">
</script>
<script src="<?php echo C('PUBLIC');?>/js/form/trashall.js" type="text/javascript" charset="utf-8"></script>


    <script src="<?php echo C('PUBLIC');?>/adminlte/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo C('PUBLIC');?>/adminlte/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js" type="text/javascript" charset="utf-8"></script>

    <script>

        var url ="<?php echo U('Active/changepic');?>";
        var file;
        $("input[name='icon']").change(function(){
            file = this.files[0];
            console.log(file);
            var formdata=new FormData();
            formdata.append('file',file);
            var ajax=new XMLHttpRequest();
            ajax.onload=function(){
                var headimg=ajax.responseText;
                console.log(headimg);
                var photo=document.querySelector('#img');
                $(photo).attr("src",headimg);
                $("#imgurl").attr("value",headimg);
            };
            ajax.open('post',url);
            ajax.send(formdata);
        })
        $("input[name='pic']").change(function(){
            file = this.files[0];
            console.log(file);
            var formdata=new FormData();
            formdata.append('file',file);
            var ajax=new XMLHttpRequest();
            ajax.onload=function(){
                var headimg=ajax.responseText;
                console.log(headimg);
                var photo=document.querySelector('#img2');
                $(photo).attr("src",headimg);
                $("#imgurl2").attr("value",headimg);
            };
            ajax.open('post',url);
            ajax.send(formdata);
        })


        $("#m").change(function(){
            var id=$(this).children('option:selected').val();
            console.log(id);
            $.ajax({
                url:"<?php echo U('coupon/cateajax');?>",
                dataType:"json",
                data:{id:id},
                type:"post",
                success:function(data){
                    if(data.status=="2"){
                        $("#m2").hide();
                    }else{
                        $("#m2").children().remove();
                        $("#m2").show();
                        for (var i=0;i<data.length;i++){
                            $(`<option value="${data[i].id}">${data[i].title}</option>`).appendTo($('#m2'));
                        }
                    }
                }
            })
        });


        $('#expiry_time').datepicker({
            language: 'zh-CN',
            autoclose: true
        });
        $('#overTime').datepicker({
            language: 'zh-CN',
            autoclose: true
        });
    </script>


</body>
</html>