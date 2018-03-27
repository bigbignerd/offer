<?php
/**
 * 冒泡排序
 */

function bubbleSort($arr)
{
	$n = count($arr);
	if(empty($arr) || $n <= 1){
		return $arr;
	}
	for($i=0; $i<$n; $i++){
		for($j=0; $j<$n-1; $j++){
			if($arr[$j+1] < $arr[$j]){
				$temp = $arr[$j+1];
				$arr[$j] = $arr[$j+1];
				$arr[$j+1] = $temp;
			}
		}
	}
	return $arr;
}

//test 

require("../class/util.php");
$arr = RandomArr(10,1,20);
$new = bubbleSort($arr);
print_r($new);

?>