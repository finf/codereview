<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>登录</title>
<link type="text/css" href="<?php echo base_url('static/css/common.css');?>" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('static/css/login.css');?>" rel="stylesheet" />
</head>

<body style="background:#006498;">
	<div class="wrap">
		<div class="top">
			<a class="top_btn mobi_hide" href="<?php echo site_url(''); ?>">返回首页</a>
			<a class="top_btn" href="<?php echo site_url('account/register'); ?>">注册帐号</a>
		</div>
		<?php echo form_open('account/login') ?>
			<div class="form-container">
				<div class="form-title"><h2>Code Review</h2></div>
				<div class="form-title">邮箱</div>
				<input class="form-field" type="text" name="email" /><br />
				<div class="form-title">密码</div>
				<input class="form-field" type="password" name="password" /><br />
				<input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
				<input type="hidden" value="submitted" name="submitted"/>
				<div class="submit-container">
					<span class="l">自动登录？<input name="remember" value="true" type="checkbox" /></span>
					<input class="submit-button" type="submit" value="登 录" />
				</div>
			</div>
		</form>
	</div>
</body>
</html>
