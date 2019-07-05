<?php
//接单
function takeOrder($id){
    $where="orderId=".$id." and received=0";  
    $arr['received']="1";
    $arr['receivedTime']=time();
    //先检索
    $sql="select id from sbd_order where ".$where;
    $row=fetchOne($sql);
    if(!$row){
        $mes="<p>订单已处理过!</p><a href='listOrder.php' target='mainFrame'>返回订单管理</a>";//订单已处理过
        return $mes;
    }
    if(update("sbd_order", $arr,$where)){
        $mes="<p>接单成功!</p><a href='listOrder.php' target='mainFrame'>返回订单管理</a>";
    }else{
        $mes="<p>接单失败!</p><a href='listOrder.php' target='mainFrame'>返回订单管理</a>";//接单失败
    }
    return $mes;
}

//取消订单
function cancelOrder($id){
    $where="orderId=".$id." and received=1";
    $arr['received']="0";
    $arr['receivedTime']=time();
    //先检索
    $sql="select id from sbd_order where ".$where;
    $row=fetchOne($sql);
    if(!$row){
        $mes="<p>订单已处理过!</p><a href='listOrder.php' target='mainFrame'>返回订单管理</a>";//订单已处理过
        return $mes;
    }
    if(update("sbd_order", $arr,$where)){
        $mes="<p>订单已取消!</p><a href='listOrder.php' target='mainFrame'>返回订单管理</a>";//订单已取消
    }else{
        $mes="<p>取消失败!</p><a href='listOrder.php' target='mainFrame'>返回订单管理</a>";//取消失败
    }
    return $mes;
}

//用户订单list
function addOrder(){
    $arr=$_GET;
    unset($arr['act']); 
    //var_dump($arr);
    foreach($arr as $proId=>$num) {
      //echo $proId.'+'.$num.'<br />';
      
      $sql="select * from sbd_pro where id=".$proId;
      $pro = fetchOne($sql);
      
      $sql="select * from sbd_shop where shopId=".$pro['shopId'];
      $shop = fetchOne($sql);
      
      $sql="select * from sbd_user where id=".$_SESSION['userId'];
      $user = fetchOne($sql);
      
      $orders['userHome']=$user['userHome'];
      $orders['username']=$user['username'];
      $orders['price']=$pro['price'];
      $orders['userPhone']=$user['userPhone'];
      $orders['pay']=1;
      $orders['orderTime']=time()-100;
      $orders['shopId']=$pro['shopId'];
      $orders['shopName']=$shop['shopName'];
      $orders['receivedTime']=time();
      $orders['received']=1;
      $orders['proName']=$pro['pName'];
      
      for($i=0;$i<$num;$i++) {
        //echo $proId.'+'.$i.'<br />';
          
          insert("sbd_order",$orders);
      }
    }
    
    alertMes("下单成功!","../account/order.php");
}
