<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title><?php echo ($registerInfo["title"]); ?>-报名结果--报名系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/enroll_test/Public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/enroll_test/Public/css/style.css">
    <link href="http://cdn.bootcss.com/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <!-- 导航栏 Start -->
  <header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="<?php echo U('Vote/index');?>" class="navbar-brand">报名系统</a>
      </div>
      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
        <ul class="nav navbar-nav first_ul">
            <li class="<?php echo ($voteClass); ?>">
              <a href="<?php echo U('Vote/index');?>">投票</a>
            </li>
            <li class="<?php echo ($registerClass); ?>">
              <a href="<?php echo U('Register/index');?>">报名</a>
            </li>
            <!-- <li class="<?php echo ($researchClass); ?>">
              <a href="<?php echo U('Research/index');?>">调查</a>
            </li> -->
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
      </nav>
    </div>
  </header>
  <!-- 导航栏 End-->



<div class="container">
  <div class="rows">
    <div class="col-md-12 content">
    	<ul class="nav nav-tabs" role="tablist">
    		<li role="presentation" class="<?php echo ($listClass); ?>"><a href="<?php echo U('Register/index');?>">报名列表</a></li>
		<li role="presentation" class="<?php echo ($addClass); ?>"><a href="<?php echo U('Register/add');?>">发起报名</a></li>
		<li role="presentation" class="<?php echo ($resultClass); ?>"><a href="javascript:;">报名项目结果</a></li>
	</ul>
    	    <div class="alert alert-info" role="alert" align="center"><?php echo ($registerInfo["title"]); ?>(已有 <i><?php echo ($totalRegister); ?></i> 位人员报名)    <button type="button" onclick="export_excel('tableExcel')">导出Excel</button></div>
	    <div class="table-responsive">
	    <table id="tableExcel" class="table table-hover">
	        <tr>
	            <th>报名ID</th>
	            <?php if(is_array($items)): foreach($items as $i=>$v): ?><th><?php echo ($v["title"]); ?></th><?php endforeach; endif; ?>
	        </tr>
	        <?php if(is_array($eachAction)): foreach($eachAction as $key=>$v): ?><tr>
	        	    <td><?php echo ($v["username"]); ?></td>
	        	    <?php if(is_array($v['action'])): foreach($v['action'] as $key=>$a): ?><td><?php echo ($a); ?></td><?php endforeach; endif; ?>
	            </tr><?php endforeach; endif; ?>
	    </table>
	</div>
	<div align="center"><?php echo ($page); ?></div>
	</div>
    </div>
</div>

    <script language="JavaScript" type="text/javascript">  
    var idTmr;  
    function  getExplorer() {  
        var explorer = window.navigator.userAgent ;  
        //ie  
        if (explorer.indexOf("MSIE") >= 0) {  
            return 'ie';  
        }  
        //firefox  
        else if (explorer.indexOf("Firefox") >= 0) {  
            return 'Firefox';  
        }  
        //Chrome  
        else if(explorer.indexOf("Chrome") >= 0){  
            return 'Chrome';  
        }  
        //Opera  
        else if(explorer.indexOf("Opera") >= 0){  
            return 'Opera';  
        }  
        //Safari  
        else if(explorer.indexOf("Safari") >= 0){  
            return 'Safari';  
        }  
    }  
    function export_excel(tableid) {  
        if(getExplorer()=='ie')  
        {  
            var curTbl = document.getElementById(tableid);  
            var oXL = new ActiveXObject("Excel.Application");  
            var oWB = oXL.Workbooks.Add();  
            var xlsheet = oWB.Worksheets(1);  
            var sel = document.body.createTextRange();  
            sel.moveToElementText(curTbl);  
            sel.select();  
            sel.execCommand("Copy");  
            xlsheet.Paste();  
            oXL.Visible = true;  
  
            try {  
                var fname = oXL.Application.GetSaveAsFilename("Excel.xls", "Excel Spreadsheets (*.xls), *.xls");  
            } catch (e) {  
                print("Nested catch caught " + e);  
            } finally {  
                oWB.SaveAs(fname);  
                oWB.Close(savechanges = false);  
                oXL.Quit();  
                oXL = null;  
                idTmr = window.setInterval("Cleanup();", 1);  
            }  
  
        }  
        else  
        {  
            tableToExcel(tableid)  
        }  
    }  
    function Cleanup() {  
        window.clearInterval(idTmr);  
        CollectGarbage();  
    }  
    var tableToExcel = (function() {  
        var uri = 'data:application/vnd.ms-excel;base64,',  
                template = '<html><head><meta charset="UTF-8"></head><body><table>{table}</table></body></html>',  
                base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) },  
                format = function(s, c) {  
                    // return s.replace(/{(w+)}/g,  
                    //             function(m, p) { return c[p]; }) }  
                    return s.replace(/{table}/g,c['table'])}  
        return function(table, name) {  
            if (!table.nodeType) table = document.getElementById(table)  

            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}  
            window.location.href = uri + base64(format(template, ctx))  
        }  
    })()  
  
</script>

  <div align="center">  
    <footer class="about-footer" role="contentinfo">
      <div class="container">
        <p><a rel="nofollow" href="http://www.njupt.edu.cn/">首页</a> | <a rel="nofollow" href="http://jwc.njupt.edu.cn/">教务处</a></p>
        <p>联系地址：南京市亚东新城区文苑路9号</p>
        <p>COPYRIGHT © Nanjing University of Posts and Telecommunications All Rights Reserved</p>
      </div>
    </footer>
  </div>
  <script src="/enroll_test/Public/js/jquery-2.1.0.min.js"></script>
  <script src="/enroll_test/Public/bootstrap/js/bootstrap.min.js"></script>
  <script src="/enroll_test/Public/js/main.js"></script>
  <script src="http://cdn.bootcss.com/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
  <script src="http://cdn.bootcss.com/bootstrap-datepicker/1.3.0/js/locales/bootstrap-datepicker.zh-CN.min.js"></script>

  <script type="text/javascript">
  $(document).ready(function(){
      //添加新条目
      $('#addItem').click(function(){
        var trLen = $('#optionTable tr').length;
        var end = trLen - 1;
        //此时还未将新的tr节点插入，所以option的个数等于tr的个数
        $('#optionNum').val(trLen);
        var trNode = $('<tr style="display: none"></tr>').html('<td><div class="input-group"><span class="input-group-btn"><button class="btn btn-danger deleteItem" type="button" data-toggle="tooltip" data-placement="right" title="删除此题">删除</button></span><select name="childType'+end+'" class="form-control"><?php if(is_array($optionType)): foreach($optionType as $k=>$val): ?><option value="<?php echo ($k); ?>"><?php echo ($val); ?></option><?php endforeach; endif; ?></select></div></td><td><input type="text" name="childTitle'+end+'" class="form-control require" placeholder="标题" /></td><td><input type="text" class="form-control require" name="childRange'+end+'" placeholder="排序" value="'+trLen+'"/></td><td><div class="input-group"><input type="text" class="form-control require" name="childOption'+end+'_1" placeholder="选项1"/><span class="input-group-btn"><button class="btn btn-info addOption" type="button" data-toggle="tooltip" data-placement="right" title="新建一个子选项">添加</button></span></div></td>');
        $('#optionTable').append(trNode);
        trNode.fadeIn('slow');
      })
  })
  </script>
  <script>
              $('#RangeDate .input-daterange').datepicker({
                    language: "zh-CN",
                    orientation: "top auto",
                    autoclose: true,
                    keyboardNavigation: false,
                    forceParse: false,
                    todayHighlight: true
               });
  </script>
  </body>
</html>