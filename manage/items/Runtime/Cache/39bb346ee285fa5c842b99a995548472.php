<?php if (!defined('THINK_PATH')) exit();?>
<script type="text/javascript">
var filename = '<?php echo ($group["guid"]); ?>_<?php echo time();?>';
function formsubmit(){
  $('.loading').show();
  $('.dataTables_filter font').html('执行发布中，请稍等...');
  $('.dataTables_filter input').attr('disabled','disabled');
  dataget();
}

function dataget(){
  $.ajax({
    url:'__URL__/backup/filename/'+filename+'/groupid/<?php echo ($group["guid"]); ?>',
    success:function(data){
      if (data == 'success') {
        datainput();
      }else{
        $('.loading').hide();
        $('.dataTables_filter input').removeAttr('disabled');
        $('.dataTables_filter font').html('发布出错1!');
      }
    }
  })
}
function datainput(){
  $.ajax({
    url:'/sqlite/index.php/Index/index/filename/'+filename+'/groupid/<?php echo ($group["guid"]); ?>',
    success:function(data){
      if (data == 'success') {
        movedb();
      }else{
        $('.loading').hide();
        $('.dataTables_filter input').removeAttr('disabled');
        $('.dataTables_filter font').html('发布出错2!');
      }
    }
  });
}
function movedb(){
  $.ajax({
    url:'__URL__/movedb/filename/'+filename+'/groupid/<?php echo ($group["guid"]); ?>',
    success:function(data){
      $('.loading').hide();
      $('.dataTables_filter input').removeAttr('disabled');
      if (data == 'success') {
        $('.dataTables_filter font').html('发布成功!');
      }else{
        $('.dataTables_filter font').html('发布出错3!');
      }
    }
  });
}
</script>
<div id="content">
  <div id="content-header">
    <h1>版本发布</h1>
  </div>
  <div id="breadcrumb"> <a href="__APP__/Index/index/groupid/<?php echo ($group["guid"]); ?>"><i class="icon-home"></i><?php echo ($group["title"]); ?></a> <a href="#">版本发布</a></div>
  <div class="container-fluid">
    <div class="row-fluid">
      <?php if($_SESSION['error']!= ''): ?><div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a><?php echo (session('error')); ?></div><?php endif; ?>
      <div class="widget-box">
        <form action="" name="form" id="form" method="post" enctype="application/x-www-form-urlencoded" class="form-horizontal">
          <div class="widget-content">
            <table>
              <thead>
                <tr role="row">
                  <th align="left">发布时间</th>
                </tr>
              </thead>
              <tbody role="alert" aria-live="polite" aria-relevant="all">
                  <tr align="center" height="40" class="nbline" onmousemove="javascript:this.bgColor='#FAFCE0';" onmouseout="javascript:this.bgColor='#FFFFFF';" bgcolor="#FFFFFF">
                    <td><?php echo (date('Y-m-d H:i',filemtime($sql))); ?></td>
                  </tr>
              </tbody>
            </table>
            <input type="hidden" name="<?php echo ($group["guid"]); ?>">
            <div class="ui-widget-header">
              <div class="dataTables_filter">
                <input class="btn" type="button" value=" 发布更新 " name="delete" onclick="if(confirm('确实要发布新版本吗?')){formsubmit();}"/>
                <div class="loading" style="display:none;"></div>
                <font></font>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body></html>