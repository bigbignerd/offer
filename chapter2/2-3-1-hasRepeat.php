<?php
/**
 * 判断长度为n的数组中，范围在0到n-1，找出任意重复元素
 */
function hasRepeat($arr)
{
	if(empty($arr)){
		return false;
	}
	$len = count($arr);
	foreach ($arr as $k => $v){
		if($v >= $len){
			return false;
		}
	}
	for($i=0; $i<$len; $i++){
		while($arr[$i] != $i){
			if($arr[$arr[$i]] == $arr[$i]){
				return $arr[$i];
			}
			$temp = $arr[$arr[$i]];
			$arr[$arr[$i]] = $arr[$i];
			$arr[$i] = $temp;
		}
	}
	return false;
}

$arr = [2,3,1,0,4,5,6];
$hasRepeat = hasRepeat($arr);
echo $hasRepeat;


?>