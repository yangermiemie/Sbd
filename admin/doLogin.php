<?php 
require_once '../include.php';
$username=$_POST['username'];
$username=addslashes($username);
$password=md5($_POST['password']);
$verify=strtolower($_POST['verify']);
$verify1=$_SESSION['verify'];
$autoFlag=$_POST['autoFlag'];
if($verify == $verify1){
	$sql="select username,password from sbd_admin where `username`='{$username}' and `password`='{$password}'";
	$row=fetchOne($sql);
	if($row){
		//如果选了自动登陆，30天
		if($autoFlag){
			setcookie("adminName",$row['username'],time()+30*24*3600);
		}else{//7天
			setcookie("adminName",$row['username'],time()+7*24*3600);
		}
		$_SESSION['adminName']=$row['username'];
		header("location:index.php");
	}else{
		alertMes("用户名或密码错误，请重新登陆 !","login.php");
	}
}else{
	alertMes("验证码错误 !","login.php");
}
