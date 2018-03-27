<?php
//给定一个有序数组和整数target，在其中寻找两个元素，使其和为target。返回这两个数的索引

//思路一：暴力解法，双层循环
//思路二：二分查找发（数组有序，就考虑二分查找）
//思路三：对撞指针，使用两个索引i,j分别指向首尾，向中间移动，直到和为target

//思路二实现 时间复杂度O(nlogn)
function twoSum($arr, $target)
{
    if(empty($arr) || empty($target)){
        return false;
    }
   
    for($i=0; $i<count($arr); $i++){
        $targetVal = $target - $arr[$i];
        $index = searchIndex($arr, $i, count($arr)-1, $targetVal); 
        if($index !== false){
            return [$i, $index];
        }
    }
}
function searchIndex(&$arr, $start, $end, $targetVal)
{
    if($start > $end){
        return false;
    }
    $middle = ($end - $start)/2 + $start;
    if($arr[$middle] == $targetVal){
        return $middle;
    }elseif($arr[$middle] < $targetVal){
        return searchIndex($arr, $middle+1, $end, $targetVal);
    }else{
        return searchIndex($arr, $start, $middle-1, $targetVal);
    }
    
}

//对撞指针方式实现 时间复杂度O(n)
function twoSumV2($arr, $target)
{
    if(empty($arr) || empty($target) || count($arr) < 2){
        return false;
    }
    $i = 0;
    $j = count($arr) - 1;
    
    while($i < $j){
        $curSum = $arr[$i] + $arr[$j];
        if($curSum < $target){
            //和小于target，所以只能让i++
            $i++;
        }elseif($curSum > $target){
            $j--;
        }else{
            break;
        }
    }
    return ($arr[$i]+$arr[$j] == $target)? [$i, $j] : false;
}
//test

$arr = [1,2,3,4,5,6,7];
list($i,$j) = twoSum($arr, 7);
var_dump($i,$j);
var_dump(twoSumV2($arr, 6));


?>
