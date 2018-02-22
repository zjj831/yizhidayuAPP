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
			单卷管理
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
				单卷管理
			</li>
		</ol>
	</section>
 
        <section class="content">
       
	<div class="box">
		<div class="box-header">
			<a class="btn btn-primary pull-right" href="<?php echo U('Active/coupon_add');?>">添加</a>
			<form action="<?php echo U('Active/coupon');?>"  method="get" class="form-inline">
				<!--<div class="form-group">
                    <label class="control-label">类型：</label>
                    <select id="types" name="type" class="select form-control">
                        <option  value="全部">全部</option>
                        <option  value="未上线">未上线</option>
                        <option  value="已上线">已上线</option>
                    </select>
                </div>-->
				<div  class="form-group">
					<label class="control-label">日期：</label>
					<!--<input  type="text" id="datepicker" name="date" data-provide="datepicker" placeholder="按日期查找" class="form-control">-->
					<input placeholder="请选择开始时间" id='startTime' value="<?php echo date('Y-m-d H:i:s',$starttime);?>" maxlength="30"  style='cursor: pointer;margin-right: 0px;color: #444'>
					<input placeholder="请选择结束时间" id='overTime' value="<?php echo date('Y-m-d H:i:s',$overtime);?>" maxlength="30"  style='cursor: pointer;color: #444'>


				</div>
				<div class="form-group">
					<label class="control-label">标题：</label>
					<input name="name" type="text" size="30" placeholder="输入标题进行搜索" class="ipt form-control">

				</div>
			</form>
			<button type="" class="btn btn-default" >搜索</button>
		</div><!-- /.box-header -->

		<div class="scroll-box">
			<ul class="title clear">
				<li>ID</li>
				<li>权重</li>
				<li>状态</li>
				<li>优惠券信息</li>
				<li>所属公司</li>
				<li>结算方式</li>
				<li>结算单价</li>
				<li>发券量</li>
				<li>发券uv</li>
				<li>重复量</li>
				<li>发券arpu</li>
				<li>领券量</li>
				<li>领券uv</li>
				<li>重复量</li>
				<li>领券arpu</li>
				<li>券点击率</li>
				<li>消耗</li>
				<li>累计消耗</li>
				<li>券充值金</li>
				<li>日限制</li>
				<li>总量限制</li>
				<li>发券占比</li>
				<li>操作</li>
			</ul>
			<ul class="content1 clear m-total">
				<li>合</li>
				<li></li>
				<li><?php echo ($total['cert_load']); ?>/<?php echo ($dataCount); ?></li>
				<li><?php echo ($dataCount); ?></li>
				<li><?php echo ($dataCount); ?></li>
				<li></li>
				<li></li>
				<li><?php echo ($total['grant']); ?></li>
				<li><?php echo ($total['grant_uv']); ?></li>
				<li><?php echo number_format(($total['grant']/$total['grant_uv']),2);?></li>
				<li><?php echo ($total['grant_arpu']); ?></li>
				<li><?php echo ($total['catch']); ?></li>
				<li><?php echo ($total['catch_uv']); ?></li>
				<li><?php echo number_format(($total['catch']/$total['catch_uv']),2);?></li>
				<li><?php echo ($total['catch_arpu']); ?></li>
				<li><?php echo ($total['rotate']); ?>%</li>
				<li style="color:#ff4b04"><?php echo number_format($total['total']/100,2);?></li>
				<li style="color:#ff4b04"><?php echo number_format($total['cost']/100,2);?></li>
				<li style="color:#ff4b04"><?php echo number_format($total['balance']/100,2);?></li>
				<li><?php echo number_format($total['daily_limit'],0);?></li>
				<li><?php echo number_format($total['full_limit'],0);?></li>
				<li>100%</li>
				<li></li>
			</ul>
			<?php if(is_array($certList)): $k = 0; $__LIST__ = $certList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($k % 2 );++$k;?><ul class="content1 clear" id="<?php echo ($item['id']); ?>">
				<li><?php echo ($item['id']); ?></li>
				<li>
					<input data-id="<?php echo ($item['id']); ?>" class="weight" value="<?php echo ($item['weight']); ?>">
				</li>
				<li class="status" style="padding:0 10px">
					<?php if($item['status'] == 0): ?><span class="end status-btn" data-id="<?php echo ($item['id']); ?>">下架</span>
						<?php elseif($item['expiry_time'] < time()): ?>
						<span class="error status-btn" data-id="<?php echo ($item['id']); ?>">过期</span>
						<?php else: ?>
						<span class="load status-btn" data-id="<?php echo ($item['id']); ?>">上架</span><?php endif; ?>
				</li>

				<li style="overflow: inherit;padding-top: 0;">
					<div class='pic' style='top: -1px;'>
						<img src="<?php echo ($item['pic']); ?>" alt='picture' style='width: 100%'>
					</div>
					<a href="/test/index.php/Admin/Active/coupon_edit.html?id=<?php echo ($item['id']); ?>"><div class='instr' style='padding-left: 13.5rem;'><?php echo ($item['title']); ?></div></a>
				</li>
				<li><?php echo ($item['company']); ?></li>
				<li><?php echo ($item['type']); ?></li>
				<li style="color:#ff4b04"><?php echo ($item['price']); ?></li>
				<li><?php echo ($item['grant']); ?></li>
				<li><?php echo ($item['grant_uv']); ?></li>
				<li><?php echo number_format(($item['grant']/$item['grant_uv']),2);?></li>
				<li><?php echo ($item['grant_arpu']); ?></li>
				<li><?php echo ($item['catch']); ?></li>
				<li><?php echo ($item['catch_uv']); ?></li>
				<li><?php echo number_format(($item['catch']/$item['catch_uv']),2);?></li>
				<li><?php echo ($item['catch_arpu']); ?></li>
				<li><?php echo ($item['rotate']); ?>%</li>
				<li style="color:#ff4b04"><?php echo number_format($item['cost_money']/100,2);?></li>
				<li style="color:#ff4b04"><?php echo number_format($item['cost']/100,2);?></li>
				<li style="color:#ff4b04"><?php echo number_format($item['total']/100,2);?></li>
				<li><?php echo number_format($item['daily_limit'],0);?></li>
				<li><?php echo number_format($item['full_limit'],0);?></li>
				<li><?php echo number_format(($item['grant']/$total['grant'])*100,2);?>%</li>
				<li class="oper">
					<div class="owrap">
						<a href="/test/index.php/Admin/Active/coupon_edit.html?id=<?php echo ($item['id']); ?>"><span>查看详情</span></a>
					</div>
				</li>
			</ul><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="foot" style="margin-top: 20px;">
			<div class='total fl'>
				共计<span><?php echo ($dataCount); ?></span>条记录
			</div>
			<?php if($dataCount > $offnum): ?><ul>
					<?php if($Page != 1): ?><li data-src='<?php echo ($Page-1); ?>'>
							上一页
						</li><?php endif; ?>
					<?php $__FOR_START_153468338__=$startPage;$__FOR_END_153468338__=($viewPages+1);for($i=$__FOR_START_153468338__;$i < $__FOR_END_153468338__;$i+=1){ if($Page == $i): ?><li class='cur' data-src="<?php echo ($i); ?>"><?php echo ($Page); ?></li>
							<?php else: ?>
							<li data-src="<?php echo ($i); ?>"><?php echo ($i); ?></li><?php endif; } ?>
					<?php if($Page != $Pages): ?><li data-src='<?php echo ($Page+1); ?>'>
							下一页
						</li><?php endif; ?>
					<li><?php echo ($Page); ?>/<?php echo ($Pages); ?></li>
				</ul><?php endif; ?>
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
	<!--<script src="<?php echo C('PUBLIC');?>/adminlte/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>-->

	<script type="text/javascript">

        var checkList = document.getElementsByName('checkboxall[]');
        var flagCheck = document.querySelector("#chkAll");

        function checkAll() {
            for(var j = 0; j < checkList.length; j++) {
                if(!checkList[j].checked) {
                    break;
                }
            }
            if(j == checkList.length) {
                flagCheck.checked = true;
            }else{
                flagCheck.checked = false;
            }

        }
        function chkAll(obj){
            for (var i = checkList.length - 1; i >= 0; i--) {
                checkList[i].checked = obj.checked;
            };
        }
        for(var k = 0; k < checkList.length; k++) {
            checkList[k].onclick = checkAll;
        }


        $('#startTime').datepicker({
            language: 'zh-CN',
            autoclose: true
        });
        $('#overTime').datepicker({
            language: 'zh-CN',
            autoclose: true
        });



        $('.foot ul li').click(function(){
            if($(this).attr('data-src')){
                window.location.href="/test/index.php/Admin/Active/coupon.html?Page="+$(this).attr('data-src')+"&name="+$.trim($("#name").val())+"&starttime="+$("#startTime").val()+"&overtime="+$("#overTime").val()+"";
            }
        });
        $('.btn-default').click(function(){
            window.location.href="/test/index.php/Admin/Active/coupon.html?name="+$.trim($("#name").val())+"&starttime="+$("#startTime").val()+"&overtime="+$("#overTime").val()+"";
        });

        //排序函数
        var defalutWeight;
        $(".content li .weight").focus(function(){
            defalutWeight=parseInt($(this).val());
            $(this).addClass('cur');
        }).blur(function(){
            $('.over-suc').hide(0);
            $(this).removeClass('cur');
            if(parseInt($(this).val())===defalutWeight||/^[0-9]+[0-9]*]*$/.test($(this).val())===false){
                $(this).val(defalutWeight);
            }else{
                $.ajax({
                    url:"/test/index.php/Admin/Active/adver_cert_sort.html",
                    type:"POST",
                    data:{
                        'cert_id':$(this).attr('data-id'),
                        'weight':$(this).val(),
                    },
                    dataType:'json',
                    success: function(data){
                        if(data.status===1){
                            $('.over-suc').show(0);
                        }else{
                            alert(data.tip);
                        }
                    },
                    error:function(){

                    }
                });
            }
        }).keyup(function(event){
            if(event.keyCode ===13){
                $('.over-suc').hide(0);
                $(this).removeClass('cur').blur();
                if(parseInt($(this).val())===defalutWeight||/^[0-9]+[0-9]*]*$/.test($(this).val())===false){
                    $(this).val(defalutWeight);
                }else{
                    $.ajax({
                        url:"/test/index.php/Admin/Active/adver_cert_sort.html",
                        type:"POST",
                        data:{
                            'cert_id':$(this).attr('data-id'),
                            'weight':$(this).val(),
                        },
                        dataType:'json',
                        success: function(data){
                            if(data.status===1){
                                $('.over-suc').show(0);
                            }else{
                                alert(data.tip);
                            }
                        },
                        error:function(){

                        }
                    });
                }
            }
        });


        //批量删除
        $(".btn-danger").on("click",function(){

            var array=[];
            for(var j = 0; j < checkList.length; j++) {
                console.log(checkList[j].checked)
                if(checkList[j].checked==true) {
                    var id=checkList[j].value;
                    array.push(id);
                }
            }

            console.log(array);
            $.ajax({
                url:"<?php echo U('Note/notepldelete');?>",
                dataType:"json",
                data:{id:array},
                type:"post",
                success:function(data){
                    if(data=="1"){
                        alert("批量删除成功");
                        window.location.reload();
                    }
                }
            })
        })

        //状态函数
        var statusProtect=0;
        $(".content li .status-btn").click(function(){
            if(statusProtect===1){
                return;
            }
            statusProtect=1;
            $('.over-suc').hide(0);
            $.ajax({
                url:"/test/index.php/Admin/Active/adver_cert_status.html",
                type:"POST",
                data:{
                    'cert_id':$(this).attr('data-id'),
                },
                dataType:'json',
                success: function(data){
                    $('.over-suc').show(0);
                    if(data.status===1){
                        $("#"+data.id+" .status-btn").removeClass('end').addClass('load').html('上架');
                    }else{
                        $("#"+data.id+" .status-btn").removeClass('load').addClass('end').html('下架');
                    }
                    statusProtect=0;
                },
                error:function(){

                }
            });
        });



        function trashdialog(id){
            var ifdel = window.confirm("确认删除？\n(删除后无法恢复)");
            if (!ifdel) {
                return;
            }
            $.get("<?php echo U('Active/index_destroy');?>?id="+id,function(data,status){
                if(data=="ok"){
                    alert("删除成功");
                    location.reload();
                }else{
                    alert(data);
                }
            });
        }
        function openModal(noteid){
            $.ajax({
                url: "<?php echo U('api/getCommentsByNoteid');?>?noteid="+noteid,
                dataType: "json",
                contentType: "application/json",
                success: function (data) {

//              	alert(data['1']);
                    var optionstring = "";
                    for (var i=0;i<data.length;i++) {
                        optionstring += "<li class='list-group-item'>" + data[i]['content'] +"</br>(作者："+ data[i]['author']+")<span style='padding:0px 10px;'>"+ data[i]['createtime']  + "</span><button  onclick=\"comment_destroy('"+data[i]['id']+"','"+noteid+"')\">删除</button></li>";
                    }
                    $("#comments").html(optionstring);
                    centerModals();
                },
                error: function (msg) {
//                  alert("出错了！");
                }
            });
//			alert(json[0]);
            $('#myModal').modal('show');
//			$('#myModal'),show();


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