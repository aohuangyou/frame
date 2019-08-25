<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"/Users/xinjiashuodemac/workspace/my/frame/public/../application/admin/view/member/update.html";i:1562574297;}*/ ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>编辑用户</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/static/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/static/admin/css/admin.css" media="all">
</head>
<body>
  <div class="layui-fluid">
    <div class="layui-card">
      <div class="layui-card-header">编辑用户</div>
      <div class="layui-card-body" style="padding: 15px;">
        <form class="layui-form" action="" lay-filter="component-form-group" id="myform">
          <input type="hidden" name="member_id" value="<?php echo $data['member_id']; ?>">

          <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
              <input type="text" name="member_name" autocomplete="off" placeholder="请输入用户名" class="layui-input" value="<?php echo $data['member_name']; ?>">
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">用户手机</label>
            <div class="layui-input-block">
              <input type="text" name="member_mobile"  autocomplete="off" placeholder="请输入用户手机(登陆账号)" class="layui-input" value="<?php echo $data['member_mobile']; ?>">
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">登陆密码</label>
            <div class="layui-input-block">
              <input type="text" name="member_password"  autocomplete="off" placeholder="请输入用户登陆密码，为空则不修改" class="layui-input">
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">所属用户组</label>
            <div class="layui-input-block">
              <select name="member_group" lay-verify="required">
                <?php if(is_array($groups) || $groups instanceof \think\Collection || $groups instanceof \think\Paginator): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$group): $mod = ($i % 2 );++$i;?>
                  <option value="<?php echo $group['group_id']; ?>" <?php if($data['member_group'] == $group['group_id']): ?> selected="" <?php endif; ?>><?php echo $group['group_name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">允许登陆</label>
            <div class="layui-input-block">
              <input type="radio" name="member_forbidden" value="1" title="有" <?php if($data['member_forbidden'] == 1): ?> checked="" <?php endif; ?>>
              <input type="radio" name="member_forbidden" value="0" title="无" <?php if($data['member_forbidden'] == 0): ?> checked="" <?php endif; ?>>
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">后台权限</label>
            <div class="layui-input-block">
              <input type="radio" name="member_is_admin" value="1" title="有" <?php if($data['member_is_admin'] == 1): ?> checked="" <?php endif; ?>>
              <input type="radio" name="member_is_admin" value="0" title="无" <?php if($data['member_is_admin'] == 0): ?> checked="" <?php endif; ?>>
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
    });
  </script>
</body>
</html>