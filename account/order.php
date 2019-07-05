<?php 
require_once '../include.php';

//得到所有订单
if(!isset($_SESSION['userName'])) {
  alertMes("没有登陆 !","../index.php");
}
$sql="select * from sbd_order where username='".$_SESSION['userName']."'";
$totalRows=getResultNum($sql);
if($totalRows<=0) {
  alertMes("没有订单 !","../shop.php");
}
$pageSize=2;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
if($totalRows<=0) {
  $offset=0;
}
$orderBy="order by orderTime desc ";
$sql="select * from sbd_order where username='".$_SESSION['userName']."' "."{$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){ 
    echo "还没有订单哟！";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="../scripts/jquery-1.8.3.js"></script>
        <script src="../scripts/jquery.reveal.js"></script>
        <script src="../scripts/jquery.cookie.js"></script>
        <link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="../style/reset.css">
        <link rel="stylesheet" href="../style/common.css">
        <link rel="stylesheet" href="../style/base.css">
        <link rel="stylesheet" href="../style/account.css">
        <link rel="stylesheet" href="../style/header.css">
        <link rel="stylesheet" href="../style/reveal.css">
        <link rel="stylesheet" href="../style/login.css">
        <link rel="stylesheet" href="../style/menu02.css">
        <link rel="stylesheet" href="../style/order.css">
        <link rel="stylesheet" href="../style/footer_2.css">
        <link rel="stylesheet" href="../style/page.css">
        <title>订饭组</title>
    </head>
    <body>
        <!--header部分-->
        <div class="header shadow">
            <div class="search-result"> 
            </div>
            <div class="header-left fl">
                <div class="icon fl"></div>
                <a class="logo" href="../index.php"></a>
                <div class="search">
                <img class="search-icon" src="../images/icon_search.png" width="22" height="22">
                <input id="search-input" class="search-input" type="text" placeholder="请输入地方名" onkeypress="onKeySearch()">
                <span id="search-del" class="search-del">&times;</span> 
                </div>
                <div class="clear"></div>
            </div>
            <div class="header-right fr">
                <div class="login fl">

                    <span class="header-operater">
                    <a href="../shop.php">外卖</a>
                    <a href="order.php">我的订单</a>
                    <a href="../about.html?p=lianxiwomen">联系我们</a> 
                    </span> 
                    <?php if(!isset($_SESSION['userName'])) : ?>
                    <a id="header-login" class="navBtn f-radius f-select " data-reveal-id="myModal" data-animation="fade">登录</a>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['userName'])) : ?>
                    <a>欢迎你！<?php echo $_SESSION['userName']; ?></a>
                    <a class="navBtn f-radius f-select" href="../admin/doAdminAction.php?act=logoutUser">注销</a>
                    <?php endif; ?>
                </div>
                <div id="cart" class="cart fr"> 
                    <img class="cart-icon" src="../images/icon_cart_22_22.png">
                </div>
                <div id="user" class="user fr n">
                    <img class="user-icon" src="../images/icon_my.png"> 
                </div> 
            </div> 
        </div>
        <!--主体-->
        <div class="content">
            <!--左侧导航-->
            <div class="content-left fl">
                <div class="menu-left">
                    <dl>
                        <dt>个人中心</dt>
                        <dd class="menu-item active">
                            <span class="left-icon">
                                <img src="../images/icon_order.png" width="18px" height="18px">
                            </span>
                        <a href="order.php">我的订单</a>
                        </dd>
                        <dd class="menu-item">
                            <span class="left-icon">
                                <img src="../images/icon_address.png" width="18px" height="18px">
                            </span>
                        <a href="address.php">送餐地址</a>
                        </dd>
                        <dd class="menu-item ">
                            <span class="left-icon">
                                <img src="../images/icon_settings.png" width="18px" height="18px">
                            </span>
                        <a href="setting.php">账户设置</a>
                        </dd>
                    </dl>
                </div>
            </div>
            <!--右侧内容-->
            <div class="content-right fl">
                <div class="summary fl">
                    <h3 class="summary-header">全部订单</h3>
                </div>
                <div class="order-content-wrap">

                <?php foreach($rows as $row):?>
                    <div class="order-content">
                        <div class="order-meal">
                            <div class="order-delivery">
                                <div class="receive-info">
                                    <span>店铺名：<?php echo $row['shopName'].'<br />';?></span>
                                    <span>商品名：<?php echo $row['proName'];?></span>
                                    <span>订单编号：<?php echo $row['id'];?></span>
                                    <span>下单时间：<?php echo date("Y-m-d H:i:s",$row['orderTime']);?></span>
                                    <span>送餐地址：<?php echo $row['userHome'];?></span>
                                    <span>联系人：<?php echo $row['username'];?></span>
                                    <span>电话：<?php echo $row['userPhone'];?></span>
                                </div>
                            </div>
                            <div class="order-price">
                                总价：<span class="ft-red">￥<?php echo $row['price'];?></span>
                            </div>
                        </div>
                        <div class="order-info">
                            <div class="delivery-info">
                                <div class="delivery-card ">
                                    <div class="card-header nick-selected">
                                        <div class="round">
                                        </div>
                                        <div class="line-through ">
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <div class="status-msg">
                                            订单提交成功
                                        </div>
                                        <div class="prompt"> 订单号：<?php echo $row['id'];?>
                                        </div>
                                    </div>
                                </div>
                                <div class="delivery-card ">
                                    <div class="card-header nick-selected">
                                        <div class="round">
                                        </div>
                                        <?php echo  $row['received']!=0?"<div class=line-through></div>":"";?>  
                                    </div>
                                    <div class="card-body ">
                                        <div class="status-msg">
                                        <?php 
                                            if($row['paymethod']==2){
                                                echo "已提交订单";
                                            }else{
                                                echo  $row['pay']==0?"等待支付":"已支付";
                                            }
                                        ?> 
                                        </div>
                                    </div>
                                </div>
                                <div <?php echo  $row['received']==0?"class='delivery-card n'":"class='delivery-card'";?>>
                                    <div class="card-header nick-selected">
                                        <div class="round">
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <div class="status-msg">接单成功</div>
                                        <div class="prompt"> 接单时间：
                                            <?php if($row['received']!=0){
                                                if($row['receivedTime']){
                                                    echo date("Y-m-d H:i:s",$row['receivedTime']);
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  endforeach;?>
                    <div class="page">
                    <?php 
                    if($totalPage>1){ 
                     echo showPage($page, $totalPage);
                    }
                     ?>
                    </div>
                </div>
            </div>
            
            <div class="clear"></div>
        </div>
        </script>
    </body>
</html>