<?php 
require_once '../include.php';
checkLogined();
$adminName=$_SESSION['adminName'];
$shops=getAllShop($adminName);
if(!$shops){
    alertMes("没有店铺，请先添加店铺!!", "addShop.php");
}
$id=$_REQUEST['id'];
$pSn=$_REQUEST['pSn'];
$proInfo=getProById($id);
//print_r($proInfo);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="styles/reset.css">
<link rel="stylesheet" href="styles/bootstrap-admin.css"> 
        <link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="styles/global.css"    />
<link rel="stylesheet" href="styles/backstage.css"   />

</head>
<body>
<span class="main-title">商品列表 &gt; 编辑商品</span>
<span id="main-tip"></span>
<div class="form-add">
<form action="doAdminAction.php?act=editPro&id=<?php echo $id;?>&pSn=<?php echo $pSn;?>" id="form1" method="post" enctype="multipart/form-data">
<table class="table  table-bordered table-hover">

    <tr>
        <td align="right" width="15%"><span class="td-txt">商品编号</span></td>
        <td><input class="gray" type="text" disabled="true" readonly name="pSn" value="<?php echo $proInfo['pSn'];?>"/></td>
    </tr>
	<tr>
		<td align="right"><span class="td-txt">商品名称</span></td>
		<td><input type="text" name="pName"  value="<?php echo $proInfo['pName'];?>"/></td>
	</tr>
    <tr>
        <td align="right"><span class="td-txt">所属店铺</span></td>
        <td>
        <select name="shopId" class="">
            <?php foreach($shops as $shop):?>
                <option value="<?php echo $shop['shopId'];?>" <?php echo $proInfo['shopId']==$shop['shopId']? "selected='selected'":null; ?>><?php echo $shop['shopName'];?></option>
            <?php endforeach;?>
        </select>
        </td>
    </tr>
	<tr>
		<td align="right"><span class="td-txt">商品价格</span></td>
		<td><input type="text" name="price"  value="<?php echo $proInfo['price'];?>"/></td>
	</tr> 
	<tr>
        <td align="right"><span class="td-txt">商品图像</span></td>
        <td> 
            <img style="margin:12px;" src="<?php echo IMG_50.$proInfo['icon'].'?v='.time();?>"/>
            <input class="btn btn-file" type="file" name="myFile"/>
        </td>
    </tr> 
</table>
<input class="btn btn-primary" type="submit"  value="编辑完成"/>
</form>
</div>
<script src="scripts/jquery-1.8.3.js"></script>
<script src="scripts/fileinput.min.js"></script>
<script type="text/javascript">
 $(function(){ 
   $("#form1").submit(function () {
    if(isValid()){ 
        return true;
    }else{ 
        return false;
    }
 });
}); 



 function isValid(){ 
    if($("input[name='pName']").val().length<=0){ 
        $("#main-tip").html('商品名称不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='price']").val().length<=0){ 
        $("#main-tip").html('商品价格不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    } 
    if($("#shop option:selected").text()=="?"){
        $("#main-tip").html('所属店铺不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    $("#main-tip").hide();
    return true;
 }
</script>
</body>
</html>