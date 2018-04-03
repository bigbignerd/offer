<?php
//求一个字符串的最长无重复子串的长度
//思路：滑动窗口

function lengthOfLongestSubArr($str)
{
    if(empty($str)){
        return false;
    }
    $map = [];//记录当前子串中的元素
    $l = 0;//窗口左侧
    $r = -1;//窗口右侧
    $strLen = strlen($str);
    $max = 0;

    while($l < $strLen){
        //如果不在map中窗口继续向右扩展
        if($r+1 < $strLen && empty($map[$str[$r+1]])){
            $map[$str[++$r]]++; 
        }else{
            $map[$str[$l++]]--;
        }
        $max = max($max, $r-$l+1);
    }
    return $max;
}
//test
$str = 'abcdaef';
$str = 'aaaa';

echo lengthOfLongestSubArr($str);





?>
