<?php
/**
 * 判断一个字符串是否是一个合法的数字表示
 */

function isNumeric($str)
{
	if(empty($str)){
		return false;
	}
	$index = 0;
	//判断是否是连续的数字
	$numeric = scanInteger($str, $index);
	//判断是否有小数点
	if($str[$index] == '.'){
		//有小数点判断后面是否为连续的数字
		$index++;
		$numeric = isContinueInteger($str, $index) || $numeric;
	}
	//判断是否有e或E
	if($str[$index] == 'e' || $str[$index] == 'E'){
		$index++;
		$numeric = scanInteger($str, $index) && $numeric;
	}
	return $numeric && $index >= strlen($str);
}

//判断否为：正负号+后连续的数字字符
function scanInteger($str, &$index)
{
	if($str[$index] == '+' || $str[$index] == '-'){
		$index++;
	}
	return isContinueInteger($str, $index);
}

//判断是否为连续的数字
function isContinueInteger($str, &$index)
{
	$before = $index;

	while($index < strlen($str) && $str[$index] >= '0' && $str[$index] <= '9'){
		$index++;
	}
	return $index > $before;
}

//test

$str = '.1e1';
$str = '+1';
$str = '-1.e';
$str = '-1e-16';
echo isNumeric($str)? 'yes':'no';

?>
