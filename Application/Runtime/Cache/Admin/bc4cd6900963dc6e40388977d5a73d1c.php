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
        添加优惠卷
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
			添加优惠卷
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


<form class="form-horizontal" method="post" action="<?php echo U('Coupon/couponchange');?>" enctype="multipart/form-data">
                  <div class="box-body">
                  	<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label" title="必填">标题 <span id=""  style="color: red;">
                      	*
                      </span></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo ($couponinfo["title"]); ?>" class="form-control" name="title" id="inputPassword3" placeholder="">
                      </div>
                    </div>
                      <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label" title="必填">封面图片 <span id=""  style="color: red;">
                      	*
                      </span> </label>
                          <div class="col-sm-10" style="width:300px;height:300px;border:1px solid #ccc;position:relative;">
                              <input type="hidden" value="<?php echo ($couponinfo["id"]); ?>" name="id" id="id">
                              <input style="width:300px;height:300px;position:absolute;top:0;left:0;opacity: 0;z-index:5;" type="file" class="form-control" name="img" id="inputEmail3" placeholder="">
                              <input id="imgurl" type="hidden" class="form-control" name="imgurl" value="<?php echo ($couponinfo["thumb"]); ?>" placeholder="">
                              <img id="img" style="width:300px;height:300px;position:absolute;top:0;left:0;" src="http://120.27.221.108/test/Public/Activity/<?php echo ($couponinfo["thumb"]); ?>" alt="">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label" title="必填">内容图片 <span id=""  style="color: red;">
                      	*
                      </span> </label>
                          <div class="col-sm-10" style="width:300px;height:300px;border:1px solid #ccc;position:relative;">
                              <input type="hidden" value="<?php echo ($couponinfo["id"]); ?>" name="id" id="id">
                              <input style="width:300px;height:300px;position:absolute;top:0;left:0;opacity: 0;z-index:5;" type="file" class="form-control" name="img2" id="inputEmail3" placeholder="">
                              <input id="imgurl2" type="hidden" class="form-control" name="imgurl2" value="<?php echo ($couponinfo["banner"]); ?>" placeholder="">
                              <img id="img2" style="width:300px;height:300px;position:absolute;top:0;left:0;" src="http://120.27.221.108/test/Public/Activity/<?php echo ($couponinfo["banner"]); ?>" alt="">
                          </div>
                      </div>


                      <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label" title="必填">链接 <span id=""  style="color: red;">
                      	*
                      </span></label>
                          <div class="col-sm-10">
                              <input type="text" value="<?php echo ($couponinfo["link"]); ?>" class="form-control" name="link" id="inputPassword3" placeholder="">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label" title="必填">简介 <span id=""  style="color: red;">
                      	*
                      </span></label>
                          <div class="col-sm-10">
                              <input type="text"  value="<?php echo ($couponinfo["description"]); ?>" class="form-control" name="description" id="inputPassword3" placeholder="">
                          </div>
                      </div>
                      <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label" title="必填">标签 <span id=""  style="color: red;">
                      	*
                      </span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo ($couponinfo["style"]); ?>" name="style" id="inputPassword3" placeholder="">
                      </div>
                  </div>

                      <!--<div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label" title="必填">结束时间 <span id=""  style="color: red;">
                      	*
                      </span></label>
                          <div class="col-sm-10">
                              <input  type="text" id="datepicker" value="<?php echo ($couponinfo["enddate"]); ?>" name="enddate" data-provide="datepicker" placeholder="结束时间" class="form-control">
                          </div>
                      </div>-->

                      <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label" title="必填">分类 <span id=""  style="color: red;">
                      	*
                      </span></label>
                          <select style="width:30%;float:left;margin-left:15px;"  id="m" name="cate1" class="select form-control">
                              <option value="0">请选择类别</option>
                              <?php if(is_array($pcate)): foreach($pcate as $key=>$v1): if($v1["id"] == $couponinfo["cate1"] ): ?><option selected="selected" value="<?php echo ($v1["id"]); ?>"><?php echo ($v1["title"]); ?></option>
                                      <?php else: ?>
                                      <option value="<?php echo ($v1["id"]); ?>"><?php echo ($v1["title"]); ?></option><?php endif; endforeach; endif; ?>
                          </select>
                          <?php if( $couponinfo["cate2"] == 0): ?><select style="width:30%;display: none;float:left;margin-left:35px;"  id="m2" name="cate2" class="select form-control">
                              <?php else: ?>
                              <select style="width:30%;float:left;margin-left:35px;"  id="m2" name="cate2" class="select form-control"><?php endif; ?>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label" title="必填">折扣区 <span id=""  style="color: red;">
                      </span></label>
                          <select style="width:30%;float:left;margin-left:15px;"  name="catetwo" class="select form-control">
                              <?php if($v1["id"] == 0 ): ?><option selected="selected" value="0">无分类</option>
                                  <?php else: ?>
                                  <option  value="0">无分类</option><?php endif; ?>
                              <?php if(is_array($cateid2)): foreach($cateid2 as $key=>$v1): if($v1["id"] == $couponinfo["cateid2"] ): ?><option selected="selected" value="<?php echo ($v1["id"]); ?>"><?php echo ($v1["title"]); ?></option>
                                      <?php else: ?>
                                      <option value="<?php echo ($v1["id"]); ?>"><?php echo ($v1["title"]); ?></option><?php endif; endforeach; endif; ?>
                          </select>

                          <select style="width:30%;display: none;float:left;margin-left:35px;"  id="m2" name="cate2" class="select form-control">

                          </select>
                      </div>

                      <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label" title="必填">优惠介绍 <span id=""  style="color: red;">
                      	*
                      </span></label>
                          <div class="col-sm-10">
                              <textarea  cols="75" rows="5" name="introduce"><?php echo ($couponinfo["introduce"]); ?> </textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label" title="必填">使用说明 <span id=""  style="color: red;">
                      	*
                      </span></label>
                          <div class="col-sm-10">
                              <textarea  cols="75" rows="5" name="useexp"><?php echo ($couponinfo["useexp"]); ?> </textarea>
                         </div>
                      </div>
                      <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label" title="必填">领取说明 <span id=""  style="color: red;">
                      	*
                      </span></label>
                          <div class="col-sm-10">
                              <textarea  cols="75" rows="5" name="receiveexp"> <?php echo ($couponinfo["receiveexp"]); ?></textarea>
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


        $('#datepicker').datepicker({
            language: 'zh-CN',
            autoclose: true
        });


        var url ="<?php echo U('Coupon/changepic');?>";
        var file;
        $("input[name='img']").change(function(){
            file = this.files[0];
            var formdata=new FormData();
            formdata.append('file',file);
            var ajax=new XMLHttpRequest();
            ajax.onload=function(){
                var headimg=ajax.responseText;
                var photo=document.querySelector('#img');
                $(photo).attr("src",headimg);
                $("#imgurl").attr("value",headimg);
            };
            ajax.open('post',url);
            ajax.send(formdata);
        })
        $("input[name='img2']").change(function(){
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
    </script>


</body>
</html>