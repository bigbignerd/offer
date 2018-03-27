<?php
//将数组中所有的0移到末尾，并且保持非零元素的相对位置保持不变
//思路：取出所有非零元素放到数组中，然后重新放回原数组，并且将剩余的位置置为0

//时间：O(n) 空间：O(n)
function moveZerosV1(&$arr)
{
    if(empty($arr)){
        return false;
    }

    //取非零元素
    $nonZeros = [];
    foreach($arr as $k => $v){
        if($v !== 0)
            array_push($nonZeros, $v);
    }
    //返回非零元素
    for($i=0; $i<count($nonZeros); $i++){
        $arr[$i] = $nonZeros[$i];
    }
    //插入0元素
    for($i=count($nonZeros); $i<count($arr); $i++){
        $arr[$i] = 0;
    }
}

//v2版本进行空间优化。使用两个索引k指向当前要放置非0元素的位置，i指向当前遍历到的元素的位置
function moveZeroV2(&$arr)
{
    if(empty($arr)){
        return false;
    }
    $k = 0;//放置非0元素的索引位置
    for($i=0; $i<count($arr); $i++){
        if($arr[$i] !== 0){
            $arr[$k++] = $arr[$i]; 
        }
    }

    for($j=$k; $j<count($arr); $j++){
        $arr[$j] = 0;
    }
}

//v3版本 通过交换值来避免最后的循环附0

function moveZeroV3(&$arr)
{
    if(empty($arr)){
        return false;
    }
    $k = 0; //非零元素位置
    for($i=0; $i<count($arr); $i++){
        if($arr[$i] !== 0 && $i !== $k){
            $temp = $arr[$k];
            $arr[$k++] = $arr[$i];
            $arr[$i] = $temp;
        }else{
            $k++;
        }
    }
}

//test

$arr = [1,0,2,4,10,0];
moveZerosV1($arr);
print_r($arr);
$arr2 = [1,0,2,4,10,0];
moveZeroV2($arr2);
print_r($arr2);
$arr3 = [1,0,2,4,10,20];
$arr3 = [2,3,4,5,5];
moveZeroV3($arr3);
print_r($arr3);








?>
