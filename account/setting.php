<?php 
require_once '../include.php';
if(!isset($_SESSION['userName'])) {
  alertMes("没有登陆 !","../index.php");
}
$sql="select * from sbd_user where id=".$_SESSION['userId'];
$rows=fetchOne($sql);
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
        <title>随便点儿</title>
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
                        <dd class="menu-item">
                            <span class="left-icon">
                                <img src="../images/icon_address.png" width="18px" height="18px">
                            </span>
                        <a href="address.php">送餐地址</a>
                        </dd>
                        <dd class="menu-item active">
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
                    <h3 class="summary-header">账户设置</h3>
                </div>
                <div class="accountform" id="form-settings">
                    <div>
                        <div class="accountformfield">
                            <span id="myFanzu">我的信息：&nbsp;</span>
                        </div>
                        <div class="accountformfield">
                            <span>姓名：<?php echo $rows['username'] ?></span>
                        </div>
                        <div class="accountformfield phonefield">
                            <span>手机号：<?php echo $rows['userPhone'] ?></span>
                        </div>  
                        <div class="accountformfield passwordfield">
                            <span>密码：******</span>
                            <button id="btn-update-pwd">修改密码</button>
                        </div> 
                        <div class="accountformfield emailfield">
                            <span>住址：<?php echo $rows['userHome'] ?></span>
                        </div> 
                    </div>
                </div>
                
                <form action="../admin/doAdminAction.php?act=editUser2" id="save-form" method="post">
                <div class="accountform n" id="form-pwd">
                    <div>
                        <div class="accountformfield">
                            <label>新密码</label><input type="password" id="pwd2" name="password" placeholder="">
                            <div class="accountformfield-hint form-error">
                                <span id="error-pwd2"></span>
                            </div>
                        </div>
                        <div class="accountformfield">
                            <label>确认新密码</label><input type="password" id="pwd3" placeholder="">
                            <div class="accountformfield-hint form-error">
                                <span id="error-pwd3"></span>
                            </div>
                        </div>
                    </div> 
                    <div class="accountform-buttons">
                        <input type="submit" id="save-new-pwd" class="save-btn" value="修改"/>
                    </div>
                </div>
                </form>
            </div>
            <div class="clear"></div>
        </div>
        <script src="../scripts/jquery-1.8.3.js"></script>
        <script type="text/javascript">
            $(function(){
                //修改密码
                $("#btn-update-pwd").click(function() {
                    $("#form-settings").hide();
                    $("#form-pwd").show();
                });
                $('#save-new-pwd').click(function() {
                  if($('#pwd2').val().trim()==''){
                    $('#error-pwd2').text('密码不能为空 !');
                    return false;
                  }else {
                    $('#error-pwd2').text(' ');
                  }
                  if($('#pwd3').val().trim()==''){
                    $('#error-pwd3').text('密码不能为空 !');
                    return false;
                  }else {
                    if($('#pwd3').val().trim()!=$('#pwd2').val().trim()) {
                      $('#error-pwd3').text('两次输入密码不同 !');
                      return false;
                    }else {
                      $('#error-pwd3').text(' ');
                      return true;
                    }
                  }
                });
            });
        </script>
    </body>
</html>