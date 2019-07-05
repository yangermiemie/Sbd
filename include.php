<?php
//编码
header("content-type:text/html;charset=utf-8");
//错误报告 0：关闭提醒 255：所有提醒 7：部分提醒
error_reporting(7);
//时区
date_default_timezone_set("PRC");
//启动session
session_start();
//当前文件的绝对路径
define("ROOT",dirname(__FILE__));
//设置包含目录
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
//包含多个模块

  //提示消息、获取图片上传时间
  require_once 'common.func.php';
  //验证码、缩略图、图片裁剪
  require_once 'image.func.php';
  //mysql增删改查
  require_once 'mysql.func.php';
  //分页
  require_once 'page.func.php';
  //切割字符串
  require_once 'string.func.php';
  //上传图片
  require_once 'upload.func.php';

  //
  require_once 'admin.inc.php';
  //商品
  require_once 'pro.inc.php';
  //店铺
  require_once 'shop.inc.php';
  //订单
  require_once 'order.inc.php';

  //mysql参数
  require_once "configs.php";
