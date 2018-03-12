<?php
/**
 * 二维有序数组中判断是否包含某个元素
 */
function arraySearch($arr, $rows, $cols, $el)
{
	$found = false;
	if($rows <= 0 || $cols <= 0 || empty($arr)){
		return false;
	}
	$row = 0;
	$col = $cols - 1;
	while($row < $rows && $col >= 0){
		//判断右上角元素和el的大小 从而去掉一行或者一列
		if($arr[$row][$col] > $el){
			$col--;
		}elseif($arr[$row][$col] < $el){
			$row++;
		}else{
			$found = true;
			break;
		}
	}
	return $found;
}
$arr = [
	[1,2,5,9],
	[2,4,9,12],
	[4,7,10,13],
	[6,8,11,15]
];
echo array_search(7, $arr);
?>