<?php

//添加店铺
function addShop(){
    $arr=$_POST; 
    //生成shopId
    $sql="select max(shopId) as m from sbd_shop";
    $row=fetchOne($sql);
    if($row&&$row['m']>0){
        $arr['shopId']=$row['m']+1; 
    }else{
        $arr['shopId']=1000;
    }
    //上传
    $path="./upload";
    $uploadFiles=uploadFile($path,$arr['shopId']);
    //生成缩略图
    if(is_array($uploadFiles)&&$uploadFiles){
        foreach($uploadFiles as $key=>$uploadFile){
            thumb($path."/".$uploadFile['name'],"../image_shop/".$uploadFile['name'],200,200);
        }
    }

    $sql="select * from sbd_shop where shopId='".$arr['shopId']."' or shopName='".$arr['shopName']."'"; 
    $row=fetchOne($sql);
    if($row){
        $mes="<p>错误：店铺重复!</p><a href='addShop.php' target='mainFrame'>重新添加</a>";
        return $mes;
    }
    
    if($uploadFiles){
        $arr['shopIcon']=$uploadFiles[0]['name']; 
        $arr['adminName']=$_SESSION['adminName'];
        $res=insert("sbd_shop",$arr);
    }
    
    if($res){ 
        header("location:listShop.php");
    }else{
        $mes="<p>添加失败!</p><a href='addShop.php' target='mainFrame'>重新添加</a>";
    }
    return $mes;
}

//编辑店铺
function editShop($shopId){
    $arr=$_POST;
    $path="./upload";  
    //有图则上传
    if(!empty($_FILES['myFile']['tmp_name'])){  
        $uploadFiles=uploadFile($path,$shopId);
        if(is_array($uploadFiles)&&$uploadFiles){
            foreach($uploadFiles as $key=>$uploadFile){
                thumb($path."/".$uploadFile['name'],"../image_shop/".$uploadFile['name'],200,200);
            }
        }
    }
    
    $where="shopId={$shopId}";
    if($uploadFiles){
        $arr['shopIcon']=$uploadFiles[0]['name'];  
    }
    $res=update("sbd_shop",$arr,$where);
    if($res){
        $mes="<p>编辑成功!</p><a href='listShop.php' target='mainFrame'>查看列表</a>";
    }else{
        $mes="<p>编辑失败!</p><a href='listShop.php' target='mainFrame'>重新编辑</a>";
    }
    return $mes;
}

//删除店铺
function delShop($shopId){
    $row=checkProExistByShopId($shopId);
    if($row){
        $mes="该店铺下还有商品，不能删除!<a href='listShop.php' target='mainFrame'>返回</a>";
        return $mes;
    }
    $where="shopId=".$shopId;
    $res=delete("sbd_shop",$where);

    if($res){
        header("location:listShop.php"); 
    }else{
        $mes="删除失败!<br/><a href='listShop.php' target='mainFrame'>重新删除</a>";
    }
    return $mes;
}

//店铺列表
function getAllShop($adminName){ 
    $sql="select * from sbd_shop where adminName='{$adminName}'";
    $rows=fetchAll($sql);
    return $rows;
}

//根据id获取店铺详细信息
function getShopByShopId($shopId){
        $sql="select * from sbd_shop where shopId={$shopId}";
        $row=fetchOne($sql);
        return $row;
}
