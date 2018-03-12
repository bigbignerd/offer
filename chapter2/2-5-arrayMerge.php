<?php
/**
 * 不开辟额外的空间,合并有序数组
 * 实现的有点拙劣
 */
function mergeOrderedArray($arr1,$arr2)
{
	$len1 = count($arr1);
	$len2 = count($arr2);
	$arr1Index = $len1 - 1;
	$arr2Index = $len2 - 1;

	for($i=$len1+$len2-1; $i >= 0 ; $i--){
		if($arr1[$arr1Index] >= $arr2[$arr2Index]){
			$arr1[$i] = $arr1[$arr1Index];
			$arr1Index--;
		}else{
			$arr1[$i] = $arr2[$arr2Index];
			$arr2Index--;
		}
	}
	return $arr1;
}

$arr1 = [1,2,3,4,5];
$arr2 = [5,7,8,9,10];
var_dump(arrayMergeSort($arr1,$arr2));exit;
?>