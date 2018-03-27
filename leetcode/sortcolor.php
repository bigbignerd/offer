<?php
//计数排序
//跟定数组，有n个元素，其中之存储0，1，2这三个值，排序使得数组有序
//思路一：直接暴力排序，最快O(nlogn)
//思路二：利用给定的条件，计算各个值的个数，再分别赋值，时间复杂度O(n)
//思路三：使用三路快排


function sortColor($arr)
{
    if(empty($arr)){
        return false;
    }
    
    $count = ['0'=>0, '1'=>0, '2'=>0];

    for($i=0; $i<count($arr); $i++){
        if($arr[$i] < 0 || $arr[$i]>2){
            exit("arr元素非法");
        }
        $count[$arr[$i]]++;    
    }
    $count = array_reverse($count);
    $newArr = [];
    foreach($count as $k => $v){
        while($v > 0){
            array_push($newArr, $k);
            $v--;
        }
    }
    return $newArr;
}
require("../class/util.php");
//三路快排的实现方式：时间O(n) 空间：O(1)
function sortColorV2($arr)
{
    if(empty($arr)) return false;
    $num  = count($arr);
    $zero = -1;//0元素的起始位置
    $two = $num;//存储2元素的最左索引，闭区间
    for($i=0; $i<$two;){
        //判断当前值是否为1
        if($arr[$i] == 1){
            $i++;
        }elseif($arr[$i] == 2){
            $two--;
            Swap($arr[$two], $arr[$i]);
        }elseif($arr[$i] == 0){
            $zero++;
            Swap($arr[$zero], $arr[$i]);
            $i++;
        }else{
            exit("数组元素不合法");
        }
    }
    return $arr;
}
//test
$arr = [2,0,1,1,0,0,2,1,0,2,2];
$newArr = sortColor($arr);
print_r($newArr);
$newArr2 = sortColorV2($arr);
print_r($newArr2);






?>
