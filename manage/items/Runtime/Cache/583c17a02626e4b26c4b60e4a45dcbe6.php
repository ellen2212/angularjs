<?php if (!defined('THINK_PATH')) exit(); if(!session('?username')){ redirect(C('BASE_URL')); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>后台管理系统</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo (C("BASE_URL")); ?>Public/Style/style.css" />
<script type="text/javascript" src="<?php echo (C("BASE_URL")); ?>Public/Script/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo (C("BASE_URL")); ?>Public/Script/script.js"></script>
<script type="text/javascript" src='<?php echo (C("BASE_URL")); ?>Public/Script/ajaxfileupload.js'></script>
<script type="text/javascript" src='<?php echo (C("BASE_URL")); ?>Public/Script/upload.js'></script>  
<script type="text/javascript" src='<?php echo (C("BASE_URL")); ?>Public/Script/jquery.cookie.js'></script> 
<script type="text/javascript" src="<?php echo (C("BASE_URL")); ?>fancybox/jquery.fancybox-1.3.1.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo (C("BASE_URL")); ?>fancybox/jquery.fancybox-1.3.1.css" />
<!--时间控件-->
<link rel="stylesheet" href="<?php echo (C("BASE_URL")); ?>Public/jQuery_calendar/css/datepicker.css" type="text/css" />
<script type="text/javascript" src="<?php echo (C("BASE_URL")); ?>Public/jQuery_calendar/js/datepicker.js"></script>
<script type="text/javascript" src="<?php echo (C("BASE_URL")); ?>Public/jQuery_calendar/js/eye.js"></script>
<script type="text/javascript" src="<?php echo (C("BASE_URL")); ?>Public/jQuery_calendar/js/utils.js"></script>
<script type="text/javascript" src="<?php echo (C("BASE_URL")); ?>Public/jQuery_calendar/js/layout.js?ver=1.0.2"></script>
   
<!--区域控件--> 
<link rel="stylesheet" href="<?php echo (C("BASE_URL")); ?>Public/Style/jquery.Jcrop.css" type="text/css" />
<script src="<?php echo (C("BASE_URL")); ?>Public/script/jquery.Jcrop.js" type="text/javascript"></script>

<script type="text/javascript">
var groupfile = '<?php echo ($group["guid"]); ?>';
$(function(){
	$('#oneimg,#twoimg,#threeimg,#fourimg').click(function(){
		$(this).attr('href','<?php echo (C("BASE_URL")); ?>'+$("#"+$(this).attr('id')+"_value").val());
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
<div id="header"><a href="__APP__" style="top:0;"><img src="<?php echo (C("BASE_URL")); ?>Public/Image/dongya.png"></a> </div>
<div id="user-nav">
  <ul class="nav">
    <li class=""><a href="<?php echo (C("BASE_URL")); ?>index.php/Index/outlogin"><i class="icon-share-alt"></i><span>退出系统</span></a></li>
  </ul>
</div>
<div id="sidebar">
  <ul>
    <li class="nav-li submenu"> <a href="#"><span class="icon-chevron-down"></span><span>设置</span></a>
      <ul>
        <li><a href="__APP__/Index/index/groupid/<?php echo ($group["guid"]); ?>">版本发布</a></li>
        <?php if(session('?isadmin') && session('uid')=='1'){ ?>
          <li><a href="__APP__/Model/index/groupid/<?php echo ($group["guid"]); ?>">模版</a></li>
          <li><a href="__APP__/Dir/index/groupid/<?php echo ($group["guid"]); ?>">栏目</a></li>
          <li><a href="__APP__/Diy/index/groupid/<?php echo ($group["guid"]); ?>">DIY列表</a></li>
        <?php }?>
      </ul>
    </li>
    <li class="nav-li submenu"> <a href="__APP__/Code/index/groupid/<?php echo ($group["guid"]); ?>"><span class="icon-chevron-down"></span><span>账号管理</span></a>
    <li class="nav-li submenu"> <a href="#"><span class="icon-chevron-down"></span><span>企业品牌</span></a>
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
        <li><a href="__APP__/Style/index/groupid/<?php echo ($group["guid"]); ?>">类型分类</a></li>
        <li><a href="__APP__/Function/index/groupid/<?php echo ($group["guid"]); ?>">材质分类</a></li>
        <li><a href="__APP__/Spacestyle/index/groupid/<?php echo ($group["guid"]); ?>">厚度分类</a></li>
        <li><a href="__APP__/Prodir/index/groupid/<?php echo ($group["guid"]); ?>">产品系列</a></li>
        <li><a href="__APP__/Hot/index/groupid/<?php echo ($group["guid"]); ?>">浏览量排行</a></li>
      </ul>
    </li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <h1>产品中心</h1>
  </div>
  <div id="breadcrumb"> <a href="__APP__/Index/index/groupid/<?php echo ($group["guid"]); ?>"><i class="icon-home"></i><?php echo ($group["title"]); ?></a> <a href="__APP__/Prodir/index/groupid/<?php echo ($group["guid"]); ?>" class="current">产品系列</a> <?php echo ($Title); ?> <a href="__URL__/index/pid/<?php echo ($prodir["guid"]); ?>" class="current"><?php echo ($prodir["title"]); ?></a></div>
  <div class="container-fluid">
    <div class="row-fluid">
      <?php if($_SESSION['error']!= ''): ?><div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a><?php echo (session('error')); ?></div><?php endif; ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>修改</h5>
        </div>
        <form action="__URL__/submit_edit" name="form" method="post" enctype="application/x-www-form-urlencoded" class="form-horizontal">
          <div class="widget-content nopadding">
            <div class="control-group">
              <label class="control-label">名称:</label>
              <div class="controls">
                <input type="text" class="span11" size="100" name="title" placeholder="名称" value="<?php echo ($pro["title"]); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">板材:</label>
              <div class="controls">
                <input type="text" class="span11" size="100" name="bancai" placeholder="板材" value="<?php echo ($pro["bancai"]); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">尺寸:</label>
              <div class="controls">
                <input type="text" class="span11" size="100" name="chicun" placeholder="尺寸" value="<?php echo ($pro["chicun"]); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">锁具:</label>
              <div class="controls">
                <input type="text" class="span11" size="100" name="suoju" placeholder="锁具" value="<?php echo ($pro["suoju"]); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">拉手:</label>
              <div class="controls">
                <input type="text" class="span11" size="100" name="lashou" placeholder="拉手" value="<?php echo ($pro["lashou"]); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">系列:</label>
              <div class="controls">
                <input type="text" class="span11" size="100" name="xilie" placeholder="系列" value="<?php echo ($pro["xilie"]); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">类型:</label>
              <div class="controls">
              <select name="styleid" class="span11">
              <option value="0">无</option>
              <?php if(is_array($style)): $i = 0; $__LIST__ = $style;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><option value="<?php echo ($value["guid"]); ?>" <?php if($pro['styleid'] == $value['guid']): ?>selected="selected"<?php endif; ?>><?php echo ($value["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">材质:</label>
              <div class="controls">
              <select name="spacestyleid" class="span11">
              <option value="0">无</option>
              <?php if(is_array($spacestyle)): $i = 0; $__LIST__ = $spacestyle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><option value="<?php echo ($value["guid"]); ?>" <?php if($pro['spacestyleid'] == $value['guid']): ?>selected="selected"<?php endif; ?>><?php echo ($value["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">厚度:</label>
              <div class="controls">
              <select name="functionid" class="span11">
              <option value="0">无</option>
              <?php if(is_array($function)): $i = 0; $__LIST__ = $function;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><option value="<?php echo ($value["guid"]); ?>" <?php if($pro['functionid'] == $value['guid']): ?>selected="selected"<?php endif; ?>><?php echo ($value["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">大图:</label>
              <div class="controls">
                <input type="text" class="span11" id="oneimg_value" value="<?php echo ($pro["oneimg"]); ?>" size="70" name="oneimg">
                <a id="oneimg" href="#" class="btn btn-success">预览</a>
                <input id="oneimg_upload" type="file" class="span11" size="30" name="oneimg_upload">
                <input type="button" name="submit" class="btn btn-success" value=" 上传 " onclick="return ajaxFileUpload('__APP__/Index/upload/name/oneimg/file/oneimg_upload/groupid/<?php echo ($group["guid"]); ?>','oneimg','oneimg_upload');">
                <font color="#f00"><br><br>注:请上传大图尺寸不能超出1500*1500的图片</font>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">小图:</label>
              <div class="controls">
                <input type="text" class="span11" id="twoimg_value" value="<?php echo ($pro["twoimg"]); ?>" size="70" name="twoimg">
                <a id="twoimg" href="#" class="btn btn-success">预览</a>
                <input id="twoimg_upload" type="file" class="span11" size="30" name="twoimg_upload">
                <input type="button" name="submit" class="btn btn-success" value=" 上传 " onclick="return ajaxFileUpload('__APP__/Index/upload/name/twoimg/file/twoimg_upload/groupid/<?php echo ($group["guid"]); ?>','twoimg','twoimg_upload');">
                <font color="#f00"><br><br>注:请上传小图尺寸不能超出400*400的图片,小图在IPAD上显示在产品列表里是加载多张产品小图的，如果小图的图片太大，IPAD内存吃不消，会导致崩溃。</font>
              </div>
            </div>
            <div class="form-actions">
              <input type="hidden" name="guid" value="<?php echo ($pro["guid"]); ?>">
              <button type="submit" class="btn btn-success">保存</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body></html>