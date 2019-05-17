<?php

//交换数组元素位置
function Swap(&$a, &$b)
{
	$temp = $a;
	$a = $b;
	$b = $temp;
}
//返回1-n 的无序数组
function unsortUniqueArr($n)
{
    $data = range(1, $n);
    shuffle($data);
    return $data;
}

//随机混乱的数组
function randomMixArr($n, $min, $max)
{
    $data = RandomArr($n, $min, $max);
    shuffle($data);
    return $data;
}

function RandomArr($n, $min, $max)
{
	$data = [];
	for($i=0; $i<$n; $i++){
		$data[] = mt_rand($min, $max);
	}
	return $data;
}
//partition 操作
function partition(&$arr, $start, $end)
{
    $mark = $start;
    $value = $arr[$start];
    for ($j = $start+1; $j <= $end; $j++) {
        if ($arr[$j] <= $value) {
            Swap($arr[$j], $arr[$mark+1]);
            $mark++;
        }
    }
    Swap($arr[$mark], $arr[$start]);
    return $mark;
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
