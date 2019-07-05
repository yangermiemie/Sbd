<?php 
//添加商品
function addPro(){
	$arr=$_POST;
	$arr['pSn']=getMilliSeconds();
	$arr['adminName']=$_SESSION['adminName'];
	$arr['pubTime']=time();
	$path="./upload";
	//上传
	$uploadFiles=uploadFile($path,$arr['pSn']);
	//生成缩略图
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	
	if($uploadFiles){
		$arr['icon']=$uploadFiles[0]['name']; 
		$res=insert("sbd_pro",$arr);
	}
	
	if($res){
		header("location: listPro.php");
	}else{
		$mes="<p>添加失败!</p><a href='addPro.php' target='mainFrame'>重新添加</a>";
		
	}
	return $mes;
}
//编辑商品
function editPro($id,$pSn){
	$arr=$_POST;
	$path="./upload"; 
	if(!empty($_FILES['myFile']['tmp_name'])){  
		$uploadFiles=uploadFile($path,$pSn);
		if(is_array($uploadFiles)&&$uploadFiles){
			foreach($uploadFiles as $key=>$uploadFile){
				thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
				thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
				thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
				thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
			}
		}
	}
	
	$where="id={$id}";
	if($uploadFiles){
		$arr['icon']=$uploadFiles[0]['name'];  
	}
	$res=update("sbd_pro",$arr,$where);
	if($res){
		$mes="<p>编辑成功!</p><a href='listPro.php' target='mainFrame'>查看商品列表</a>";
	}else{
		if(is_array($uploadFiles)&&$uploadFiles){
			foreach($uploadFiles as $uploadFile){
				if(file_exists("../image_800/".$uploadFile['name'])){
					unlink("../image_800/".$uploadFile['name']);
				}
				if(file_exists("../image_50/".$uploadFile['name'])){
					unlink("../image_50/".$uploadFile['name']);
				}
				if(file_exists("../image_220/".$uploadFile['name'])){
					unlink("../image_220/".$uploadFile['name']);
				}
				if(file_exists("../image_350/".$uploadFile['name'])){
					unlink("../image_350/".$uploadFile['name']);
				}
			}
		}
		$mes="<p>编辑失败!</p><a href='listPro.php' target='mainFrame'>重新编辑</a>";
		
	}
	return $mes;
}
//删除商品
function delPro($id){
	$where="id={$id}";
	$res=delete("sbd_pro",$where);

	if($res){
		header("location:listPro.php"); 
	}else{
		$mes="删除失败!<br/><a href='listPro.php' target='mainFrame'>重新删除</a>";
	}
	return $mes;
}
//根据shopId得到商品的详细信息
function getProById($id){
		$sql="select * from sbd_pro where id={$id}";
		$row=fetchOne($sql);
		return $row;
}
//根据shopId查询店铺下是否有商品
function checkProExistByShopId($shopId){
	$sql="select * from sbd_pro where shopId={$shopId}";
	$rows=fetchAll($sql);
	return $rows;
}
