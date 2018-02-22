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
		活动管理
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
			活动管理
		</li>
	</ol>
</section>
 
        <section class="content">
       
<div class="box">
	<div class="box-header">
		<a class="btn btn-primary pull-right" href="<?php echo U('Active/active_add');?>">添加</a>
		<button type=""  style="float: right" class="btn btn-default" >搜索</button>
		<form action=""  method="" class="form-inline">
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
				<input placeholder="请选择开始时间" id='startTime'  data-provide="datepicker" value="<?php echo date('Y-m-d H:i:s',$starttime);?>" maxlength="30"  style='cursor: pointer;margin-right: 0px;color: #444' class="form-control">
				<input placeholder="请选择结束时间" id='overTime' data-provide="datepicker" value="<?php echo date('Y-m-d H:i:s',$overtime);?>" maxlength="30"  style='cursor: pointer;color: #444' class="form-control">


			</div>
               	<div class="form-group">
                <label class="control-label">标题：</label>
                <input name="name" type="text" size="30" placeholder="输入标题进行搜索" class="ipt form-control">
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
								<!--<th>批量选择</th>-->
								<th >ID</th>
								<th >权重</th>
								<th style="width:200px;">活动信息</th>
								<th >参与临界值</th>
								<th >参与UV</th>
								<th >访问UV</th>
								<th >参与率</th>
								<th >创建时间</th>
								<th >状态</th>
								<th >操作</th>
							</tr>
						</thead>
						<tbody>
						<tr>
							<td></td>
							<td>合计</td>
							<td><?php echo ($dataCount); ?></td>
							<td></td>
							<td><?php echo ($total['join_uv']); ?></td>
							<td><?php echo ($total['uv']); ?></td>
							<td><?php echo number_format(($total['join_uv']/$total['uv'])*100,2);?>%</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php if(is_array($activeList)): foreach($activeList as $key=>$item): ?><tr role="row">
									<!--<td><input name="checkboxall[]" type="checkbox" value="<?php echo ($item["id"]); ?>"></td>-->
								<td>
									<?php echo ($item['id']); ?>
								</td>
								<td>
									<input data-id="<?php echo ($item['id']); ?>" style="width: 40px;" class="weight" value="<?php echo ($item['weight']); ?>">
								</td>
								<td style="overflow: inherit;">
									<!--<div class='qr' id="<?php echo ($item['id']); ?>">
										<div class='wrap'>
											<div class='inIcon'></div>
											<img src="https://tool.kd128.com/qrcode?text=<?php echo ($item['url']); ?>" alt='qr'>
											<h3>手机扫二维码预览</h3>
										</div>
									</div>-->
									<div class='pic' style="width: 90px;float: left;">
										<img src="<?php echo ($item['icon']); ?>" alt='picture' style='width: 80px;height:43.75px;'>
									</div>
									<div class='instr' style=" width: 80px;float: left; line-height: 18px;height: 36px;margin: 10px 0;font-size: 13px;color: #666;text-align: center;"><?php echo ($item['title']); ?></div>
								</td>
								<td><?php echo ($item['determine']); ?></td>
								<td><?php echo ($item['activeJoin']); ?></td>
								<td><?php echo ($item['activeTotal']); ?></td>
								<td><?php echo number_format(($item['activeJoin']/$item['activeTotal']),4)*100;?>%</td>
								<td><?php echo date('Y-m-d',$item['create_time']);?></td>
								<td class="status">
									<?php if($item['status'] == 2): ?><span>下架</span>
										<?php elseif($item['status'] == 1): ?>
										<span>上线</span><?php endif; ?>
								</td>
									<td>
										
										
					<a href="<?php echo U('Active/active_edit');?>?id=<?php echo ($item["id"]); ?>"><img class="myicon" style="display: inline;" src="<?php echo C('PUBLIC');?>/icon/bianji001.png"></img>  </a>
					<!--<a href="" onclick="trashdialog('<?php echo ($item["id"]); ?>')"><img class="myicon" style="display: inline;" src="<?php echo C('PUBLIC');?>/icon/guanbi001.png"></img>  </a>-->
									</td>
								
									</tr><?php endforeach; endif; ?>

						</tbody>
					</table>
					<div class="foot">
						<div class='total fl'>
							共计<span><?php echo ($dataCount); ?></span>条记录
						</div>
						<?php if($dataCount > $offnum): ?><ul style="list-style: none;">
								<?php if($Page != 1): ?><li data-src='<?php echo ($Page-1); ?>'>
										上一页
									</li><?php endif; ?>
								<?php $__FOR_START_1868729686__=$startPage;$__FOR_END_1868729686__=($viewPages+1);for($i=$__FOR_START_1868729686__;$i < $__FOR_END_1868729686__;$i+=1){ if($Page == $i): ?><li class='cur' data-src="<?php echo ($i); ?>"><?php echo ($Page); ?></li>
										<?php else: ?>
										<li data-src="<?php echo ($i); ?>"><?php echo ($i); ?></li><?php endif; } ?>
								<?php if($Page != $Pages): ?><li data-src='<?php echo ($Page+1); ?>'>
										下一页
									</li><?php endif; ?>
								<li><?php echo ($Page); ?>/<?php echo ($Pages); ?></li>
							</ul><?php endif; ?>
					</div>
					<!--<div class="result page"><?php echo ($page); ?></div>-->
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
            window.location.href="/test/index.php/Admin/Active/active.html?Page="+$(this).attr('data-src')+"&name="+$.trim($("#name").val())+"&starttime="+$("#startTime").val()+"&overtime="+$("#overTime").val()+"";
        }
    });
    $('.btn-default').click(function(){
        window.location.href="/test/index.php/Admin/Active/active.html?name="+$.trim($("#name").val())+"&starttime="+$("#startTime").val()+"&overtime="+$("#overTime").val()+"";
      });

    //排序函数
    var defalutWeight;
    $(" .weight").focus(function(){
        defalutWeight=parseInt($(this).val());
        $(this).addClass('cur');
    }).blur(function(){
        $('.over-suc').hide(0);
        $(this).removeClass('cur');
        if(parseInt($(this).val())===defalutWeight||/^[0-9]+[0-9]*]*$/.test($(this).val())===false){
            $(this).val(defalutWeight);
        }else{
            $.ajax({
                url:"/test/index.php/Admin/Active/active_sort",
                type:"POST",
                data:{
                    'active_id':$(this).attr('data-id'),
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
                    url:"/test/index.php/Admin/Active/active_sort",
                    type:"POST",
                    data:{
                        'active_id':$(this).attr('data-id'),
                        'weight':$(this).val(),
                    },
                    dataType:'json',
                    success: function(data){
                        alert(data);
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