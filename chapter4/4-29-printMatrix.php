<?php
/**
 * 顺时针打印矩阵
 */
function printMatrix($arr,$rows,$cols)
{
	if(empty($arr) || $rows <=0 || $cols <= 0){
		return false;
	}
	//圈开始
	$start = 0;
	while($cols > 2*$start && $rows > 2*$start){
		printNumber($arr,$rows,$cols,$start);
		$start++;
	}
}
function printNumber($arr,$rows,$cols,$start)
{

	$colsEnd = $cols - 1 - $start;
	$rowsEnd = $rows - 1 - $start;

	//打印从左到右行
	for($i=$start; $i<=$colsEnd; $i++){
		printf("%d\t", $arr[$start][$i]);
	}
	//打印从上到下列
	if($start < $rowsEnd){
		for($i=$start+1; $i<=$rowsEnd;$i++){
			printf("%d\t", $arr[$i][$rowsEnd]);
		}
	}
	//打印从右到左行
	if($start < $rowsEnd && $start < $colsEnd){
		for($i=$colsEnd-1; $i>= $start; $i--){
			printf("%d\t", $arr[$rowsEnd][$i]);
		}
	}
	//打印从下到上列
	if($start < $colsEnd && $start < $rowsEnd-1){
		for($i=$rowsEnd-1;$i>=$start+1;$i--){
			printf("%d\t", $arr[$i][$start]);
		}
	}
}

//test
$arr = [
	[1,3,4,5],
	[6,7,8,9],
	[10,11,12,13],
	[14,15,16,17]
];
printMatrix($arr,4,4);
?>