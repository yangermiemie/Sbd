<?php
//通过GD库做验证码
function verifyImage(){

  //创建验证码画布
  $img_w = 100;  //验证码的宽度
  $img_h = 30;   //验证码的高度
  $img = imagecreatetruecolor($img_w, $img_h);         //创建画布
  $bg_color = imagecolorallocate($img,0xcc,0xcc,0xcc); //为画布分配颜色
  imagefill($img,0,0,$bg_color);                       //填充背景色

  //生成验证码文本
  $count = 4; //验证码位数
  $charset = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; //随机因子
  $charset_len = strlen($charset)-1; //计算随机因子长度（作为取出时的索引）
  $code = ''; //保存生成的验证码
  for($i=0; $i<$count; ++$i) {
    //通过索引取出字符，mt_rand()用于获取指定范围内的随机数
    $code .= $charset[mt_rand(0,$charset_len)];
  }

  //将生成的文本保存到Session中
  session_start();
  $_SESSION['verify'] = strtolower($code);

  //在画布中绘制验证码文本
  $fontSize = 16;    //文字大小
  $fontStyle = '../font/SourceCodePro-Bold.ttf'; //字体样式
  //生成指定长度的验证码
  for($i=0; $i<$count; ++$i){
      //随机生成字体颜色
      $fontColor = imagecolorallocate($img,mt_rand(0,100),mt_rand(0,50),mt_rand(0,255));
      imagettftext (
      $img,        //画布资源
      $fontSize,  //文字大小
      mt_rand(0,20) - mt_rand(0,25),            //随机设置文字倾斜角度
      $fontSize*$i+20,mt_rand($img_h/2,$img_h), //随机设置文字坐标，并自动计算间距
      $fontColor,  //文字颜色
      $fontStyle,  //文字字体
      $code[$i]  //文字内容
    );
  }

  //为验证码图片生成彩色噪点
  for($i=0; $i<300; ++$i){
      //随机生成颜色
      $color = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
      //随机绘制干扰点
      imagesetpixel($img,mt_rand(0,$img_w),mt_rand(0,$img_h),$color);
  }

  //绘制干扰线
  for($i=0; $i<10; ++$i){
      //随机生成干扰线颜色
      $color = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
      //随机绘制干扰线
      imageline($img,mt_rand(0,$img_w),0,mt_rand(0,$img_h*5),$img_h,$color);
  }

  header('Content-Type: image/gif'); //输出图像
  imagegif($img);
}

//生成缩略图
function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=true,$scale=0.5){
	list($src_w,$src_h,$imagetype)=getimagesize($filename);
	if(is_null($dst_w)||is_null($dst_h)){
		$dst_w=ceil($src_w*$scale);
		$dst_h=ceil($src_h*$scale);
	}
	$mime=image_type_to_mime_type($imagetype);
	$createFun=str_replace("/", "createfrom", $mime);
	$outFun=str_replace("/", null, $mime);
	$src_image=$createFun($filename);
	$dst_image=imagecreatetruecolor($dst_w, $dst_h);
	imagecopyresampled($dst_image, $src_image, 0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);
	if($destination&&!file_exists(dirname($destination))){
		mkdir(dirname($destination),0777,true);
	}
	$dstFilename=$destination==null?getUniName().".".getExt($filename):$destination;
	$outFun($dst_image,$dstFilename);
	imagedestroy($src_image);
	imagedestroy($dst_image);
	if(!$isReservedSource){
		unlink($filename);
	}
	return $dstFilename;
}

//图片裁剪函数
function cutImage($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=true){
    list($src_w,$src_h,$imagetype)=getimagesize($filename);
    if($src_w>$src_h){
        $src_x=($src_w-$src_h)/2;
        $src_y=0;
        $src_w=$src_h;
    }else{
        $src_x=0;
        $src_y=($src_h-$src_w)/2;
        $src_h=$src_w;
    }
    if(is_null($dst_w)||is_null($dst_h)){
        $dst_w=$src_h;
        $dst_h=$src_h;
    }

    $mime=image_type_to_mime_type($imagetype);
    $createFun=str_replace("/", "createfrom", $mime);
    $outFun=str_replace("/", null, $mime);
    $src_image=$createFun($filename);
    $dst_image=imagecreatetruecolor($dst_w, $dst_h);
    
    
    imagecopyresampled($dst_image, $src_image, 0,0,$src_x,$src_y, $dst_w, $dst_h, $src_w, $src_h);
    if($destination&&!file_exists(dirname($destination))){
        mkdir(dirname($destination),0777,true);
    }
    $dstFilename=$destination==null?getUniName().".".getExt($filename):$destination;
    $outFun($dst_image,$dstFilename);
    imagedestroy($src_image);
    imagedestroy($dst_image);
    if(!$isReservedSource){
        unlink($filename);
    }
    return $dstFilename;
}
