<?php
/**
 * 给定序列数字0123...，求任意第n位对应的数字
 */

function digitAtIndex($index)
{
    if ($index < 0) {
        return -1;
    }
    //从个位开始计算
    $digit = 1;
    while (1) {
        $digitCount = digitCount($digit);
        //先锁定大的范围，在几位数中，再具体锁定
        if ($index < ($digitCount*$digit)) {
            return getIndexNum($index, $digit);
        }
        $index -= $digit * $digitCount;
        $digit++;
    }
    return -1;
}

//返回相应位数数字的总个数，比如digit=1，为0-9，digit=2 为10-99
function digitCount($digit)
{
    return ($digit == 1)? 10 : (9 * (pow(10, $digit - 1)));
}

//精细定位
function getIndexNum($index, $digit)
{
    //判断index是digit位数中的第几个，如inxex=811，digit=3，811=270*3+1，
    $number = $index / $digit + beginNumber($digit);
    $right = $digit - $index % $digit;
    for ($i = 1; $i < $right; $i++) {
        $number /= 10;
    }
    return $number % 10;
}

//指定位数的第一个数字
function beginNumber($digit)
{
    return ($digit == 1)? 0 : pow(10, $digit -1);
}

//test
$index = 15;
echo digitAtIndex($index);







