<?php
require_once 'include.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="scripts/jquery-1.8.3.js"></script>
        <script src="scripts/jquery.reveal.js"></script>
        <script src="scripts/jquery.cookie.js"></script>
        <link rel="icon" href="images/favicon.ico" type="image/x-icon" /> 
        <link rel="stylesheet" href="style/reset.css">
        <link rel="stylesheet" href="style/common.css">
        <link rel="stylesheet" href="style/base.css"> 
        <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/shopcart.css"> 
        <link rel="stylesheet" href="style/place.css"> 
        <link rel="stylesheet" href="style/footer_1.css"> 
        <link rel="stylesheet" href="style/reveal.css">
        <link rel="stylesheet" href="style/login.css">
        <title>随便点儿官网</title>
    </head>
    <body background="images/place_bg.jpg">

        <!--header部分-->
        <div class="header shadow">
            <div class="search-result"> 
            </div>
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
        <div class="place-content"> 
            
            <div class="place-wrap-1">
                <div class="place-cc">
                <span>重庆</span>
                <a class="city">[切换城市]</a>
 
                </div>
                <div class="place-wrap place-shadow">
                    <div class="place-tab">
                    <ul>
                        <li><a id="t1"  class="alive">渝中区</a></li>
                        <li><a id="t2">大渡口区</a></li>
                        <li><a id="t3">江北区</a></li>
                        <li><a id="t4">沙坪坝区</a></li>
                        <li><a id="t5">九龙坡区</a></li>
                        <li><a id="t6">南岸区</a></li>
                        <li><a id="t7">北碚区</a></li>
                    </ul>
                    </div>
                    <div id="n1" class="place-names">
                        <div class="name-item"><a  class="place-link" href="shop.php">朝天门</a></div>
                        <div class="name-item"><a href="shop.php">望龙门</a></div>
                        <div class="name-item"><a href="shop.php">解放碑</a></div>
                        <div class="name-item"><a href="shop.php">南纪门</a></div>
                        <div class="name-item"><a href="shop.php">七星岗</a></div>
                        <div class="name-item"><a href="shop.php">菜园坝</a></div>
                        <div class="name-item"><a href="shop.php">两路口</a></div>
                        <div class="name-item"><a href="shop.php">大溪沟</a></div>
                        <div class="name-item"><a href="shop.php">上清寺</a></div>
                        <div class="name-item"><a href="shop.php">石油路</a></div>
                        <div class="name-item"><a href="shop.php">大坪</a></div>
                        <div class="name-item"><a class="new" a href="shop.php">化龙桥</a></div>
                    </div>
                    <div id="n2" class="place-names n">
                        <div class="name-item"><a href="shop.php">新山村街道</a></div>
                        <div class="name-item"><a href="shop.php">跃进村街道</a></div>
                        <div class="name-item"><a href="shop.php">九宫庙街道</a></div>
                        <div class="name-item"><a href="shop.php">茄子溪街道</a></div>
                        <div class="name-item"><a href="shop.php">春晖路街道</a></div>
                        <div class="name-item"><a href="shop.php">八桥镇</a></div>
                        <div class="name-item"><a href="shop.php">建胜镇</a></div>
                        <div class="name-item"><a class="new" a href="shop.php">跳蹬镇</a></div>
                    </div>
                    <div id="n3" class="place-names n">
                        <div class="name-item"><a href="shop.php">石马河街道</a></div>
                        <div class="name-item"><a href="shop.php">大石坝街道</a></div>
                        <div class="name-item"><a href="shop.php">观音桥街道</a></div> 
                        <div class="name-item"><a href="shop.php">华新街街道</a></div> 
                        <div class="name-item"><a href="shop.php">五里店街道</a></div> 
                        <div class="name-item"><a href="shop.php">江北城街道</a></div> 
                        <div class="name-item"><a href="shop.php">寸滩街道</a></div> 
                        <div class="name-item"><a href="shop.php">铁山坪街道</a></div> 
                        <div class="name-item"><a href="shop.php">郭家沱街道</a></div> 
                        <div class="name-item"><a href="shop.php">鱼嘴街道</a></div>
                        <div class="name-item"><a href="shop.php">复盛镇</a></div>
                        <div class="name-item"><a href="shop.php">五宝镇</a></div>
                    </div>
                    <div id="n4" class="place-names n">
                        <div class="name-item"><a href="shop.php">小龙坎街道</a></div>
                        <div class="name-item"><a href="shop.php">沙坪坝街道</a></div>
                        <div class="name-item"><a href="shop.php">磁器口街道</a></div>
                        <div class="name-item"><a href="shop.php">双碑街道</a></div> 
                        <div class="name-item"><a href="shop.php">天新桥街道</a></div>
                        <div class="name-item"><a href="shop.php">新桥街道</a></div>
                        <div class="name-item"><a href="shop.php">陈家桥街道</a></div>
                        <div class="name-item"><a href="shop.php">青木关镇</a></div>
                        <div class="name-item"><a href="shop.php">曾家镇</a></div>
                        <div class="name-item"><a href="shop.php">石井坡街道</a></div>
                    </div>
                    <div id="n5" class="place-names n">
                        <div class="name-item"><a href="shop.php">杨家坪街道</a></div>
                        <div class="name-item"><a href="shop.php">谢家湾街道</a></div> 
                        <div class="name-item"><a href="shop.php">石坪桥街道</a></div> 
                        <div class="name-item"><a href="shop.php">黄桷坪街道</a></div> 
                        <div class="name-item"><a href="shop.php">中梁山街道</a></div> 
                        <div class="name-item"><a href="shop.php">石桥铺街道</a></div> 
                        <div class="name-item"><a href="shop.php">九龙镇</a></div> 
                        <div class="name-item"><a href="shop.php">华岩镇</a></div>
                        <div class="name-item"><a href="shop.php">白市驿镇</a></div>
                        <div class="name-item"><a href="shop.php">西彭镇</a></div>
                        <div class="name-item"><a href="shop.php">陶家镇</a></div>
                        <div class="name-item"><a href="shop.php">走马镇</a></div>
                        <div class="name-item"><a href="shop.php">巴福镇</a></div>
                    </div>
                    <div id="n6" class="place-names n">
                        <div class="name-item"><a href="shop.php">铜元局街道</a></div>
                        <div class="name-item"><a href="shop.php">花园路街道</a></div>  
                        <div class="name-item"><a href="shop.php">南坪街道</a></div>  
                        <div class="name-item"><a href="shop.php">弹子石街道</a></div>  
                        <div class="name-item"><a href="shop.php">南山街道</a></div>  
                        <div class="name-item"><a href="shop.php">南坪镇</a></div>  
                        <div class="name-item"><a href="shop.php">长生镇</a></div>  
                        <div class="name-item"><a href="shop.php">迎龙镇</a></div>  
                        <div class="name-item"><a href="shop.php">广阳镇</a></div> 
                    </div>
                    <div id="n7" class="place-names n">
                        <div class="name-item"><a href="shop.php">天府镇</a></div>
                        <div class="name-item"><a href="shop.php">柳荫镇</a></div> 
                        <div class="name-item"><a href="shop.php">歇马镇</a></div>
                        <div class="name-item"><a href="shop.php" class="new">水土镇</a></div>
                        <div class="name-item"><a href="shop.php">澄江镇</a></div>
                        <div class="name-item"><a href="shop.php">复兴镇</a></div>
                        <div class="name-item"><a href="shop.php">三圣镇</a></div>
                        <div class="name-item"><a href="shop.php">石坝镇</a></div>
                        <div class="name-item"><a href="shop.php">朝阳街</a></div>
                        <div class="name-item"><a href="shop.php">东阳街</a></div>
                        <div class="name-item"><a href="shop.php">北温泉街</a></div>
                        <div class="name-item"><a href="shop.php">龙凤桥街</a></div>
                    </div>
                </div> 
            </div>

            <!--底部-->
            <div class="footer-content">
                  <div class="footer-content-entrance">
                    <a class="footer-content-link" href="about.html?p=guanyuwomen">关于我们</a>
                    <span class="footer-content-separator">|</span>
                    <a class="footer-content-link footer-content-weixing">关注微信
                    <img class="weixin-pic" src="images/qr_code.jpg">
                    </a>
                    <span class="footer-content-separator">|</span> 
                    <a class="footer-content-link" href="about.html?p=tousujianyi">投诉建议</a>
                    <span class="footer-content-separator">|</span>
                    <a class="footer-content-link kaidian_address" href="about.html?p=shangjiaruzhu">商家入驻</a>

                  </div>
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
                        <a id="cart-pay">结算</a>
                    </div>
                </div>
        </div>
        
        <ul  class="place-nav n">
                <li><a class="city">北京</a></li>
                <li><a class="city">天津</a></li>
        </ul>
    </div>

    <!--登陆模块-->
    <?php require "login.html" ?>

    <script src="scripts/common.js"></script>
    <script src="scripts/md5.js"></script>
    <script src="scripts/myInfo.js"></script>
    <script src="scripts/login.js"></script>
    <script src="scripts/cart.lib.js"></script>
    <script src="scripts/cart.js"></script>
    <script src="scripts/header.js?v=1"></script>
    <script src="scripts/footer.js"></script>
    <script type="text/javascript">
                $(function(){
   
                    //初始化购物车
                    initCart();

                    //footer
                    processFooter();

                    //地址悬浮
                    $(".place-cc a,.place-nav").hover(function() { 
                        $('.place-nav').show();
                    }, function() {
                    $('.place-nav').hide();
                    });
                    
                    //购物车相关 
                    var shopCartWidth=$(".shop-cart").width(); 
                    //默认隐藏购物车
                    $(".shop-cart,.shop-bottom").css("right",-shopCartWidth); 
                    var mRight=-shopCartWidth;
                    
                    $("#cart").click(function(){
                        $('.shop-cart').show(); 
                        //适配购物车
                        processShopItem();
                        
                        shopCartWidth=$(".shop-cart").width();
                        if(mRight=='0px'){
                            mRight=-shopCartWidth;
                            $(".shop-cart,.shop-bottom").animate({right:mRight},200);
                        }
                        else{
                            mRight='0px';
                            $(".shop-cart,.shop-bottom").animate({right:mRight},200);
                        }
                    });

                    //中间高 
                    var zw=$(window).width();
                    var middleWidth=$('.place-wrap').width();
                    var middleHeight=$('.place-wrap').height();
                    var marginLeft=(zw-middleWidth)/2; 
                    $(".place-wrap-1").css("marginLeft",marginLeft); 
                    $(".place-wrap-1").show(); 

                    //地址选择悬浮
                    $(".place-nav").css("left",marginLeft+32);//再加32
                    //地址点击
                    $('.city').click(function(event) {
                        if($(this).text()!="重庆"){ 
                         alert("该城市未开通");
                        }else{
                            window.location.reload();
                        }
                    });

                    //弹出动画
                    $(".place-wrap").animate({"opacity":"0.9"}, 200);

                    $(window).resize(function(){
                        //中间高 
                        var zw=$(window).width();
                        var middleWidth=$('.place-wrap').width();
                        var middleHeight=$('.place-wrap').height();
                        var marginLeft=(zw-middleWidth)/2; 
                        $(".place-wrap-1").css("marginLeft",marginLeft); 
                        //地址选择悬浮
                        $(".place-nav").css("left",marginLeft+32);

                        //适配购物车
                        processShopItem();

                        $('.shop-cart').hide();
                        var shopCartWidth=$(".shop-cart").width(); 
                        //默认隐藏购物车
                        $(".shop-cart,.shop-bottom").css("right",-shopCartWidth); 
                        mRight=-shopCartWidth;

                        processFooter();
                    });
                 
                        //tab点击事件
                        $('.place-tab a').click(function(){
                            //变样式
                            var cl=$(this).parents('.place-tab').find('a');
                            cl.removeClass('alive');
                            $(this).addClass('alive');
                            var pid=$(this).attr('id');
                            $('.place-names').hide();
                            var n="#"+pid.replace('t','n');
                            $(n).show();
                        });
                    });

                    function processFooter(){
                        var zh=$(document.body).height(); 
                        $(".footer-content").css('top', zh-60);
                        $(".footer-content").show();
                    }
    </script>
</body>
</html>