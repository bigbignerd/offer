<?php
/**
 * 打印从1到n位的最大值
 */
//整数表示字符串，对字符串每次调用执行递增，直到增加到最大n位
function increment(&$number)
{
	$isReachMax = false;
	$count = strlen($number);
	$takeOver = 0;//代表上一位的进位值
	//从后向前遍历字符串
	for($i=$count-1; $i>=0; $i--){
		$iSum = $number[$i] - '0' + $takeOver;
		//如果是第一位（个位）
		if($i == $count-1){
			$iSum++;//每次向个位加一
		}
		//判断当前位是否已经满10
		if($iSum >= 10){
			//判断i是否已经到达n
			if($i == 0){
				$isReachMax = true;
			}else{
				$takeOver = 1;
				$iSum = $iSum - '10';
				$number[$i] = '0' + $iSum;
			}
		}else{
			$number[$i] = '0' + $iSum;
			break;
		}
	}
	return $isReachMax;
}
function printNumber(&$number)
{
	$count = strlen($number);
	$beginning0 = true;
	for($i=0; $i<$count; $i++){
		if($beginning0 && $number[$i] != '0'){
			$beginning0 = false;
		}
		if(!$beginning0){
			printf("%s",$number[$i]);
		}
	}
	printf("\t");
}

function print1ToMax($n)
{
	if($n < 0){
		return false;
	}
	//初始化一个n+1位的字符串
	$number = '';
	for($i=0; $i<$n; $i++){
		$number .= '0';
	}

	while(!increment($number)){
		printNumber($number);
	}
}

print1ToMax(3);
?>