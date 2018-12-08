<?php
/**
 * 1-n整数中1出现的次数
 * 思路：求最高位1出现的次数+除了最高位其他位1出现的次数+按前面的办法求次高位1出现的次数
 *
 * 重点在数字的划分方法：如21345划分为A:1-1345和B:1346-21345
 * 这样就是求B最高位1的个数+其他位1的个数 然后同样的方法求A段
 * example:
 *     99拆成1-9 10-99
 *     10000就不用拆了
 */
function numberOf1Between1AndN($n)
{
    if ($n <= 0) {
        return 0;
    }
    return numberOf1($n);
}

function numberOf1($n)
{
    $n = strval($n);
    $length = strlen($n);
    if ($length <= 0) {
        return 0;
    }
    //取最高位 
    $first = $n[0];
    //$n为0 
    if ($length == 1 && $first == 0) {
        return 0;
    }
    //$n为1 
    if ($length == 1 && $first == 1) {
        return 1;
    }
    //1、求最高位1的个数
    $numberFirstDigit = 0;
    if ($fist > 1) {
        //相当于1w——nw 最高位为1最多有10000-19999 最高位位1 所以数量为0-9999为1w个1
        $numFirstDigit = pow(10, $length-1);
    } else {
        //1w——1w多 这个时候就只有：1w多-1w+1了
        $numFirstDigit = intval(substr($n, 1)) + 1;
    }
    //2、除了最高位外其他位上1的个数
    $otherDigit = $first * ($length-1) * pow(10, $length-2);

    //3、次高位递归查 
    $numRecursive = numberOf1(intval(substr($n, 1)));

    return $numFirstDigit + $otherDigit + $numRecursive;
}

//test 
$testNumber = [
    [
        'number' => 5,
        'expect' => 1,
    ],
    [
        'number' => 10,
        'expect' => 2,
    ],
    [
        'number' => 99,
        'expect' => 20,
    ],
    [
        'number' => 10000,
        'expect' => 4001,
    ]
];
foreach ($testNumber as $k => $v) {
    $numberOf1 = numberOf1Between1AndN($v['number']);
    echo 'number of 1:' . $numberOf1 . PHP_EOL;
    if ($numberOf1 == $v['expect']) {
        echo $v['number']. '中1的个数为 '. $v['expect'] . 'check';
    } else {
        echo 'check fail:'. $v['number'];
    }
    echo PHP_EOL;
}













