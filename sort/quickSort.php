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
	quickSort($arr, $left, $position-1);
	quickSort($arr, $position+1, $right);
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
//快速排序
function quickSortv2($arr){
	if(count($arr) <= 1){
		return $arr;
	}
	//参照
	$reference = $arr[0];
	$leftArr = $rightArr = [];

	for($i=1; $i<count($arr); $i++){
		if($arr[$i] < $reference){
			$leftArr[] = $arr[$i];
		}else{
			$rightArr[] = $arr[$i];
		}
	}
	$leftArr = quickSortv2($leftArr);
	$rightArr = quickSortv2($rightArr);

	return array_merge($leftArr, [$reference], $rightArr);
}


//test

$arr = [3,1,5,1,6,9,23,11];
$sort = SortArr($arr);
print_r($sort);

// $sort2 = quickSortv2($arr);
// print_r($sort2);

?>