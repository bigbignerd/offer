<?php
/**
 * 一个序列是否为另一个序列的弹出序列
 */

function isPopOrder($arr1, $arr2)
{
	$len1 = count($arr1);
	$len2 = count($arr2);
	
	$stack = [];//栈

	if(empty($arr1) || empty($arr2) || $len1 !== $len2){
		exit("序列不合法");
	}
	$isPossible = false;
	$index1 = 0;//入栈序列索引
	$index2 = 0;//弹出序列索引
	while($index2 < $len2){

		while(empty($stack) || end($stack) !== $arr2[$index2]){
			//已经全部入栈
			if($index1 == $len1){
				break;
			}
			//入栈
			array_push($stack, $arr1[$index1]);
			$index1++;
		}
		if(end($stack) !== $arr2[$index2]){
			break;
		}
		//找到了第一个弹出的元素
		array_pop($stack);
		$index2++;
	}

	if(empty($stack) && $index2 == $len2){
		$isPossible = true;
	}
	return $isPossible;
}

//test
$arr1 = [1,2,3,4,5];
$arr2 = [4,5,3,2,1];
$arr2 = [4,3,5,1,2];
if(isPopOrder($arr1,$arr2)){
	echo 'yes';
}else{
	echo 'no';
}

?>