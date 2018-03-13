<?php
/**
 * 斐波那契数列非递归的解法，时间复杂度O(n)
 */
function fibonacci($n)
{
	$arr = [0,1];
	if($n < 2){
		return $arr[$n];
	}
	$preOne = 1;
	$preTwo = 0;
	$fibN = 0;

	for($i=2;$i<=$n;$i++){
		$fibN = $preOne + $preTwo;
		$preTwo = $preOne;
		$preOne = $fibN;
	}
	return $fibN;
}
echo fibonacci(10);
?>