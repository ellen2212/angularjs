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
	$('#oneimg,#twoimg,#threeimg,#fourimg,#photo').fancybox();
	
	$('.alert .close').click(function(){
		$(this).parent().slideUp();
		$.ajax({url:"__APP__/Index/unseterror",async:false});
	});
	setTimeout('removeerror()',2500);
});
</script>
</head>
<body>
<div id="header"><a href="__APP__"><img src="<?php echo (C("BASE_URL")); ?>Public/Image/logo.png" width="185"></a> </div>
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
        <?php }?>
      </ul>
    </li>
    <li class="nav-li submenu"> <a href="__APP__/Code/index/groupid/<?php echo ($group["guid"]); ?>"><span class="icon-chevron-down"></span><span>账号管理</span></a>
    <li class="nav-li submenu"> <a href="#"><span class="icon-chevron-down"></span><span>关于我们</span></a>
      <ul>
        <li><a href="__APP__/Content/index/pid/0B5CA21D102BDC90804161CF20CF9FE8">公司简介</a></li>
        <li><a href="__APP__/Content/index/pid/1706649B0E94110184CFBCAE3B282C9C">企业文化</a></li>
        <li><a href="__APP__/Content/index/pid/D4B836C8C2838F442AD1FB9474E11012">企业荣誉</a></li>
        <li><a href="__APP__/Content/index/pid/5772FE32B9B9AF1BA31576DABD39F606">发展历程</a></li>
        <li><a href="__APP__/Content/index/pid/EBE866EADDFBFE24038DC86002F24DE2">广告宣传</a></li>
        <li><a href="__APP__/Content/index/pid/DC1747BEC5E543C21011CAA315386ACE">VI标识</a></li>
      </ul>
    </li>
    <li class="nav-li submenu"> <a href="#"><span class="icon-chevron-down"></span><span>经销商专区</span></a>
      <ul>
        <li><a href="__APP__/Content/index/pid/5B05ADF2D659AE303A332975FDB0531E">经销商展示</a></li>
        <li><a href="__APP__/Content/index/pid/DBB5A6D0140F5537A94E1A9431A384BC">营销活动</a></li>
        <li><a href="__APP__/Content/index/pid/307F04D97ABB4E88BA1FD123C5DB2B9B">产品卖点</a></li>
        <li><a href="__APP__/Content/index/pid/9D88B37A530B0EBDDDB77EEB2553D201">售后支持</a></li>
      </ul>
    </li>
    <li class="nav-li submenu"> <a href="#"><span class="icon-chevron-down"></span><span>招商加盟</span></a>
      <ul>
        <li><a href="__APP__/Content/index/pid/98D8A95EAA944FC51E2012FEFA7FD916">经营支持</a></li>
        <li><a href="__APP__/Content/index/pid/721BBD022F3E05DB49C24885737091D4">品牌优势</a></li>
        <li><a href="__APP__/Content/index/pid/2280A0A287ADB2E05C861532BD653A57">加盟条件</a></li>
        <li><a href="__APP__/Content/index/pid/7CF633147440409C313E06ECBC52912E">加盟流程</a></li>
        <li><a href="__APP__/Content/index/pid/771E0DC7C3A3965974E0BD2DC61F0DF7">加盟渠道</a></li>
      </ul>
    </li>
    <li class="nav-li submenu"> <a href="#"><span class="icon-chevron-down"></span><span>产品中心</span></a>
      <ul>
        <li><a href="__APP__/Prodir/index/groupid/<?php echo ($group["guid"]); ?>">产品系列</a></li>
        <li><a href="__APP__/Content/index/pid/B7BA151D4D1F839A929D2E3341ED22C3">五金配件</a></li>
        <li><a href="__APP__/Content/index/pid/AF725FDBF1A149F3915347842086621E">工程案例</a></li>
        <li><a href="__APP__/Content/index/pid/7CBB1A37E375845BC59BD151E4A7E2EA">产品检测证书</a></li>
        <li><a href="__APP__/Content/index/pid/1ACB0C2D880FB9295155CBDCAB8EB277">材料颜色</a></li>
      </ul>
    </li>
    <li class="nav-li"> <a href="__APP__/Diy/index/groupid/<?php echo ($group["guid"]); ?>"><span>DIY</span></a></li>
    <li class="nav-li"> <a href="__APP__/Dir/index/pid/C41824C51CA5D166CF1EE3F2B440F267"><span>电子画册</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <h1>换装区域</h1>
  </div>
  <div id="breadcrumb"> <a href="__APP__/Index/index/groupid/<?php echo ($group["guid"]); ?>"><i class="icon-home"></i><?php echo ($group["title"]); ?></a> <a href="__APP__/Diy/index/groupid/<?php echo ($group["guid"]); ?>" class="current">DIY空间:<?php echo ($diy["title"]); ?></a> <a href="__URL__/index/diyid/<?php echo ($diy["guid"]); ?>/" class="current">换装区域</a> </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <?php if($_SESSION['error']!= ''): ?><div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a><?php echo (session('error')); ?></div><?php endif; ?>
        <form action="" name="form" method="post" enctype="application/x-www-form-urlencoded" class="form-horizontal">
        <div class="widget-box">
          <div class="widget-content">
            <table>
              <thead>
                <tr role="row">
                  <th width="25"><input type="checkbox" id="title-checkbox" name="chkall" onclick="CheckAll(this.form)"></th>
                  <th width="40">排序</th>
                  <th>标题</th>
                  <th width="70">是否隐藏</th>
                  <th width="200">操作</th>
                </tr>
              </thead>
              <tbody role="alert" aria-live="polite" aria-relevant="all">
                <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr align="center">
                    <td width="25"><input type="checkbox" name="select[]" value="<?php echo ($value["guid"]); ?>"></td>
                    <td width="40"><input type="text" class="inputtext" name="sort[<?php echo ($value["guid"]); ?>]" value="<?php echo ($value["sort"]); ?>"></td>
                    <td><?php echo ($value["title"]); ?></td>
                    <td><?php if($value['status'] == 0): ?>否<?php else: ?><font style="color:#f00;">是</font><?php endif; ?></td>
                    <td style="text-align:center;"><a class="hrefa" href="__APP__/Diyimg/index/focusid/<?php echo ($value["guid"]); ?>">管理换装图</a></td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </tbody>
            </table>
            <div class="ui-widget-header">
              <div class="dataTables_filter">
              </div>
              <div class="dataTables_paginate"><?php echo ($page); ?></div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body></html>