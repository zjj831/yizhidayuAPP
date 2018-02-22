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
		优惠卷管理
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
			优惠卷管理
		</li>
	</ol>
</section>
 
        <section class="content">
       
<div class="box">
	<div class="box-header">
		<a class="btn btn-primary pull-right" href="<?php echo U('Coupon/couponcreate');?>">添加</a>
		<form action="<?php echo U('Coupon/index');?>"  method="get" class="form-inline">
			<div class="form-group">
                <label class="control-label">类型：</label>
                <select id="types" name="type" class="select form-control">
                    <option selected="selected" value="0">全部</option>
					<?php if(is_array($cate)): foreach($cate as $key=>$v1): ?><option value="<?php echo ($v1["id"]); ?>"><?php echo ($v1["title"]); ?></option><?php endforeach; endif; ?>
				</select>
            </div>
			<div  class="form-group">
            <label class="control-label">日期：</label>
 			<input  type="text" id="datepicker" name="date" data-provide="datepicker" placeholder="结束时间" class="form-control">

			</div>
               	<div class="form-group">
                <label class="control-label">标题：</label>
                <input name="keyword" type="text" size="30" placeholder="输入标题进行搜索" class="ipt form-control">
                
                <button type="submit" class="btn btn-default" >搜索</button>
            </div>	
		</form>
	</div><!-- /.box-header -->

	<div class="box-body" >
		<div  class="dataTables_wrapper form-inline dt-bootstrap">
			<div class="row">
				<div class="col-sm-12">
<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
						<thead>
							<tr role="row">
								<th >
									ID
								</th>
								<th >
									标题
								</th>
								<th >
									点赞量
								</th>
								<th >
									收藏量
								</th>
								<th >
									简介
								</th>
								<th >
									类别
								</th>
								<th >
									活动时间
								</th>
								<th >
									操作
								</th>
									</tr>
						</thead>
						<tbody>
						<?php if(is_array($datas)): foreach($datas as $key=>$item): ?><tr role="row">
									<td><?php echo ($item["id"]); ?></td>
									<td><?php echo ($item["title"]); ?></td>
									<td><?php echo ($item["upvote"]); ?></td>
									<td><?php echo ($item["collect"]); ?></td>
									<td><?php echo ($item["description"]); ?></td>
								<td><?php echo ($item["catename"]); ?></td>
									<td><?php echo ($item["validate"]); ?>-<?php echo ($item["enddate"]); ?></td>
									<td>
					<a href="<?php echo U('Coupon/index_home');?>?id=<?php echo ($item["id"]); ?>"><img class="myicon" style="display: inline;" src="<?php echo C('PUBLIC');?>/icon/bianji2.png"></img>  </a>
					<a href="" onclick="trashdialog('<?php echo ($item["id"]); ?>')"><img class="myicon" style="display: inline;" src="<?php echo C('PUBLIC');?>/icon/guanbi2.png"></img>  </a>					
										
									</td>
								
									</tr><?php endforeach; endif; ?>
						</tbody>
					</table>		
					<div class="result page"><?php echo ($page); ?></div>
				</div>
			</div>
			
		</div>
	</div><!-- /.box-body -->
</div>


<!-- Modal -->  
<div class="modal fade" id="myModal" style="background: rgba(0,0,0,0);" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">  
  <div class="modal-dialog">  
    <div class="modal-content">  
      <div class="modal-header">  
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>  
        <h4 class="modal-title" id="myModalLabel">评论</h4>  
      </div>  
      <div style="padding:5px;">  
      <div class="modal-body" data-scrollbar="true" data-height="200" data-scrollcolor="#000">  
  
  <ul id="comments" class="list-group">
  	
  </ul>
  
</div>  
      </div>  
      <!--<div class="modal-footer">  
     </div>  
    -->
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


	<script src="<?php echo C('PUBLIC');?>/adminlte/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo C('PUBLIC');?>/adminlte/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo C('PUBLIC');?>/adminlte/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

	<script type="text/javascript">
	
	/* center modal模态框居中 */  
function centerModals() {   
    $('#myModal').each(function(i) {   
        var $clone = $(this).clone().css('display', 'block').appendTo('body'); var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);   
        top = top > 0 ? top : 0;   
        $clone.remove();   
        $(this).find('.modal-content').css("margin-top", top);   
    });   
}   
$('#myModal').on('show.bs.modal', centerModals);   
$(window).on('resize', centerModals);  
	
	$("#myModal").draggable({   
    handle: ".modal-header",   
    cursor: 'move',   
    refreshPositions: false  
});  
	
	  $('#datepicker').datepicker({
  	 language: 'zh-CN',
  	 autoclose: true
  });
  


	
		function trashdialog(id){
	var ifdel = window.confirm("确认删除？\n(删除后无法恢复)");
	if (!ifdel) {
		return;
	}
	 $.get("<?php echo U('Coupon/index_destroy');?>?id="+id,function(data,status){
if(data=="ok"){
		alert("删除成功");
 	location.reload();
}else{
	alert(data);
}
});
}
function comment_destroy(cid,noteid){
	var ifdel = window.confirm("确认删除？\n(删除后无法恢复)");
	if (!ifdel) {
		return;
	}
		$.ajax({
                url: "<?php echo U('api/comment_destroy');?>?cid="+cid+"&noteid="+noteid,   
                success: function (data) {
//              alert('s');
		
//              	alert(data);
 if(data=="ok"){
		alert("删除成功");
 	 	location.reload();
// 	 	$('#myModal').modal('hide');
}else{
	alert(data);
}
                     },
                error: function (msg) {
                    alert("出错了！"+JSON.stringify(msg));
                }
            });   
	
	
}
	</script>
	


</body>
</html>