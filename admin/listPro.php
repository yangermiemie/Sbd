<?php 
require_once '../include.php';
checkLogined();
$adminName=$_SESSION['adminName'];
//获取所有店铺
$shops=getAllShop($adminName);
if(!$shops){
   alertMes("没有商品，请先添加商品!","addPro.php");
}
//获取请求id
$shopId=$_GET['shopId']?$_GET['shopId']:null;
//按时间排序
$orderBy="order by sbd_pro.pubTime desc ";
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$shopId?"where sbd_pro.shopId='{$shopId}' and sbd_pro.adminName='{$adminName}' ":"where sbd_pro.adminName='{$adminName}' ";
//得到数据库中所有商品
$sql="select * from sbd_pro {$where} ";
$totalRows=getResultNum($sql); // 记录条数
$pageSize=8; // 一页多少记录
$totalPage=ceil($totalRows/$pageSize); // 多少页
if($totalPage<1)$totalPage=1;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select sbd_pro.*,sbd_shop.shopName from sbd_pro join sbd_shop on sbd_pro.shopId=sbd_shop.shopId {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){ 
  alertMes("没有商品，请先添加商品!","addPro.php");
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
 
<span class="main-title">商品列表</span>
<div class="details">
  <div class="details_operation clearfix">
      <div class="bui_select">
          <input class="btn btn-primary" type="button" value="添加商品" class="add" onclick="addPro()">
      </div>
      <div class="fr">
          <div class="text">
              <span>所属店铺：</span>
              <div class="bui_select">
                  <select id="" class="select form-control" onchange="change(this.value)">
                  <option value="" selected='selected'>全部</option>
    <?php foreach($shops as $shop):?>
       <option value="<?php echo $shop['shopId'];?>" <?php echo $shop['shopId']==$shopId?"selected='selected'":null;?>><?php echo $shop['shopName'];?></option>
    <?php endforeach;?>
                  </select>
              </div>
          </div>
      </div>
  </div>
  <table  class="table  table-hover">
      <thead>
          <tr>
              <th width="15%">商品编号</th>
              <th width="15%">商品名称</th>
              <th width="10%">所属店铺</th>
              <th width="10%">价格</th> 
              <th width="10%">发布时间</th>
              <th width="15%">商品图像</th>
              <th width="10%">操作</th>
          </tr>
      </thead>
      <tbody>
      <?php foreach($rows as $row):?>
          <tr align="center">
              <!--这里的id和for里面的c1 需要循环出来-->
              <td><?php echo $row['pSn'];?></td>
              <td><?php echo $row['pName']; ?></td>
              <td><?php echo $row['shopName'];?></td>
              <td><?php echo $row['price'];?></td> 
              <td><?php echo date("Y-m-d H:i:s",$row['pubTime']);?></td>
              <td><img src="<?php echo IMG_50.$row['icon'].'?v='.time();?>"/></td>
              <td>
              				<a class="btn btn-link" onclick="editPro(<?php echo $row['id'];?>,<?php echo $row['pSn'];?>)">修改</a><a class="btn btn-link"  onclick="delPro(<?php echo $row['id'];?>)">删除</a>
					          
              
              </td>
          </tr>
         <?php  endforeach;?>
      </tbody>
  </table> 
  <?php 
      if($totalRows>$pageSize){
      echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}&shopId={$shopId}");   
      }
  ?>
                </div>
<script type="text/javascript">
function showDetail(id,t){
	$("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:false,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"商品名称："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
	function addPro(){
		window.location='addPro.php';
	}
	function editPro(id,pSn){
		window.location='editPro.php?id='+id+'&pSn='+pSn;
	}
	function delPro(id){
		if(window.confirm("您确认要删除嘛？")){
			window.location="doAdminAction.php?act=delPro&id="+id;
		}
	}
	function change(val){
		window.location="listPro.php?shopId="+val;
	}
</script>
</body>
</html>