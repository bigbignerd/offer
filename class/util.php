<?php

//交换数组元素位置
function Swap(&$a, &$b)
{
	$temp = $a;
	$a = $b;
	$b = $temp;
}

function RandomArr($n, $min, $max)
{
	$data = [];
	for($i=0; $i<$n; $i++){
		$data[] = mt_rand($min, $max);
	}
	return $data;
}
$startTime = '';
function startTime()
{
	global $startTime;
	list($msec, $sec) = explode(" ",microtime());
	$startTime = (float)$msec + (float)$sec;
}
function endTime()
{
	global $startTime;
	list($msec, $sec) = explode(" ",microtime());
	$endTime = (float)$msec + (float)$sec;
	echo '<br />';
	echo '执行了：'.(($endTime - $startTime)*1000).' ms';
	echo '<br />';
}
?>	