<?php
/**
 * 超过一半的数字
 */

//解法一：基于partition的操作找到middle元素,对数组做了修改
function moreThanHalfNumber($arr)
{
	if(empty($arr)){
		return false;
	}
	$start = 0;
	$end = count($arr) - 1;
	$middle = $end >> 1;
	//寻找middle索引
	$index = partition($arr, $start, $end);
	while($middle !== $index){
		//如果index < middle 该去右侧寻找middle
		if($index < $middle){
			$start = $index + 1;	
			$index = partition($arr, $start, $end);
		}
		//如果iundex > middle 该去左侧寻找middle
		if($index > $middle){
			$end = $index - 1;
			$index = partition($arr, $start, $end);
		}
	}
	return $arr[$index];
}
function partition(&$arr, $start, $end)
{
	$mark = $start;
	$value = $arr[$start];
	for($j=$start+1; $j<=$end; $j++){
		if($arr[$j] <= $value){
			swap($arr[$mark+1], $arr[$j]);
			$mark++;
		}
	}
	swap($arr[$mark], $arr[$start]);
	return $mark;
}
function swap(&$a, &$b)
{
	$temp = $a;
	$a = $b;
	$b = $temp;
}

//解法二：记录元素数量
function moreThanHalfNumberV2($arr)
{
	if(empty($arr)){
		return false;
	}
	$number = $arr[0];
	$count = 1;
	for($i=1; $i<count($arr); $i++){
	
		if($count == 0){
			$number = $arr[$i];
			$count = 1;
		}elseif($arr[$i] == $number){
			$count++;
		}else{
			$count--;
		}
	}
	return $number;
}
//test
echo 'test method 1:'.'<br />';
$arr = [1,2,3,2,2,2,5,4,2];
$value = moreThanHalfNumber($arr);
echo 'number is:'.$value.'<br />';

echo '<hr>';
echo 'test method2<br/>';
$arr = [1,2,3,2,2,2,5,4,2];
echo moreThanHalfNumberV2($arr);
?>