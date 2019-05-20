<?php
/**
 * 求连续子数组的最大和
 */

function maxSubArray($arr)
{
	if(empty($arr)){
		return false;
	}
	$maxSum = 0;
	$curSum = 0;
    $count = count($arr);
	for ($i=0; $i<$count; $i++) {
		if ($curSum <= 0) {
			$curSum = $arr[$i];
		} else {
			$curSum += $arr[$i];
		}
		if ($curSum > $maxSum) {
			$maxSum = $curSum;
		}
	}
	return $maxSum;
}

//test

$arr = [1,-2,3,10,-4,7,2,-5];
$max = maxSubArray($arr);
echo $max;
?>
