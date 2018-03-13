<?php
/**
 * 搜索整数二进制表示中1的个数
 */

//方法一：只适用于正数
function binarySearch1($n)
{
	if($n < 0){
		exit("无法计算负数。");
	}
	$count = 0;
	while($n){
		if($n & 1){
			$count++;
		}
		$n = $n >> 1;
	}
	return $count;
}

//方法二：左移比较位 只试用于
function binarySearch2($n)
{
	$count = 0;
	$flag  = 1;
	while($flag){
		if($n & $flag){
			$count++;
		}
		$flag = $flag << 1;
	}
	return $count;
}

//方法三：更高效，只比较二进制位数次
function binarySearch3($n)
{
	$count = 0;
	if($n < 0){
		if(PHP_INT_SIZE == 4){
			$n = $n & 0x7fffffff;
		}else{
			$n = $n & 0x7fffffffffffffff;
		}
		$count++;
	}
	while($n){
		$count++;
		$n = ($n-1) & $n;
	}
	return $count;
}

//test
echo binarySearch1(12);
echo '<br />';

echo binarySearch2(-12);
echo '<br />';

echo binarySearch3(-12);

?>