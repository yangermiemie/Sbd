<?php 
require_once '../include.php';
$adminName=$_SESSION['adminName'];
//全部店铺
$shops=getAllShop($adminName);
//按时间排序
$orderBy="order by orderTime desc ";
//where条件
$shopId=$_GET['shopId']; //根据店铺id
$where=$shopId?"where shopId='{$shopId}'":null;
//得到数据库中所有商品
$sql="select * from sbd_order {$where} ";
$totalRows=getResultNum($sql);
if ($totalRows<=0) {
  exit("还没有订单！<a href='listOrder.php' target='mainFrame'>返回订单管理</a>");
}
$pageSize=10;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from sbd_order {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
    echo "还没有订单！<a href='listOrder.php' target='mainFrame'>返回订单管理</a>";
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
<span class="main-title">订单列表</span>
<div class="details">
  <div class="details_operation clearfix">

      <div class="fl">
      </div>
       
      <div class="fr"> 
          <div class="text">
              <span>
              <input type="text" value="" placeholder="搜索店铺Id" class="search form-control"  id="searchShopId" onkeypress="searchShopId()" >
              </span>
          </div>
      </div>
  </div>
  <table class="table  table-hover">
      <thead>
          <tr>
              <th width="10%">订单编号</th>
              <th width="10%">店铺ID</th> 
              <th width="10%">店铺名称/商品名称</th> 
              <th width="10%">价格</th>
              <th width="10%">是否支付</th>
              <th width="10%">订单时间</th>
              <th width="10%">下单人/手机</th>
              <th width="10%">配送地</th>
              <th width="10%">是否接单</th>
              <th width="10%">操作</th>
          </tr>
      </thead>
      <tbody>
      <?php foreach($rows as $row):?>
          <tr align="center">
              <td><?php echo $row['orderId'];?></td> 
              <td><?php echo $row['shopId'];?></td> 
              <td><?php echo $row['shopName']."/".$row['proName'];?></td>
              <td><?php echo $row['price']."￥";?></td>
              <td><?php echo $row['pay']==1?"是":"否";?></td>
              <td><?php echo date("Y-m-d H:i:s",$row['orderTime']);?></td>
              <td><?php echo $row['username']."/".$row['userPhone'];?></td>
              <td><?php echo $row['userHome'];?></td>
              <td><?php echo $row['received']==1?"已接":"未接";?></td>
              
              <td align="center"><?php echo $row['received']==1?"<a class='btn btn-link' href='doAdminAction.php?act=cancelOrder&orderId={$row['orderId']}'>取消订单</a>":"<a class='btn btn-link' href='doAdminAction.php?act=takeOrder&orderId={$row['orderId']}'>接单</a>";?>
              </td>
          </tr>
         <?php  endforeach;?> 
      </tbody>
  </table>
  <?php if($totalRows>$pageSize):?>
           <?php echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}&shopId={$shopId}");?> 
  <?php endif;?>
                </div>
<script type="text/javascript">
  function searchShopId(){
      if(event.keyCode==13){
          var val=document.getElementById("searchShopId").value;
          window.location="listOrder.php?shopId="+val;
      }
  }
</script>
</body>
</html>