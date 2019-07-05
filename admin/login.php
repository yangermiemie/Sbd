<?php
if(!empty($_COOKIE['adminName'])&&$_COOKIE['adminName']!=""){
	header("location: index.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆后台管理</title>
<link rel="stylesheet" href="styles/reset.css">
<link rel="stylesheet" href="styles/bootstrap-admin.css">
<link rel="stylesheet" href="styles/backstage.css">
        <link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="styles/main.css?v=1">
</head>

<body>

<div class="head">
  <div class="logo fl"><a href="#"></a></div>
  <span class="head_text">商家后台管理系统</span>
</div>

<div class="loginBox">
	<div class="login_cont">
		<form action="doLogin.php" method="post">
			<ul class="login">
				<li class="l_tit">管理员帐号：</li>
				<li class="mb_10"><input type="text" name="username" placeholder="请输入管理员帐号"class="form-control"></li>
				<li class="l_tit">密码：</li>
				<li class="mb_10"><input type="password" name="password" class="form-control" placeholder="请输入密码"></li>
				<li class="l_tit">验证码：</li>
				<li class="mb_10"><input type="text" name="verify" class="form-control password_icon" placeholder="请输入验证码"></li>
				<img src="getCode.php" id="captcha" alt="" /><a href="#" id="change">&nbsp;&nbsp;看不清换一张</a>
				<li class="autoLogin"><input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><span class="checked-txt">一个月内自动登录</span></li>
				<li><input type="submit" value="登录" class="btn btn-primary login-btn"></li>
			</ul> 
		</form> 
	</div> 
</div>

<div class="footer">
	<p>Copyright &copy; 2017 - 2017 随便点网站&nbsp;&nbsp;&nbsp;</p>
</div>
<!-- 通过JavaScript实现单击更换验证码 -->
<script>
  var captcha = document.getElementById("captcha");
  var change = document.getElementById("change");
  change.onclick = function(){
  captcha.src = "getCode.php?rand=" + Math.random(); //增加一个随机参数，防止图片缓存
  return false; //阻止超链接动作
};
</script>
</body>
</html>
