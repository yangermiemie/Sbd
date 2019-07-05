<?php 
require_once '../include.php';
$sql="select * from sbd_user";
$rows=fetchAll($sql);
if(!$rows){
    alertMes("没有用户!","index.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="styles/reset.css">
<link rel="stylesheet" href="styles/bootstrap-admin.css">
        <link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="styles/backstage.css">
</head> 
<body>
<span class="main-title">用户列表</span>
<div class="details">
  <div class="details_operation clearfix">
      <div class="bui_select">
      </div>
          
  </div>
  <table class="table  table-hover">
      <thead>
          <tr>
              <th width="25%">用户名称</th>
              <th width="25%">手机号码</th>
              <th width="25%">用户住址</th>
              <th width="25%">注册时间</th>
          </tr>
      </thead>
      <tbody>
      <?php  foreach($rows as $row):?>
          <tr align="center">
            
              <td><?php echo $row['username'];?></td>
              <td><?php echo $row['userPhone'];?></td>
              <td><?php echo $row['userHome'];?></td>
              <td><?php echo date("Y-m-d H:i:s",$row['regTime']);?></td>
          </tr>
          <?php endforeach;?>
      </tbody>
  </table>
</div>
</body>
</html>