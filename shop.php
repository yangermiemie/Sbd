<?php
require_once 'include.php';

$sql="select * from sbd_shop";
$shops=fetchAll($sql);

$shopId=$_GET['shopId'];
$where = $shopId?$shopId:$shops[0]['shopId'];

$sql2="select * from sbd_pro where shopId='".$where."' order by pubTime desc";
$pros=fetchAll($sql2);

$sql3="select * from sbd_shop where shopId='".$where."'";
$shopInfo=fetchOne($sql3);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="scripts/jquery-1.8.3.js"></script>
        <script src="scripts/jquery.reveal.js"></script>
        <script src="scripts/jquery.cookie.js"></script>
        <script src="scripts/jquery.fly.min.js"></script>  
        <script src="scripts/common.js"></script>  
        <link rel="icon" href="images/favicon.ico" type="image/x-icon" /> 
        <link rel="stylesheet" href="style/reset.css">
        <link rel="stylesheet" href="style/common.css">
        <link rel="stylesheet" href="style/base.css">
        <link rel="stylesheet" href="style/shop.css">
        <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/shopcart.css">
        <link rel="stylesheet" href="style/leftmenu.css">
        <link rel="stylesheet" href="style/reveal.css">
        <link rel="stylesheet" href="style/login.css">
        <title>随便点儿</title>
    </head>
    <body>

       <!--菜品展示-->
       <div class="content-middle n">
            <div id="m1" class="menu-wrap">
            <?php foreach($pros as $value) : ?>
                <div class="menu-item" item-id="<?php echo $value['id']; ?>"> 
                    <div class="item-wrap">
                        <img src="image_220/<?php echo $value[icon]; ?>" height="130" width="130"> 
                        <div class="item-detail">
                            <span class="name">菜名：<?php echo $value[pName]; ?></span>
                            <span class="stars">上新时间：<?php echo date("Y-m-d H:i:s",$value['pubTime']); ?></span>
                            <span class="price" item-price="<?php echo $value[price]; ?>">￥<?php echo $value[price]; ?></span> 
                            <img class="buy" src="images/icon_buy.png"> 
                            
                        </div> 
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
       </div>
        <!--header部分-->
        <div class="header shadow">
            <div class="header-left fl">
                <div class="icon fl"></div>
                <a class="logo" href="index.php"></a>
                <div class="search">
                <img class="search-icon" src="images/icon_search.png" width="20" height="20">
                <input id="search-input" class="search-input" type="text" placeholder="请输入地名" onkeypress="onKeySearch()">
                <span id="search-del" class="search-del">&times;</span> 
                </div>
                <div class="clear"></div>
            </div>
            <div class="header-right fr">
                <div class="login fl">

                    <span class="header-operater">
                    <a href="shop.php">外卖</a>
                    <a href="account/order.php">我的订单</a>
                    <a href="about.html?p=lianxiwomen">联系我们</a> 
                    </span>
                    <?php if(!isset($_SESSION['userName'])) : ?>
                    <a id="header-login" class="navBtn f-radius f-select " data-reveal-id="myModal" data-animation="fade">登录</a>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['userName'])) : ?>
                    <a>欢迎你！<?php echo $_SESSION['userName']; ?></a>
                    <a class="navBtn f-radius f-select" href="./admin/doAdminAction.php?act=logoutUser">注销</a>
                    <?php endif; ?>
                </div>
                <div id="cart" class="cart fr"> 
                    <img class="cart-icon" src="images/icon_cart_22_22.png">
                </div>
                <div id="user" class="user fr n">
                    <img class="user-icon" src="images/icon_my.png"> 
                </div> 
            </div> 
        </div>
        <!--内容部分-->
        <div class="shop-content"> 
        
            <div class="leftmenu">
            
                    <div class="gonggao-wrap">
                    <div class="gonggao">     
                      <span id="shopTip"><b>店铺公告：<?php echo $shopInfo[shopTip].'<br />'; ?></b></span>
                      <span><b>店铺地址：<?php echo $shopInfo[shopBlock].$shopInfo[shopFloor]; ?></b></span>
                    </div>
                    </div>
                    
                    <dl>
                        <dt>
                        <img class="shop-icon" src="images/test02.jpg" >
                        <span class="shop-name">
                        重庆
                        </span>
                        <span class="switch-address">
                        <a class="switch-address" href="index.php">[切换地址]</a>
                        </span>
                        </dt>
                        <div class="leftlist"><b>店铺列表&nbsp;<b></div>
                        <?php foreach($shops as $value) : ?>
                          <?php if($value == $shops[0]) : ?>
                            <dd id="<?php echo $value[shopId]; ?>" class="leftmenu-item"><a href="shop.php?shopId=<?php echo $value[shopId]; ?>"><?php echo $value[shopName]; ?></a></dd>
                          <?php endif; ?>
                          <?php if($value != $shops[0]) : ?>
                            <dd id="<?php echo $value[shopId]; ?>" class="leftmenu-item"><a href="shop.php?shopId=<?php echo $value[shopId]; ?>"><?php echo $value[shopName]; ?></a></dd>
                          <?php endif; ?>
                    <?php endforeach; ?>
                    </dl> 
            </div>
            <!--购物车-->
            <div class="shop-cart shadow n">
                <div class="shop-head">
                    购物车<a class="shop-clear">[清空]</a>
                </div>
                <div class="shop-body">
                
                    <div class="isnull">
                        <span></span>
                        <b>购物车空空如也</b>
                    </div>
                </div>
                <div class="shop-bottom">
                    <div class="bottom-price fl">总计：￥<label>32</label>
                    </div>
                    <div class="bottom-icon"></div>
                    <div class="bottom-pay fr">
                      <?php
                        if(!isset($_SESSION['userName'])) {
                          echo '<a href="#">未登录</a>';
                        } else {
                          echo '<a id="cart-pay" href="#">结算</a>';
                        }
                      ?>
                    </div>
                </div>
        </div>
    </div>

    <?php require "login.html" ?>

        <a class="close-reveal-modal"><img src="images/icon_close.png" height="24" width="24"></a>
    </div>

    <script src="scripts/md5.js"></script>
    <script src="scripts/myInfo.js"></script>
    <script src="scripts/shopInfo.js"></script>
    <script src="scripts/login.js"></script>   
    <script src="scripts/cart.lib.js"></script>
    <script src="scripts/cart.js"></script>
    <script src="scripts/header.js"></script>
    <script src="scripts/shop.js"></script>
    <script type="text/javascript">
            $(function(){
              
                $("<?php echo '#'.$shopId ?>").addClass('active');
                
                //存商家信息到cookie
                var shopId=$('.shop-name').attr('shopId');
                var shopName=$('.shop-name').attr('shopName');
                var shopPhone=$('.shop-name').attr('shopPhone'); 
                $.cookie('shopId',shopId,{expires:365,path:'/'});//写cookie 
                //初始化购物车
                initCart();
                $('.shop-cart').show(); 

                //左侧导航
                var zh=$(window).height();
                var leftHeight=zh-55;
                $(".leftmenu").height(leftHeight);
                //公告宽度
                processGonggao();

                //菜品div宽度
                processMenuItems();

                //购物车
                processShopItem();
                
                $('.gonggao').show();
                $('.content-middle').show();
               
                //监听窗口尺寸
                $(window).resize(function(){
                    //设置左侧的高
                    var zh=$(window).height(); 
                    var leftHeight=zh-55;
                    $(".leftmenu").height(leftHeight);
                    //公告宽度
                    processGonggao();

                    //菜品div宽度
                    processMenuItems();

                    //购物车
                    processShopItem();
                    
                });
                
                //左侧点击
                $('.leftmenu-item a').click(function(){
                    //变样式
                    $(this).parents('.leftmenu').find('.leftmenu-item').removeClass('active');
                    $(this).parent().addClass('active');
                    //变菜品
                    var i=$(this).parents('dd').attr('id');
                    $('.menu-wrap').hide();
                    var m="#"+i.replace('i','m'); 
                    $(m).fadeIn(600);
                });
                
                //菜品相关
                function processMenuItems(){
                    var zw=$(window).width(); 
                    var shopCartWidth=$('.shop-cart').width();
                    var leftMenuWidth=$('.leftmenu').width();
                    var mw=zw-shopCartWidth-leftMenuWidth;  
                    $(".content-middle").width(mw);
                    $(".content-middle").css('left', leftMenuWidth);
                    $(".menu-wrap").width(mw);

                    var percent='48%';
                    var marginLeft=0;  

                    if(mw>=700){
                        percent='48%';
                        marginLeft=mw-mw*0.48*2; 
                        if(zw<1240){
                            $(".stars").css('bottom', 40);
                            $(".price").css('left', 140);
                            // $(".buy").css('left', 180);
                            $(".price").css('right', '');
                            $(".buy").css('right', 10);
                        }else{
                            //样式归位
                            $(".stars").css('bottom', 5);
                            $(".price").css('left', '');
                            // $(".buy").css('left', '');
                            $(".price").css('right', 50);
                            $(".buy").css('right', 10);
                        }
                    }
                    else if(mw<700){
                        percent='96%';
                        marginLeft=mw-mw*0.96;
                        
                        if(zw<660){
                            $(".stars").css('bottom', 40);
                            $(".price").css('left', 140);
                            // $(".buy").css('left', 180);
                            $(".price").css('right', '');
                            $(".buy").css('right', 10);
                        }else{
                            //样式归位
                            $(".stars").css('bottom', 5);
                            $(".price").css('left', '');
                            // $(".buy").css('left', '');
                            $(".price").css('right', 50);
                            $(".buy").css('right', 10);
                        }
                    }
                    $(".menu-item").css('width', percent);
                    $(".item-wrap").css('margin-left', marginLeft);
                }

                //公告宽度
                function processGonggao(){ 
                    var zw=$(window).width();
                    var shopCartWidth=$('.shop-cart').width();
                    var leftMenuWidth=$('.leftmenu').width();
                    var gw=zw-shopCartWidth-leftMenuWidth-40; 
                    var gw_wrap=gw+50;
                    $(".gonggao").width(gw); 
                    $(".gonggao").css('left', leftMenuWidth+10);
                    $(".gonggao-wrap").width(gw_wrap); 
                    $(".gonggao-wrap").css('left',leftMenuWidth );
                }
            });
            
    </script>
</body>
</html>