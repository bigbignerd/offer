<?php
/**
 * 读取文件倒数n行的数据
 */
function readLastNFile($path, $n)
{
	//打开文件
	$handle = fopen($path, "r");
	if(!$handle){
		exit("打开文件失败");
	}
	$eof = '';//换行符
	$pos = -2;
	$str = '';
	while($n > 0){
		while($eof !== "\n"){
			if(fseek($handle, $pos, SEEK_END) == 0){
				$eof = fgetc($handle);
				$pos--;
			}else{
				break;
			}
		}
		$n--;
		$str .= fgets($handle);
		$eof = '';
	}
	return $str;
}
//
//test
echo readLastNFile(__FILE__, 4);
?>