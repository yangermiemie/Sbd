<?php 
require_once '../include.php';
checkLogined(); 
$shopId=$_REQUEST['shopId'];
$shopInfo=getShopByShopId($shopId);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="styles/reset.css">
<link rel="stylesheet" href="styles/bootstrap-admin.css">
<link rel="stylesheet" href="styles/global.css" />
<link rel="stylesheet" href="styles/backstage.css"   />
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />

</head>
<body>
<span class="main-title">店铺列表 &gt; 编辑店铺</span>
<div id="main-tip"></div>
<div class="form-add">
<form id="form1" action="doAdminAction.php?act=editShop&shopId=<?php echo $shopInfo['shopId'];?>" method="post" enctype="multipart/form-data">
<table class="table  table-bordered table-hover">

    <tr>
        <td align="right" width="15%"><span class="td-txt">店铺id</span></td>
        <td><input class="gray" type="text" disabled="true" readonly name="shopId" value="<?php echo $shopInfo['shopId'];?>"/></td>
    </tr>
    <tr>
        <td align="right"><span class="td-txt">店铺名称</span></td>
        <td><input type="text" name="shopName"  value="<?php echo $shopInfo['shopName'];?>"/></td>
    </tr> 
    <tr>
        <td align="right"><span class="td-txt">店铺公告</span></td>
        <td><input type="text" name="shopTip"  value="<?php echo $shopInfo['shopTip'];?>"/></td>
    </tr> 
    <tr>
        <td align="right"><span class="td-txt">店铺状态</span></td>
        <td>
        <div class="form-td">
        <input type="radio" name="shopState" <?php echo $shopInfo['shopState']=='1'?'checked':null;?> value="1" ><span class="td-txt">营业</span>
            <input type="radio" name="shopState" <?php echo $shopInfo['shopState']=='0'?'checked':null;?>  value="0" ><span class="td-txt">休息</span>
        </div>
        </td>
    </tr> 
    <tr>
        <td align="right"><span class="td-txt">店铺楼宇</span></td>
        <td><input type="text" name="shopBlock" value="<?php echo $shopInfo['shopBlock'] ?>"/></td>
    </tr> 
    <tr>
        <td align="right"><span class="td-txt">店铺楼层</span></td>
        <td><input type="text" name="shopFloor" value="<?php echo $shopInfo['shopFloor'] ?>"/></td>
    </tr> 
    <tr>
        <td align="right"><span class="td-txt">店铺icon</span></td>
        <td> 
            <img style="margin:12px;" src="<?php echo IMG_SHOP.$shopInfo['shopIcon'].'?v='.time();?>" width=50 height=50/>
            <input class="btn btn-file" type="file" name="myFile"/>
        </td>
    </tr> 
</table>
<input class="btn btn-primary" type="submit"  value="编辑完成"/>
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
    if($("input[name='shopName']").val().length<=0){ 
        $("#main-tip").html('店铺名称不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='shopTip']").val().length<=0){ 
        $("#main-tip").html('店铺公告不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='shopBlock']").val().length<=0){ 
        $("#main-tip").html('店铺楼宇不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='shopFloor']").val().length<=0){ 
        $("#main-tip").html('店铺楼层不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    $("#main-tip").hide();
    return true;
}
</script>
</body>
</html>