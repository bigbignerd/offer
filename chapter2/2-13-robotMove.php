<?php
/**
 * 判断机器人在m x n的矩阵中可以到达的格子数
 */
function getDigitSum($num)
{
	$sum = 0;
	while($num > 0){
		$sum += $num % 10;
		$num /= 10;
	}
	return $sum;
}
function movingCountCore($rows, $cols, $row, $col, $k, &$visited)
{
	$count = 0;

	if($row >= 0 && $row < $rows && $col >= 0 && $col < $cols 
		&& !$visited[$row*$cols+$col] && getDigitSum($row) + getDigitSum($col) < $k){
		$visited[$row*$cols+$col] = true;
		$count = 1 + movingCountCore($rows, $cols, $row, $col-1, $k, $visited) 
				   + movingCountCore($rows, $cols, $row-1, $col, $k, $visited)
				   + movingCountCore($rows, $cols, $col, $row+1, $k, $visited)
				   + movingCountCore($rows, $cols, $col, $row-1, $k, $visited);

	}
	return $count;
}

function movingCount($rows, $cols, $k)
{
	if($rows < 1 || $cols < 1 || $k < 0){
		return false;
	}
	$visited = [];
	$row = $col = 0;
	$count = movingCountCore($rows, $cols, $row, $col, $k, $visited);

	return $count;
}

//test

$rows = $cols = 10;
$k = 18;

echo movingCount($rows, $cols, $k);


?>