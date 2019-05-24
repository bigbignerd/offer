<?php
/**
 * 给定一个正整数n，要求找出最小数量的完全平方数，使得它们的和等于n
 * 注：了解四平方和定理？？
 */
class PerfectSquare
{
    private  $mem = [];

    //递归解法
    public function getSquare($n)
    {
        if ($n == 0) {
            return 0;
        }
        if (isset($this->mem[$n])) {
            return $this->mem[$n];
        }
        $i = 1;
        $minCount = $n;
        while (pow($i, 2) <= $n) {
            $leftNum = $n - pow($i, 2);
            $minCount = min($minCount, $this->getSquare($leftNum)+1);
            $i++;
        }
        $this->mem[$n] = $minCount;
        return $minCount;
    }
}

//test
$testN = [3, 5, 6, 10, 11];
$p = new PerfectSquare();
foreach ($testN as $n) {
    echo $p->getSquare($n) . PHP_EOL;
}
    




?>
