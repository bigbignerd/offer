<?php

/**
 * 求给定字符串最长不含重复字符的子串的长度
 */

function maxNoRepeatStringLength($str)
{
    $curLength = $maxLength = 0;
    //store中存储的是某一个字符上一次出现的索引 如a[0]=1 表示a上次出现在1号位置
    $store = [];
    for ($i = 0; $i < strlen($str); $i++) {
        //获取当前字符上一次出现的索引位置
        $preIndex = isset($store[$str[$i]])? $store[$str[$i]] : -1;
        if ($preIndex < 0 || $i - $preIndex > $curLength) {
            $curLength++;
        } else {
            if ($curLength > $maxLength) {
                $maxLength = $curLength;
            }
            $curLength = $i - $preIndex;
        }
        $store[$str[$i]] = $i;
    }
    return ($curLength > $maxLength)? $curLength : $maxLength;
}

//test
$str = 'arabcacfr';
echo maxNoRepeatStringLength($str);
