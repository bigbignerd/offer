<?php
/**
 * 对数组中的数字进行重新排序，使得奇数都排在偶数的前面
 */

function reSort(&$arr)
{
	if(empty($arr)){
		return false;
	}
	$start = 0;
	$end = count($arr) - 1;
	
	while($start < $end){
		while($start < $end && ($arr[$start] & 0x1) !==0){
			$start++;
		}
		while($start < $end && ($arr[$end] & 0x1) == 0){
			$end--;
		}
		if($start < $end){
			$temp = $arr[$start];
			$arr[$start] = $arr[$end];
			$arr[$end] = $temp;
		}
	}
	return $arr;
}


//test
$arr = [1,2,3,4,5];
$arr = [1,1,1,1,1];

print_r(reSort($arr));

?>