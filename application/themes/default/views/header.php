<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title;?></title>
<link type="text/css" href="<?php echo base_url('static/css/common.css');?>" rel="stylesheet" />
</head>

<body>
	<div id="custom-header"></div>
	<div class="wrap">
		<div id="header">
			<div id="portalLink">
                CodeReview Website
            </div>
			<div id="topbar">
				<div id="hlinks">
				<?php if ($login):?>
					<span>
					<a href="#"><?php echo $account['name'];?></a>
					</span>
					<span class="lsep">|</span>
					<span>
					<a href="/account/logout">退出</a>
					</span>
				<?php else:?>
					<span>
					<a href="/account/login">登录</a>
					</span>
					<span class="lsep">|</span>
					<span>
					<a href="/account/register">注册</a>
					</span>
				<?php endif;?>
				</div>
			</div>
			<br class="cbt">
			<div id="hlogo">
                <a href="/"><img src="<?php echo base_url('static/images/home_thslogo.gif');?>"></a>
            </div>
            <div id="hmenus">
                <div class="nav mainnavs">
                    <ul>
                        <li><a href="/questions">全部案例</a></li>
                        <li><a href="/tags">标签</a></li>
                        <li><a href="/users">排行</a></li>
                        <li><a href="/badges">用户</a></li>
                        <li><a href="/page/about">关于</a></li>
                    </ul>
                </div>
                <div class="nav askquestion">
                    <ul>
                        <li class="youarehere">
                            <a href="/codes/add">写案例</a>
                        </li>
                    </ul>
                </div>
            </div>
		</div>

