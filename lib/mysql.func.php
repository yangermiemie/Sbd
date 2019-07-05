<?php

//连接数据库
function connect(){
  //设置数据库的DSN信息
  $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DBNAME.';charset='.DB_CHARSET;
  try{
    $pdo = new PDO($dsn, DB_USER, DB_PWD);
    $pdo->query("SET NAMES utf8");
  }catch(PDOException $e){
    //连接失败，输出异常信息
    exit('PDO连接数据库失败：'.$e->getMessage());
  }
  //echo 'PDO 连接数据库成功';
  return $pdo;
}

//插入
function insert($table,$array){
	$pdo=connect();
	$keys=join(",",array_keys($array));
	$vals="'".join("','",array_values($array))."'";
	$sql="insert into {$table}($keys) values({$vals})";

  $stmt = $pdo->prepare($sql);
  if(!$stmt->execute($array)){
    exit('执行失败：'.implode('-',$stmt->errorInfo()));
  }
  $insertId = $pdo->lastInsertId();//返回id
	return $insertId;
}

//更新
function update($table,$array,$where=null){
	$pdo=connect();
	foreach($array as $key=>$val){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
	}
		$sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
    $result=$pdo->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
}

//删除
function delete($table,$where=null){
	$pdo=connect();
	$where=$where==null?null:" where ".$where;
	$sql="delete from {$table} {$where}";
  $stmt = $pdo->query($sql);
  $affected_rows = $stmt->rowCount();
	return $affected_rows;
}

//得到指定一条记录
function fetchOne($sql){
	$pdo = connect();
  $stmt = $pdo->query($sql);  //返回PDOStatement对象
  //处理结果集
  $data = $stmt->fetch(PDO::FETCH_ASSOC);  //调用PDOStatement对象的fetchAll()方法处理结果集
  return $data;
}


//得到结果集中所有记录
function fetchAll($sql){
	$pdo = connect();
	$stmt = $pdo->query($sql);  //返回PDOStatement对象
  //处理结果集
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);  //调用PDOStatement对象的fetchAll()方法处理结果集
	return $data;
}

//得到结果集中的记录条数
function getResultNum($sql){
	$pdo=connect();
	$num=0;
	$stmt = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	if($stmt){
		$num=count($stmt);
	}
	return $num;
}
