<?php
/**
 * 归并排序
 */

function mergeSort($arr)
{
	if(empty($arr)){
		return false;
	}
	mergeSortCore($arr, 0, count($arr)-1);
	return $arr;
}
function mergeSortCore(&$arr, $left,$right)
{
	if($left >= $right){
		return false;
	}
	$middle = ($left+$right) >> 1;

	mergeSortCore($arr, $left, $middle);
	mergeSortCore($arr, $middle+1, $right);

	if($arr[$middle] > $arr[$middle+1]){
		merge($arr, $left, $middle, $right);		
	}
}
function merge(&$arr, $left, $middle, $right)
{
	$length = $right - $left + 1;
	$aux = array_slice($arr, $left, $length, true);

	$i = $left;//左侧起点
	$j = $middle+1;//右侧起点
	for($k=$left; $k<=$right; $k++){
		if($i > $middle){
			$arr[$k] = $aux[$j];
			$j++;
		}elseif($j > $right){
			$arr[$k] = $aux[$i];
			$i++;
		}elseif($aux[$i] > $aux[$j]){
			$arr[$k] = $aux[$j];
			$j++;
		}else{
			$arr[$k] = $aux[$i];
			$i++;
		}
	}
}
require("../class/util.php");

//迭代的版本比递归的要快的多
function merge_sort($arr) {
	$len = count($arr);
	if($len <= 1)
		return $arr;
	$half = ($len>>1) + ($len & 1);
	$arr2d = array_chunk($arr, $half);
	$left  = merge_sort($arr2d[0]);
	$right = merge_sort($arr2d[1]);
	while (count($left) && count($right)){
		if($left[0] < $right[0]){
			$reg[] = array_shift($left);
		}else{
			$reg[] = array_shift($right);
		}
	}
		
	return array_merge($reg, $left, $right);
}

//test
$arr = RandomArr(10000, 1, 10000);
echo '<br />';
startTime();
$sort = merge_sort($arr);
endTime();

?>