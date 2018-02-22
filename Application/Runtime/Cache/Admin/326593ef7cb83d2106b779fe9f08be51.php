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
		管理分类
		<!--<small>Optional description</small>-->
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard">
				</i> 首页
			</a>
		</li>
		<li class="active">
			管理分区
		</li>
	</ol>
</section>
 
        <section class="content">
       
	<div class="box">
		<div class="box-header">
			<a class=" btn btn-primary pull-right" href="<?php echo U('Coupon/addcategory2');?>">添加分类</a>
		</div>
		<div class="box-body" >
			<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="container-fluid">
				<div id=<?php echo ($item["id"]); ?> class="row" style="background:#ECF0F5;height:50px;line-height:50px;font-size:20px;">
					<span style="border:none;background:#ECF0F5;box-sizing: border-box;" class="col-sm-10"><?php echo ($item["title"]); ?></span>
					<span class="col-sm-1 glyphicon glyphicon-trash del1" style="height:50px;line-height:50px;"></span>
				</div>


			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
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


	<script>


		$('.container-fluid').delegate('.glyphicon-chevron-down',"click",function(){
		    $(this).parent().nextAll().slideToggle();
		})


		$('.del1').on("click",function(){
            var that=$(this).parent();
            var id=that.attr("id");
            var ifdel = window.confirm("确认删除？\n(删除后无法恢复)");
            if (!ifdel) {
                return;
            }
            var ifdel2 = window.confirm("确认删除该一级分类？\n(删除后无法恢复)");
            if (!ifdel) {
                return;
            }
            console.log(id);
            $.ajax({
                url:"<?php echo U('Coupon/deletecate2');?>",
                data:{id:id},
                dataType:"json",
                type:"post",
                success:function(data){
                     if(data.status==1){
                        that.parent().remove();
                        alert("删除该一级分类成功");
                    }else{
                        alert("删除失败");
                    }
                }
            })
		})

	</script>


</body>
</html>