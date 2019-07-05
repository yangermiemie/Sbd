<?php 
//得到文件的扩展名
function getExt($filename){
	return strtolower(end(explode(".",$filename)));
}
