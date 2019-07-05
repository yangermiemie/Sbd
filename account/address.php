<?php 
require_once '../include.php';

if(!isset($_SESSION['userName'])) {
  alertMes("没有登陆 !","../index.php");
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
        <link rel="stylesheet" href="../style/form.css"> 
        <title>随便点</title>
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
                        <dd class="menu-item">
                            <span class="left-icon">
                                <img src="../images/icon_order.png" width="18px" height="18px">
                            </span>
                        <a href="order.php">我的订单</a>
                        </dd>
                        <dd class="menu-item active">
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
                    <h3 class="summary-header">送餐地址</h3>
                </div>
                <form action="../admin/doAdminAction.php?act=editUser1" id="save-form" method="post">
                <div class="accountform">
                    <div>
                        <div class="accountformfield">
                            <label>详细地址</label> 
                            <input id="address-detail" name="userHome" placeholder="详细地址">
                            <div class="accountformfield-hint form-error">
                                <span id="error-detail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="accountform-buttons">
                        <input type="button" class="save-btn" value="保存"/>
                    </div>
                </div>
                </form>
            </div> 
            <div class="clear"></div>
        </div>
        
        <script src="../scripts/jquery-1.8.3.js"></script>
        <script type="text/javascript">
                $(function(){
                  //保存地址
                  $('.accountform-buttons').click(function (){
                      var addressDetail=$('#address-detail').val().trim();
                      if(addressDetail==""){ 
                          $('#error-detail').text("请输入详细地址");
                          return;
                      }else {
                        $('#save-form').submit();
                      }
                  });
                });
        </script>
    </body>
</html>