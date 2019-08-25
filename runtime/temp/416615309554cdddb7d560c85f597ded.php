<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/Users/xinjiashuodemac/workspace/my/frame/public/../application/admin/view/group/update.html";i:1562570176;}*/ ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>编辑用户组</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/static/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/static/admin/css/admin.css" media="all">
  <style>
      
      #imgdemo {
        width: 200px;
        margin: 15px 0px 0px;
      }

      .menubats {
        width: 120px !important;
        height: 30px;
        line-height: 30px;
      }

  </style>
</head>
<body>
  <div class="layui-fluid">
    <div class="layui-card">
      <div class="layui-card-header">编辑用户组</div>
      <div class="layui-card-body" style="padding: 15px;">
        <form class="layui-form" action="" lay-filter="component-form-group" id="myform">
          <input type="hidden" value="<?php echo $data['group_id']; ?>" name="group_id">

          <div class="layui-form-item">
            <label class="layui-form-label">用户组名称</label>
            <div class="layui-input-block">
              <input type="text" name="group_name" autocomplete="off" placeholder="请输入用户名" class="layui-input" value="<?php echo $data['group_name']; ?>">
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">用户组权限</label>
            <div class="layui-input-block">
              <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menus): $mod = ($i % 2 );++$i;?>
                <?php echo $menus['title']; if(is_array($menus['items']) || $menus['items'] instanceof \think\Collection || $menus['items'] instanceof \think\Paginator): $i = 0; $__LIST__ = $menus['items'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                  <input type="checkbox" name="group_purview[<?php echo $item['menu_id']; ?>]" title="<?php echo $item['menu_name']; ?>" lay-filter="menusbat" <?php if($data['group_purview'] == 'all' || in_array($item['menu_id'],$data['group_purview'])): ?> checked <?php endif; ?>>
                <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">用户组状态</label>
            <div class="layui-input-block">
              <input type="radio" name="group_status" value="1" title="正常" <?php if($data['group_status'] == 1): ?> checked="" <?php endif; ?>>
              <input type="radio" name="group_status" value="0" title="禁用" <?php if($data['group_status'] == 0): ?> checked="" <?php endif; ?>>
            </div>
          </div>

          <div class="layui-form-item layui-layout-admin">
            <div class="layui-input-block">
              <div class="layui-footer" style="left: 0;">
                <div class="layui-btn" lay-submit="" lay-filter="component-form-demo1">保存修改</div>
                <!-- <button type="reset" class="layui-btn layui-btn-primary">重置</button> -->
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script src="/static/layui/layui.js"></script>  
  <script>
    layui.config({
      base: '/static/admin/' //静态资源所在路径
    }).extend({
      index: 'lib/index' //主入口模块
    }).use(['index', 'form', 'upload'], function(){
      var $ = layui.$
      ,layer = layui.layer
      ,upload = layui.upload
      ,form = layui.form;

      /* 监听提交 */
      form.on('submit(component-form-demo1)', function(data){
        $.ajax({
          url:"<?php echo url('update'); ?>",
          type:"POST",
          data:$("#myform").serialize(),
          success:function(res){
            layer.msg(res.msg);
            if(res.code)
              setTimeout(function(){window.parent.location.reload()},2000);
          },error:function(){
            layer.msg('服务器错误，请稍后重试');
          }
        })
      });

      // form.on('checkbox(allbat)', function(data){
      //   data.elem.checked ? $('.layui-form-checkbox').removeClass('layui-form-checked') : $('.layui-form-checkbox').addClass('layui-form-checked');
      // });

      // form.on('checkbox(menusbat)', function(data){
      //   if(data.elem.checked)
      //     $('.allbat').next().removeClass('layui-form-checked');
      // });
    });
  </script>
</body>
</html>