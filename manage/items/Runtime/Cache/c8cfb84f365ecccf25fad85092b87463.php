<?php if (!defined('THINK_PATH')) exit(); if(!session('?username')){ redirect(C('BASE_URL')); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>后台管理系统</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/Public/Style/style.css" />
<script type="text/javascript" src="/Public/Script/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Script/script.js"></script>
<script type="text/javascript" src='/Public/Script/ajaxfileupload.js'></script>
<script type="text/javascript" src='/Public/Script/upload.js'></script>  
<script type="text/javascript" src='/Public/Script/jquery.cookie.js'></script> 
<script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.1.js"></script>
<link rel="stylesheet" type="text/css" href="/fancybox/jquery.fancybox-1.3.1.css" />
<!--时间控件-->
<link rel="stylesheet" href="/Public/jQuery_calendar/css/datepicker.css" type="text/css" />
<script type="text/javascript" src="/Public/jQuery_calendar/js/datepicker.js"></script>
<script type="text/javascript" src="/Public/jQuery_calendar/js/eye.js"></script>
<script type="text/javascript" src="/Public/jQuery_calendar/js/utils.js"></script>
<script type="text/javascript" src="/Public/jQuery_calendar/js/layout.js?ver=1.0.2"></script>
   
<!--区域控件--> 
<link rel="stylesheet" href="/Public/Style/jquery.Jcrop.css" type="text/css" />
<script src="/Public/script/jquery.Jcrop.js" type="text/javascript"></script>

<script type="text/javascript">
var groupfile = '<?php echo ($group["guid"]); ?>';
$(function(){
	$('#oneimg,#twoimg,#threeimg,#fourimg').click(function(){
		$(this).attr('href','/'+$("#"+$(this).attr('id')+"_value").val());
	});
	$('#oneimg,#twoimg,#threeimg,#fourimg').fancybox();
	
	$('.alert .close').click(function(){
		$(this).parent().slideUp();
		$.ajax({url:"__APP__/Index/unseterror",async:false});
	});
	setTimeout('removeerror()',2500);
});
</script>
</head>
<body>
<div id="header"><a href="__APP__" style="top:0;"><img src="/Public/Image/Yihe.png"></a> </div>
<div id="user-nav">
  <ul class="nav">
    <li class=""><a href="/index.php/Index/outlogin"><i class="icon-share-alt"></i><span>退出系统</span></a></li>
  </ul>
</div>
<div id="sidebar">
  <ul>
    <li class="nav-li submenu"> <a href="#"><span class="icon-chevron-down"></span><span>设置</span></a>
      <ul>
        <?php if(session('?isadmin') && session('uid')=='1'){ ?>
          <li><a href="__APP__/Dir/index/groupid/<?php echo ($group["guid"]); ?>">栏目设置</a></li>
          <li><a href="__APP__/Model/index/groupid/<?php echo ($group["guid"]); ?>">首页视频上传</a></li>
        <?php }?>
      </ul>
    </li>
    <li class="nav-li submenu"> <a href="__APP__/Code/index/groupid/<?php echo ($group["guid"]); ?>"><span class="icon-chevron-down"></span><span>账号管理</span></a>
    <li class="nav-li submenu"> <a href="#"><span class="icon-chevron-down"></span><span>栏目素材管理</span></a>
      <ul>
        <li><a href="__APP__/Content/index/pid/6EB3AA74B83AE1208D22263E2A2A3672">企业梦</a></li>
        <li><a href="__APP__/Content/index/pid/096C17930C3A32BEA3FC8A451008395B">企业荣誉</a></li>
        <li><a href="__APP__/Content/index/pid/893FA0DC5E991B28FF888FE3527F126A">发家史</a></li>
        <li><a href="__APP__/Dir/index/pid/AC87C1658572CEFF3F9542D11ADD75E2">团队秀</a></li>
        <li><a href="__APP__/Dir/index/pid/E4BEE8FCD79979F5DE99B60F5E1DA2D7">赚钱户</a></li>
        <li><a href="__APP__/Dir/index/pid/96B67DCBBE31D5B3E960B3453063927D">门品美</a></li>
        <li><a href="__APP__/Dir/index/pid/34BFB98606D2346CF83339AF82346B74">店面豪</a></li>
      </ul>
    </li>
    <li class="nav-li submenu"> <a href="#"><span class="icon-chevron-down"></span><span>产品模块</span></a>
      <ul>
        <li><a href="__APP__/Protype/index/groupid/<?php echo ($group["guid"]); ?>">产品属性分类</a></li>
        <li><a href="__APP__/Prodir/index/groupid/<?php echo ($group["guid"]); ?>">产品系列</a></li>
        <li><a href="__APP__/Order/index/groupid/<?php echo ($group["guid"]); ?>">订单列表</a></li>
      </ul>
    </li>
    <li class="nav-li submenu"> <a href="#"><span class="icon-chevron-down"></span><span>DIY列表</span></a>
      <ul>
        <li><a href="__APP__/Diy/index/groupid/<?php echo ($group["guid"]); ?>">DIY</a></li>
      </ul>
    </li>
  </ul>
</div>
<script type="text/javascript">
$(function(){
  $('form').submit(function(){
    if($('form input[name=title]').val().length < 5 || $('form input[name=title]').val().length >12){
      alert('用户名只能输入5-12个字母或数字!');
      $('form input[name=title]').focus();
      return false;
    }else if($('form input[name=password]').val().length < 6 || $('form input[name=password]').val().length > 15){
      alert('密码只能输入6-15个字母或数字!');
      $('form input[name=password]').focus();
      return false;
    }
  })
})
</script>
<div id="content">
  <div id="content-header">
    <h1><?php echo ($group["title"]); ?></h1>
  </div>
  <div id="breadcrumb"><a href="#" class="current"><i class="icon-home"></i><?php echo ($group["title"]); ?></a> <a href="#" class="current">账号管理</a> </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <?php if($_SESSION['error']!= ''): ?><div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a><?php echo (session('error')); ?></div><?php endif; ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>验证码添加</h5>
        </div>
        <form action="__URL__/submit_add" name="form" method="post" enctype="application/x-www-form-urlencoded" class="form-horizontal">
          <div class="widget-content nopadding">
            <div class="control-group">
              <label class="control-label">用户名:</label>
              <div class="controls">
                <input name="username" type="text" value=""  class="span11"  size="40" maxlength="12" onblur="this.value=this.value.replace(/[\W]/g,'')"/>
                <span class="help-block" style="color:#f00;">(注:请输入个5-12位字母或数字!)</span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">密码:</label>
              <div class="controls">
                <input type="text" name="password" class="span11" size="40" maxlength="15" onblur="this.value=this.value.replace(/[\W]/g,'')"/>
                <span class="help-block" style="color:#f00;">密码只能输入6-15个字母或数字</span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">姓名:</label>
              <div class="controls">
                <input name="nickname" type="text" value=""  class="span11"  size="40" maxlength="12"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">电话:</label>
              <div class="controls">
                <input name="phone" type="text" value=""  class="span11"  size="40" maxlength="20" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">地区:</label>
              <div class="controls">
                <input name="address" type="text" value=""  class="span11"  size="140" maxlength="255"/>
              </div>
            </div>
            <div class="form-actions">
              <input type="hidden" name="groupid" value="<?php echo ($group["guid"]); ?>">
              <button type="submit" class="btn btn-success">保存</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body></html>