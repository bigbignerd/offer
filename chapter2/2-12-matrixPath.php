<?php
/**
 * 回溯法 求矩阵中是否包含某字符串
 * 
 * @param  array             $matrix      二维数组矩阵
 * @param  integer           $rows        矩阵行
 * @param  integer           $cols        矩阵列
 * @param  integer           $row         当前行
 * @param  integer           $col         当前列
 * @param  string            $str         搜索的字符串
 * @param  integer           &$pathLength 已经找到的字符串长度索引
 * @param  array             &$visited    已经访问过的节点
 * @return boolean                              
 */
function hasPathCore($matrix, $rows, $cols, $row, $col, $str, &$pathLength, &$visited)
{
	if(strlen($str)-1 == $pathLength){
		return true;
	}
	$hasPath = false;
	//首先找到pathLength所指的第一个字符
	if($row < $rows && $row >= 0 && $col < $cols && $col >= 0 
		&& $str[$pathLength] == $matrix[$row][$col] 
		&& !$visited[$row][$col]){

		$visited[$row][$col] = true;
		//然后向四个方向递归的寻找
		$pathLength++;

		$hasPath = hasPathCore($matrix, $rows, $cols, $row, $col-1, $str, $pathLength, $visited)
				|| hasPathCore($matrix, $rows, $cols, $row-1, $col, $str, $pathLength, $visited)
				|| hasPathCore($matrix, $rows, $cols, $row, $col+1, $str, $pathLength, $visited)
				|| hasPathCore($matrix, $rows, $cols, $row+1, $col, $str, $pathLength, $visited);

		if(!$hasPath){
			$pathLength--;
			$visited[$row][$col] = false;
		}
	}
	//没找到返回false
	return $hasPath;
}

function hasPath($matrix,$rows,$cols,$str)
{
	if(empty($matrix) || empty($str)){
		return false;
	}

	$pathLength = 0;
	$visited = [];//访问过的节点
	for($row=0; $row<$rows; $row++){
		for($col=0; $col<$cols; $col++){
			$visited[$row][$col] = false;
		}
	}

	//尝试从矩阵中的每一个点开始寻找
	for($row=0; $row<$rows; $row++){
		for($col=0; $col<$cols; $col++){
			if(hasPathCore($matrix, $rows, $cols, $row, $col,$str, $pathLength, $visited)){
				return true;
			}
		}
	}
	return false;
}

//test

$matrix = [
	['a','b','t','g'],
	['c','f','c','s'],
	['j','d','e','h']
];
$rows = 3;
$cols = 4;

$str = 'bfce';

echo hasPath($matrix, $rows, $cols, $str) == true;
echo '<br />';

$str2 = 'abtg';
echo hasPath($matrix, $rows, $cols, $str2) == true;
echo '<br />';

$str3 = 'abge';
echo hasPath($matrix, $rows, $cols, $str3) == false;


?>