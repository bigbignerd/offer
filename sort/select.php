<?php
/**
 * 选择排序
 */
require("../class/util.php");

function selectSort($data)
{
	if(empty($data)){
		return false;
	}
	$n = count($data);
	for($i=0; $i<$n; $i++){
		$curMin = $i;
		for($j=$i+1; $j<$n; $j++){
			if($data[$j] < $data[$curMin]){
				$curMin = $j;
			}
		}
		Swap($data[$curMin], $data[$i]);
	}
	return $data;
}

//test

$arr = RandomArr(10000, 1,10000);
startTime();
$sort = selectSort($arr);
endTime();
// print_r($sort);

?>