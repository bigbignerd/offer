<?php
//给定整形数组和一个数字s，找到数组中最短的一个连续子数组，使得连续子数组的和
//大于等于s

//思路：滑动窗口

function minSubArray($arr, $s)
{
    $i = 0;//子数组左侧
    $j = -1;//子数组右侧,初始窗口为空
    $sum = 0;//子数组和
    $num = count($arr);
    $minSubArrCount = $num+1;//初始设置为数组长度加一
    while($i < $num){
        if($j+1 <= $num && $sum < $s){
            //还没有达到最大值s，窗口向右侧扩展
            $sum += $arr[++$j];
        }else{
            $sum -= $arr[$i++];
        }
        //判断>=的情况，判断当前窗口中元素的数量与minSubArrCount
        if($sum >= $s){
            $minSubArrCount = min($minSubArrCount, $j-$i+1);
        }
    }
    return ($minSubArrCount == $num+1)? false : $minSubArrCount;
}
//test

$arr = [1,2,3,4,5,6];
var_dump(minSubArray($arr, 11));
?>
