<?php
/**
 * 给定正整数数组，求数组中元素按照某一顺序排列所能得到的最小数字
 * 如给定["3", "32", "321"]，最小数字应该为:321323
 * 
 * @note 数学证明？？？
 */

//给数组排个序，按照“从小到大”
function getArrayMinNumber($arr)
{
    if (empty($arr)) {
        return -1;
    }
    usort($arr, "compare");
    echo 'min:';
    foreach($arr as $k => $v) {
        echo $v;
    }
    echo PHP_EOL;
    echo 'max:';
    usort($arr, "compare2");
    foreach($arr as $k => $v) {
        echo $v;
    }
}

//如果ab拼成的数字 < ba 拼成的数字则称a<b,如332>323 所以32 < 3,32应该排在3的前面
function compare($a, $b)
{
    $n1 = $a.$b;
    $n2 = $b.$a;
    return strcmp($n1, $n2);
}

//能组成的最大数
function compare2($a, $b)
{
    $n1 = $a.$b;
    $n2 = $b.$a;
    return -(strcmp($n1, $n2));
}



//test
$arr = ["3", "32", "321"];
getArrayMinNumber($arr);
