<?php
/**
 * 给定数字n，求其拆成多个数字的和 所能获得的最大乘积
 */

class BreakInteger
{
    private $mem = [];
    /*
     * 递归的方式解决 f(n) = f(n-i) * i
     */
    public function breakIntegerV1($n)
    {
        if ($n == 1) {
            return 1;
        }
        if (isset($this->mem[$n])) {
            return $this->mem[$n];
        }
        $res = -1;
        for ($i = 1; $i <= $n-1; $i++) {
            $res = $this->max3($res, $i*$this->breakIntegerV1($n-$i), $i*($n-$i));
        }
        $this->mem[$n] = $res;
        return $res;
    }
    /**
     * 迭代的方式
     */
    public function breakIntegerV2($n)
    {
        if ($n < 2) {
            return -1;
        }
        //mem[i]表示i分割后能得到的最大乘积
        $mem = array_fill(1, $n, -1);
        $mem[1] = 1;
        for ($i = 2; $i <= $n; $i++) {
            for ($j = 1; $j <= $i-1; $j++) {
                //分割为 j+(i-j)
                $mem[$i] = $this->max3($mem[$i], $j * $mem[$i-$j], $j * ($i-$j));
            }
        }
        return $mem[$n];
    }

    private function max3($a, $b, $c)
    {
        return max($a, max($b, $c));
    }
}



//test v1
$n = 5;
$break = new BreakInteger($n);
echo $break->breakIntegerV2($n);
?>
