<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>管理员登录--报名系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/999/enroll_test/Public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/999/enroll_test/Public/css/style.css">
    <link rel="stylesheet" href="/999/enroll_test/Public/css/flipclock.css">
    <link href="http://cdn.bootcss.com/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" rel="stylesheet">
    <script src="/999/enroll_test/Public/js/jquery-2.1.0.min.js"></script>
    <script src="/999/enroll_test/Public/js/main.js"></script>
    <style>
        .jumbotron{
          background-image: url("");
          height: 10px;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <!-- 导航栏 Start -->
  <nav class="navbar navbar-inverse navbar-fixed-top nav-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="" class="navbar-brand">报名</a>
      </div>
      <div class="collapse navbar-collapse bs-navbar-collapse">
        <ul class="nav navbar-nav">
            <li>
              <a href=""></a>
            </li>
            <li>
              <a href=""></a>
            </li>
            <li>
              <a href=""></a>
            </li>
            <li>
              <a href=""></a>
            </li>
        </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if($_SESSION['login_uid']): ?><li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo ($_SESSION['login_username']); ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo U('User/logout');?>">退出</a></li>
                </ul>
              </li>
            <?php else: ?>
              <li><a href="<?php echo U('User/login');?>">登录</a></li><?php endif; ?>
          </ul>
      </div>
    </div>
  </nav>
  <!-- 导航栏 End-->
  <div class="jumbotron">
  </div>

	
	<link rel="stylesheet" href="/999/enroll_test/Public/css/register.css" type="text/css">
	<form  class="login" method="POST" action="<?php echo U('User/adregister');?>" >
	<div class="box">
		用户名：<input class="username " type="text" placeholder="用户名" name="username" value="<?php echo ($data['username']); ?>"> 至少四个字节
		<div class="feedback"></div>
		密码：<input class="password " type="password" placeholder="密码" name="password" value="<?php echo ($data['password']); ?>">   至少六个字节
		<div class="feedback"></div>
		确认密码：<input class="repassword " type="password" placeholder="确认密码" name="repassword" value="<?php echo ($data['repassword']); ?>">  
		<div class="feedback"></div>
		手机号：<input class="phone_number " type="text" placeholder="手机号" name="phone_number" value="<?php echo ($data['phone_number']); ?>">
		<div class="feedback"></div>
		邮箱：<input class="email " type="text" placeholder="邮箱" name="email" value="<?php echo ($data['email']); ?>">
		<div class="feedback"></div>
		当前管理员密码：<input class="adminpwd " type="password" placeholder="密码" name="adminpwd" >  <br>注意您正在创建一个新的管理员!
		<div class="feedback"></div>
		<?php echo ($statue); ?>
		<div class="button">
	        <button type="submit" class="btn btn-primary" id="align-center">注册</button> 
            <button type="button" class="btn btn-primary" id="align-center" onClick="location.href='login'" >返回</button>
		</div>
	</div>

  <div align="center">  
    <footer class="about-footer" role="contentinfo">
      <div class="container">
        <p><a rel="nofollow" href="http://www.njupt.edu.cn/">首页</a> | <a rel="nofollow" href="http://jwc.njupt.edu.cn/">教务处</a></p>
        <p>联系地址：南京市亚东新城区文苑路9号</p>
        <p>COPYRIGHT © Nanjing University of Posts and Telecommunications All Rights Reserved</p>
      </div>
    </footer>
  </div>
  
  <script src="/999/enroll_test/Public/bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>