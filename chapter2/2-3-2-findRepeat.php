<?php
/**
 * 二分查找判断数组中是否包含重复元素
 */
function countRange($arr,$len,$start,$end)
{
	$count = 0;
	for($i=0; $i<$len; $i++){
		if($arr[$i] >= $start && $arr[$i] <= $end){
			$count++;
		}
	}
	return $count;
}
function findRepeat($arr)
{
	$len = count($arr);
	if(empty($arr) || $len <= 0){
		return false;
	}
	foreach ($arr as $k => $v) {
		if($v < 1 || $v > $n){
			return false;
		}
	}
	$start = 1;
	$end = $len - 1;

	while($start <= $end){
		$middle = (($end - $start) >> 1) + $start;
		//计算start到middle数字在数组中的个数
		$count = countRange($arr,$len,$start,$middle);
		if($end == $start){
			if($count > 1){
				return $start;
			}else{
				break;
			}
		}
		if($count > ($middle - $start + 1)){
			$end = $middle;
		}else{
			$start = $middle + 1;
		}
	}
	return false;
}
$arr = [2,3,5,4,3,2,6,7];
echo findRepeat($arr);

?>