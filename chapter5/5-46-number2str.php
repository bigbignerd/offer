<?php
/**
 * 数字转换为字符串的所有可能
 */
function numberToString($number)
{
    $number = $number."";
    $length = strlen($number);
    if ($length <= 0) {
        return -1;
    }
    $counts = [];
    //$counts[$i] 表示从第i位开始不同的翻译数目 -> $counts[i] = $counts[i+1] + g(i,i+1)*$counts[i+2]
    $counts[$length-1] = 1;
    //从右侧第二个数字开始
    for ($i=$length-2; $i>=0; $i--) {
        $counts[$i] = $counts[$i+1];
        //判断能否两个字符拼成一个
        if (($two = intval($number[$i].$number[$i+1])) && $two <= 25 && $two >= 10) {
            //最右侧的两个字符可以拼成一个的情况 这个时候i+2超出边界取不到
            if ($i+2 > $length-1) {
                $counts[$i] += 1;
            } else {
                $counts[$i] += $counts[$i+2];
            }
        }
    }
    return $counts[0];
}

//test
$number = 12258;
echo numberToString($number);




