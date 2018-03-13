<?php
/**
 * 寻找有序的反转数组中的最小元素值
 */
function minInOrder($arr,$index1,$index2)
{
	$min = $arr[$index1];
	for($i=$index1+1; $i < $index2; $i++){
		if($arr[$i] <= $min){
			$min = $arr[$i];
		}
	}
	return $min;
}
function rotateArray($arr)
{
	if(empty($arr)){
		return false;
	}
	$len = count($arr);
	$index1 = 0;
	$index2 = $len - 1;
	$indexMid = $index1;

	while($arr[$index1] >= $arr[$index2]){
		if($index2 - $index1 == 1){
			$indexMid = $index2;
			break;
		}
		$indexMid = ($index2 + $index1) / 2;

		//1 2 mid相等的情况使用顺序查找
		if($arr[$indexMid] == $arr[$index1] && $arr[$index1] == $arr[$index2]){
			return minInOrder($arr, $index1, $index2);
		}
		if($arr[$indexMid] >= $arr[$index1]){
			$index1 = $indexMid;
		}elseif($arr[$indexMid] <= $arr[$index2]){
			$index2 = $indexMid;
		}
	}
	return $arr[$indexMid];
}
//test

$arr = [3,4,5,1,2];
echo rotateArray($arr);
echo '<br />';

$arr = [1];
echo rotateArray($arr);
echo '<br />';

$arr = [1,1,1,0,1];
echo rotateArray($arr);

$arr = [];
echo '<br />';

echo rotateArray($arr) == null;


?>