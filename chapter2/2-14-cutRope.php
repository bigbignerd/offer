<?php
/** 
 * 长度为n的绳子剪成m段的最大乘积
 */

//解法一：动态规划
function maxProductSolution1($length)
{
	if($length < 2){
		return 0;
	}
	if($length == 2){
		return 1;
	}
	if($length == 3){
		return 2;
	}
	//长度为i的绳子剪成若干段之后的最大乘积值
	$product = [];
	$product[0] = 0;
	$product[1] = 1;
	$product[2] = 2;
	$product[3] = 3;

	$max = 0;
	for($i=4; $i<=$length; $i++){
		$curMax = 0;
		for($j=1; $j < $i/2; $j++){
			$res = $product[$i-$j] * $product[$j];
			if($res > $curMax){
				$curMax = $res;
			}
		}
		$product[$i] = $curMax;
	}
	return $product[$length];
}


//贪婪算法：前提要证明当n>=5时，尽可能剪出最多的3，剩余长度为4时，剪成2x2
function maxProductSolution2($length)
{
	if($length < 2){
		return 0;
	}
	if($length == 2){
		return 1;
	}
	if($length == 3){
		return 2;
	}
	//一共可以剪出的长度为3的段数
	$timesOf3 = $length / 3;

	//判断剩余的长度是否为4
	if($length - $timesOf3 * 3 == 1){
		$timesOf3 -= 1;
	}
	$timesOf2 = ($length - $timesOf3*3) / 2;
	return (int)pow(3, $timesOf3) * (int)pow(2, $timesOf2);
}

// test 
echo maxProductSolution1(8);
echo '<br />';
echo maxProductSolution2(8);

?>