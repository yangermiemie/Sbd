<?php 
//检查管理员是否存在
function checkAdmin($username){
	$sql="select * from sbd_admin where username='{$username}'";
	return fetchOne($sql);
}
//检测是否有管理员登陆
function checkLogined(){
	if($_COOKIE['adminName']==""){
		header("location: login.php");
	}else{
		$_SESSION['adminName']=$_COOKIE['adminName'];
	}
}
//添加管理员
function addAdmin(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(checkAdmin($arr['username'])){
		$mes="已经存在该用户名!<br/><a href='addAdmin.php'>重新添加</a>";
	}
	else{
		if(insert("sbd_admin",$arr)){
		$mes="添加成功!<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
		}else{
			$mes="添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
		}
	}
	return $mes;
}
//得到所有的管理员
function getAllAdmin(){
	$sql="select id,username,email from sbd_admin ";
	$rows=fetchAll($sql);
	return $rows;
}
//管理员列表分页
function getAdminByPage($page,$pageSize=2){
	$sql="select * from sbd_admin";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select id,username,email from sbd_admin order by id asc limit {$offset},{$pageSize}";
  if($totalRows!=0) {
    $rows=fetchAll($sql);
  }
	return $rows;
}
//编辑管理员
function editAdmin($id){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(update("sbd_admin", $arr,"id={$id}")){
		$mes="编辑成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='listAdmin.php'>请重新修改</a>";
	}
	return $mes;
}
//删除管理员
function delAdmin($id){
	if(delete("sbd_admin","id={$id}")){
		$mes="删除成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listAdmin.php'>请重新删除</a>";
	}
	return $mes;
}
//注销管理员 清空COOKIE
function logout(){
  unset($_SESSION['adminName']);
  unset($_SESSION['adminId']);
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE['adminId'])){
		setcookie("adminId","",time()-1);
	}
	if(isset($_COOKIE['adminName'])){
		setcookie("adminName","",time()-1);
	}
	header("location: login.php");
}
//注销用户
function logoutUser(){
	unset($_SESSION['userName']); 
	unset($_SESSION['userId']);
	header("location: ../index.php");
}
//检查用户是否存在
function checkUser($username){
	$sql="select * from sbd_user where username='{$username}'";
	return fetchOne($sql);
}
//添加用户
function addUser(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	$arr['regTime']=time(); 
  
  if(checkUser($arr['username'])){
		alertMes("已经存在该用户名 !","../index.php");
	}
	else{
		if(insert("sbd_user",$arr)){
      alertMes("创建用户成功 !","../index.php");
		}else{
			alertMes("创建用户失败 !","../index.php");
		}
	}
}
//用户登陆
function loginUser(){
	$arr=$_POST;
  $username=$_POST['username'];
  $username=addslashes($username);
  $arr['username']=$username;
	$arr['password']=md5($_POST['password']);
  if(!empty($arr)){
    $sql="select username,id from sbd_user where `username`='{$arr[username]}' and `password`='{$arr[password]}'";
    $row=fetchOne($sql);
    if($row){
      $_SESSION['userName']=$row['username'];
      $_SESSION['userId']=$row['id'];
      header("location: ../index.php");
    }else{
      alertMes("用户名或密码错误，请重新登陆 !","../index.php");
    }
  }
}
//删除用户
function delUser($username){
	
	if(delete("sbd_user","username='{$username}'")&&delete("sbd_userinfo","username='{$username}'")){
		header("location:listUser.php");
	}else{
		$mes="删除失败!<br/><a href='listUser.php'>请重新删除</a>";
	}
	return $mes;
}
//编辑用户
function editUser1($id){
	$arr=$_POST;
	if(update("sbd_user", $arr,"id={$id}")){
    alertMes("编辑成功 !","../account/address.php");
	}else{
    alertMes("编辑失败 !","../account/address.php");
	}
}
//编辑用户
function editUser2($id){
	$arr=$_POST;
  $arr['password']=md5($_POST['password']);
	if(update("sbd_user", $arr,"id={$id}")){
    unset($_SESSION['userName']); 
    unset($_SESSION['userId']);
    alertMes("修改成功 !你将重新登陆","../index.php");
	}else{
    alertMes("修改失败 !","../account/setting.php");
	}
}
