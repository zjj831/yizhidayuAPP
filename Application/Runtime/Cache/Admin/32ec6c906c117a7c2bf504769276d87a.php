<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>一只大鱼-后台管理系统</title>
    <!-- Fonts -->
    <link href="<?php echo C('PUBLIC');?>/font-awesome-4.5.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <!--<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>-->

    <!-- Styles -->
   <link href="<?php echo C('PUBLIC');?>/adminlte/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

             

                <!-- Branding Image -->
                    <a class="" href="<?php echo U('Index/index');?>">
                    <!--hello汀-后台管理系统-->
                    <img src="https://www.yizhidayu.com/Public/Media/media/new/img/logo.png" style="height: 80px;"/>
                </a>
            </div>

          
        </div>
    </nav>

   
   <div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-1" style="margin-top: 16px;text-align: right;">
           <img src="<?php echo C('PUBLIC');?>/img/cloth1.jpg" style="height: 50%;width: 100%;"/>
            	</div>
        <div class="col-md-6" style="margin-top: 16px;">
            <div class="panel panel-default">
                <div class="panel-heading">管理员登录</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo U('login');?>">
                       
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">用户名：</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" value="">

                                <!--@if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif-->
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" >
                            <label class="col-md-4 control-label"  style="margin-top: 16px;">密码：</label>

                            <div class="col-md-6"  style="margin-top: 16px;">
                                <input type="password" class="form-control" name="password" >

                                <!--@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif-->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> 记住我
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>登录
                                </button>

                                <!--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  
</body>
</html>