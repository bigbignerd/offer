<?php
/**
 * 给定字符串，求第一个只出现一次的字符
 */

function firstAppear($str)
{
    $arr = [];
    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        $c = $str[$i];
        if (isset($arr[$c])) {
            $arr[$c] += 1;
        } else {
            $arr[$c] = 1;
        }
    }
    foreach ($arr as $k => $v) {
        if ($v == 1) {
            echo 'first character is:' . $k;
            break;
        }
    }
}

//test
$str = "abaccdeff";
firstAppear($str);
