<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title><?php echo ($proInfo["title"]); ?>--报名系统</title>
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
              <li><a href="<?php echo U('User/login');?>">登录</a></li><?php endif; ?>
          </ul>
      </div>
    </div>
  </nav>
  <!-- 导航栏 End-->
  <div class="jumbotron">
  </div>


<div class="container">
    <div class="rows">
    	<div class="col-md-12">
    	    <?php switch($proSign["notice"]): case "0": break;?>
    	    	<?php case "2": ?><div class="alert alert-danger" role="alert" align="center"><?php echo ($proSign["msg"]); ?>
    	    		</div>
    	    		<div class="row">
    	    		    <div class="col-md-8 col-md-offset-2">
    	    		        <div class="flipclock"></div>
    	    		    </div>
    	    		</div>
    	    		<script type="text/javascript" src="/enroll_test/Public/js/flipclock.min.js"></script>
    	    		<script type="text/javascript">
    	    		    initFlipclock('.flipclock', <?php echo ($proSign["timeLong"]); ?>)
    	    		    console.log($('button[type="submit"]'))
    	    		    $('button[type="submit"]').attr('disabled', 'disabled')
    	    		</script><?php break;?>
    	    	<?php default: ?><div class="alert alert-danger" role="alert" align="center"><?php echo ($proSign["msg"]); ?></div><?php endswitch;?>
    	    <div class="alert alert-success" role="alert" align="center"><?php echo ($proInfo["title"]); ?>
    	    </div>
	    <form id="submitProForm" class="form-horizontal well" role="form" method="post" action="<?php echo U('Post/index');?>">
	        <?php if(is_array($items)): foreach($items as $i=>$v): ?><div class="panel panel-default">
	        	    <div class="panel-heading">
	        	    	<h3 class="panel-title"><?php echo ($i+1); ?>、<?php echo ($v["title"]); ?></h3>
	        	    </div>
	        	    <div class="panel-body require">
	        	    	<?php switch($v["type"]): case "textarea": ?><textarea name="<?php echo ($i); ?>" class="form-control" row="3"></textarea><?php break;?>
	        	    		<?php case "text": ?><input type="text" name="<?php echo ($i); ?>" class="form-control" /><?php break;?>
	        	    		<?php case "radio": if(is_array($v["options"])): foreach($v["options"] as $j=>$vv): ?><div class="radio" >
	        	    				<label>
	        	    					<input type="<?php echo ($v["type"]); ?>" name="<?php echo ($i); ?>" value="<?php echo ($j); ?>"><?php echo ($vv); ?>
	        	    				</label>
	        	    			</div><?php endforeach; endif; break;?>
	        	    		<?php case "checkbox": if(is_array($v["options"])): foreach($v["options"] as $j=>$vv): ?><div class="checkbox">
	        	    				<label>
	        	    					<input type="<?php echo ($v["type"]); ?>" name="<?php echo ($i); ?>[]" value="<?php echo ($j); ?>"><?php echo ($vv); ?>
	        	    				</label>
	        	    			</div><?php endforeach; endif; break; endswitch;?>
	        	    </div>
	        	</div><?php endforeach; endif; ?>
	        <input type="hidden" name="formActionType" value="submitPro" />
	        <input type="hidden" name="pid" value="<?php echo ($proInfo["id"]); ?>" />
	        <div align="center">
	        	<button type="submit" class="btn btn-primary btn-md" <?php echo ($proSign['notice']==0?"":"disabled"); ?>>提交</button>
	        	<?php if(($proInfo["see_able"]) == "1"): ?><a class="btn btn-info" href="<?php echo U('Vote/result','voteId='.$proInfo['id']);?>" target="_blank">查看结果</a><?php endif; ?>
	        </div>
	    </form>
	</div>
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