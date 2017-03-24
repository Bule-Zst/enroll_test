<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>管理员登录--报名系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/enroll_test/Public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/enroll_test/Public/css/style.css">
    <link rel="stylesheet" href="/enroll_test/Public/css/flipclock.css">
    <link href="http://cdn.bootcss.com/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" rel="stylesheet">
    <script src="/enroll_test/Public/js/jquery-2.1.0.min.js"></script>
    <script src="/enroll_test/Public/js/main.js"></script>
    <style>
        .jumbotron{
          background-image: url("");
          height: 350px;
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
              <li><a href="">登录</a></li><?php endif; ?>
          </ul>
      </div>
    </div>
  </nav>
  <!-- 导航栏 End-->
  <div class="jumbotron">
  </div>


	<link rel="stylesheet" href="/enroll_test/Public/css/login.css" type="text/css">
	<div class="login">
		用户名：<input class="username" type="text" placeholder="用户名">
		<div class="feedback"></div>
		密码：<input class="password" type="password" placeholder="密码"> <input onclick="show_pwd_func()" class="checkbox" type="checkbox">
		<div class="feedback"></div>
		<div class="button">
			<a style="text-decoration: none;" target="_blank" href="<?php echo U('User/register_index');?>"><button class="registration">注册</button></a>
			<button class="login_button" onclick="login()">登陆</button>
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
  
  <script src="/enroll_test/Public/bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>
	<!-- 放在include后面，因为要使用include里包含的jquery -->
    <script type="text/javascript" src="/enroll_test/Public/js/login.js"></script>