<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$sql="select * from sbd_admin where id='{$id}'";
$row=fetchOne($sql);
?>
<!DOCTYPE html">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<link rel="stylesheet" href="styles/reset.css">
<link rel="stylesheet" href="styles/bootstrap-admin.css"> 
        <link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="styles/global.css"    />
<link rel="stylesheet" href="styles/backstage.css"   />
</head>
<body>
<span class="main-title">管理员列表 &gt; 修改</span>
<span id="main-tip"></span>
<div class="form-add">
<form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" id="form1" method="post">
<table class="table  table-bordered table-hover">
	<tr>
		<td align="right" width="15%"><span class="td-txt">管理员名称</span></td>
		<td><input type="text" name="username" value="<?php echo $row['username'];?>"/></td>
	</tr>
	<tr>
		<td align="right"><span class="td-txt">管理员密码</span></td>
		<td><input type="password" name="password"  value=""/></td>
	</tr>
	<tr>
		<td align="right"><span class="td-txt">管理员邮箱</span></td>
		<td><input type="text" name="email" value="<?php echo $row['email'];?>"/></td>
	</tr> 
	<tr>
		<td align="right"><span class="td-txt">管理员电话</span></td>
		<td><input type="text" name="shopPhone" value="<?php echo $row['shopPhone'];?>"/></td>
	</tr>  
</table>
<input class="btn btn-primary" type="submit"  value="修改完成"/>
</form>
</div>

<script type="text/javascript" src="scripts/jquery-1.8.3.js"></script>
<script type="text/javascript">
 $(document).ready(function(){ 
   $("#form1").submit(function () {
    if(isValid()){ 
        return true;
    }else{ 
        return false;
    }
 });
});  
 function isValid(){
    if($("input[name='username']").val().length<=0){ 
        $("#main-tip").html('管理员名称不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='password']").val().length<=0){ 
        $("#main-tip").html('管理员密码不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='email']").val().length<=0){ 
        $("#main-tip").html('管理员邮箱不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='shopPhone']").val().length<=0){ 
        $("#main-tip").html('管理员电话不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    $("#main-tip").hide();
    return true;
}
</script>
</body>
</html>