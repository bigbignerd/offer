<?php
/**
 * 插入排序
 */
require("../class/util.php");

function insertSort($data)
{
	if(empty($data)){
		return false;
	}
	$n = count($data);
	if($n == 1){
		return $n;
	}
	for($i=1; $i<$n; $i++){
		$curEl = $data[$i];
		for($j=$i; $j>0 && $curEl<$data[$j-1]; $j--){
			$data[$j] = $data[$j-1];
		}
		$data[$j] = $curEl;
	}
	return $data;
}

//test
$data = RandomArr(2000, 1, 20);
$sort = insertSort($data);

print_r($sort);
?>