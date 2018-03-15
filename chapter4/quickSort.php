<?php
/**
 * 快速排序算法实现
 */
function SortArr($arr)
{
	if(empty($arr)){
		return false;
	}
	quickSort($arr, 0, count($arr)-1);
	return $arr;
}

function quickSort(&$arr, $left, $right)
{
	if($left >= $right){
		return false;
	}
	$position = partition($arr, $left, $right);
	partition($arr, $left, $position-1);
	partition($arr, $position+1, $right);
}
function partition(&$arr, $left, $right)
{
	$mark = $left;
	$value = $arr[$left];
	for($i=$left+1; $i<=$right; $i++){
		if($arr[$i] < $value){
			swap($arr[$i], $arr[$mark+1]);
			$mark++;
		}
	}
	swap($arr[$mark], $arr[$left]);
	return $mark;
}
function swap(&$a, &$b)
{
	$temp = $a;
	$a = $b;
	$b = $temp;
}

//test

$arr = [3,1,5,1,6,9,23,11];
$sort = SortArr($arr);
print_r($sort);
?>