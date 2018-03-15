<?php
/**
 * 字符全排列
 */

function showPerm($str)
{
	if(empty($str)){
		return false;
	}
	$start = 0;
	$end = strlen($str) - 1;
	perm($str, $start, $end);
}

function perm(&$str, $start, $end)
{
	if($start == $end){
		printf("%s\n", $str);
	}
	//start 从0到end 第一位会跟后面的每一个字符进行交换
	for($i=$start; $i<=$end; $i++){
		swap($str, $start, $i);
		perm($str, $start+1, $end);
		//把上面交换过的字符再归位
		swap($str,$start, $i);
	}
}
function swap(&$str,$a, $b)
{
	$temp = $str[$a];
	$str[$a] = $str[$b];
	$str[$b] = $temp;
}

//test
$str = 'abcd';
showPerm($str);
?>