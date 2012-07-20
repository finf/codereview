<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>注册帐号</title>
<link type="text/css" href="<?php echo base_url('static/css/common.css');?>" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('static/css/login.css');?>" rel="stylesheet" />
</head>

<body style="background:#006498;">
	<div class="wrap">
		<div class="top">
			<a class="top_btn mobi_hide" href="<?php echo site_url(''); ?>">返回首页</a>
			<a class="top_btn" href="<?php echo site_url('account/login'); ?>">登录</a>
		</div>
		<?php
			$name		= array('id'=>'name', 'class'=>'form-field', 'name'=>'name', 'value'=> set_value('name'));
			$email		= array('id'=>'email', 'class'=>'form-field', 'name'=>'email', 'value'=>set_value('email'));
		?>
		<?php echo form_open('account/register') ?>
			<input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
			<input type="hidden" value="submitted" name="submitted"/>
			<div class="form-container" style="margin-top:100px;">
				<div class="form-title"><h2>注册帐号</h2></div>
				<div class="form-title">邮箱<b> *</b></div>
				<?php echo form_input($email);?><br />
				<div class="form-title">姓名<b> *</b></div>
				<?php echo form_input($name);?><br />
				<div class="form-title">密码<b> *</b></div>
				<input class="form-field" type="password" name="password" /><br />
				<div class="form-title">重复密码<b> *</b></div>
				<input class="form-field" type="password" name="confirm" /><br />
				
				<div class="submit-container">
					<input class="submit-button" type="submit" value="注 册" />
				</div>
				
				<?php
				if (!empty($error)) {
					echo '<div class="error">'.$error.'</div>';
				}
				?>
			</div>
		</form>
	</div>
</body>
</html>
