<?php
/**
 * 求第x个丑数
 * 丑数定义：质因子只包含2、3、5的数字
 */

function getUglyNumber($index)
{
    $ugly = [];
    $ugly[0] = 1;
    $m2Index = $m3Index = $m5Index = 0;
    
    $nextUglyIndex = 1;
    while ($nextUglyIndex < $index) {
        //下一个最小的丑数
        $uglyNumber = min3($ugly[$m2Index] * 2, $ugly[$m3Index] * 3, $ugly[$m5Index] * 5);
        $ugly[$nextUglyIndex] = $uglyNumber;
        //更新索引
        while($ugly[$m2Index]*2 <= $ugly[$nextUglyIndex]) {
            $m2Index++;
        }
        while ($ugly[$m3Index] * 3 <= $ugly[$nextUglyIndex]) {
            $m3Index++;
        }
        while ($ugly[$m5Index] * 5 <= $ugly[$nextUglyIndex]) {
            $m5Index++;
        }
        $nextUglyIndex++;
    }
    return $ugly[$nextUglyIndex-1];
}

function min3($a, $b, $c)
{
    return min(min($a, $b), $c);
}

function isUgly($number)
{
    while ($number % 2 == 0) {
        $number /= 2;
        $number = intval($number);
    }
    while ($number % 3 == 0) {
        $number /= 3;
        $number = intval($number);
    }
    while ($number % 5 == 0) {
        $number /= 5;
        $number = intval($number);
    }
    return ($number == 1)? true : false;
}

//test
$number = getUglyNumber(1500);
echo $number;
echo isUgly($number)? "is ugly" : "not ugly";

