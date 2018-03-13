<?php
/**
 * 计算乘方
 */

function power($base,$e)
{
	//判断e为负数并且base为0的情况，这种情况0会变成分子，无意义
	if((bccomp($base, 0.0) == 0 || $base == 0) && $e < 0){
		throw new Exception("底数为0，指数为负值，没有意义");
	}
	//如果是负数，则先计算绝对值的情况，再取倒数
	$absE = $e;
	if($e < 0){
		$absE = -$e;
	}
	$result = calculateV2($base, $absE);
	if($e < 0){
		$result = 1.0 / $result;
	}
	return $result;
}
function calculate($base, $e)
{
	$result = 1.0;
	for($i=1; $i<=$e; $i++){
		$result *= $base;
	}
	return $result;
}

//优化乘方计算
function calculateV2($base, $e)
{
	if($e == 0){
		return 1;
	}
	if($e == 1){
		return $base;
	}
	$result = calculateV2($base, $e>>1);
	$result *= $result;
	//判断奇数还是偶数
	if($e & 0x1 == 1){
		$result *= $base;
	}
	return $result;
}

//test
echo power(2,10);
?>