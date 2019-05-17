<?php
require("../class/util.php");
/**
 * 求最小的k个数
 */

//解法一：partition的方式找到索引为k的位置
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
            $start = $index+1;
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

//测试v1 partition
$data = unsortUniqueArr(10);
echo implode(",", $data) . PHP_EOL;
smallestKnumberV1($data, 4);

?>
