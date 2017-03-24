<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title><?php echo ($voteInfo["title"]); ?>-投票结果--报名系统</title>
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


<div class="container">
    <div class="rows">
    	<div class="col-md-12">
    	    <div class="alert alert-success" role="alert" align="center">
    	    	<?php echo ($voteInfo["title"]); ?>
    	    </div>
	        <?php if(is_array($items)): foreach($items as $i=>$v): ?><div class="panel panel-default">
	        	    <div class="panel-heading">
	        	    	<h3 class="panel-title">
	        	    	    <a data-toggle="collapse" href="#collapse_<?php echo ($i); ?>"><?php echo ($i+1); ?>、<?php echo ($v["title"]); ?></a>
	        	    	</h3>
	        	    </div>
	        	    	<table class="table in" id="collapse_<?php echo ($i); ?>">
	        	    		<tr>
	        	    		    <th width="30%">选项</th>
	        	    		    <th width="70%">投票结果</th>
	        	    		</tr>
	        	    		<?php if(($v["type"] == 'text') OR ($v["type"] == 'textarea')): ?><tr>
				    	<td><?php echo ($v["options"]["0"]); ?></td>
				    	<td>
				    		<?php if(is_array($v['results'])): foreach($v['results'] as $j=>$vv): if(($j) == "5"): ?><div id="collapse_<?php echo ($i); ?>_hideContent" style="display: none"><?php endif; ?>
				    		    <p><?php echo ($vv); ?></p><?php endforeach; endif; ?>
				    		<?php if((count($v["results"])) > "5"): ?></div>
				    		    <a class="clickToggle" href="javascript:;">点击展开</a><?php endif; ?>
				    	</td>
				    </tr>
	        	    		<?php else: ?>
	        	    		<?php if(is_array($v["options"])): foreach($v["options"] as $j=>$vv): ?><tr>
	        	    		    <td><?php echo ($j+1); ?>、<?php echo ($vv); ?></td>
	        	    		    <td>
	        	    		    	<?php if(($v['results'][$j]) == "0"): ?><span>0%</span>
	        	    		    	<?php else: ?>
	        	    		    	<span class="progress">
					<span class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo (sprintf('%.2f',$v['results'][$j]*100/$v['totalVotes'])); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (sprintf('%.2f',$v['results'][$j]*100/$v['totalVotes'])); ?>%;" min-width="20px"><?php echo (sprintf('%.2f',$v['results'][$j]*100/$v['totalVotes'])); ?>%</span>
					</span><?php endif; ?>
				    </td>
				</tr><?php endforeach; endif; endif; ?>
	        	    	</table>
	        	</div><?php endforeach; endif; ?>
	        <div align="center">
	        	<a class="btn btn-info" href="<?php echo U('Show/index','proId='.$voteInfo['id']);?>">参与投票</a>
	        </div>
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
  
  <script src="/999/enroll_test/Public/bootstrap/js/bootstrap.min.js"></script>
  
  </body>
</html>