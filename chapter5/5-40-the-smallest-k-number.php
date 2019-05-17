<?php
require("../class/util.php");
require("../class/heap.php");
/**
 * 求最小的k个数
 */

//解法一：partition的方式找到索引为k的位置，时间复杂度O(n)?
function smallestKnumberV1($arr, $k)
{
    $total = count($arr);
    if ($total < $k) {
        throw new \Exception("数组数量少于" . $k . "个");
    }
    $start = 0;
    $end = $total - 1;
    $index = partition($arr, $start, $end);
    while ($index != $k-1) {
        if ($index < $k-1) {
            $start = $index + 1;
        } else {
            $end = $index - 1;
        }
        $index = partition($arr, $start, $end);
    }
    //输出最小的k个数
    for ($i = 0; $i <= $index; $i++) {
        echo $arr[$i] . '  ';
    }
}

//解法二：使用k个元素的最大堆 时间复杂度O(nlogk)
function smallestKnumberV2($arr, $k)
{
    $count = 0;
    $maxHeap = new MaxHeap();
    foreach($arr as $v) {
        if ($count < $k) {
            $maxHeap->pushBack($v);
            $count++;
            continue;
        } 
        if($maxHeap->getTop() > $v) {
            $maxHeap->popUp();    
            $maxHeap->pushBack($v);
        }
    }
    //打印堆中元素
    while ($count > 0) {
        echo $maxHeap->popUp();
        $count--;
    }
}

//测试v1 partition
$data = unsortUniqueArr(10);
echo implode(",", $data) . PHP_EOL;
smallestKnumberV1($data, 4);

//v2
smallestKnumberV2($data, 5);

?>
