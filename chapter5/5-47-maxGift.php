<?php
/**
 * m x n 棋盘上放礼物，礼物价值大于0，从左上到右下，求所能获得的礼物的最大价值
 */

class Gift
{
    private $data = [];
    private $store = [];

    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * 递归的方式求能获得的礼物的最大值
     */
    public function maxValue($rows, $cols)
    {
        if ($rows-1 == 0 && $cols-1 == 0) {
            return $this->data[0][0];
        }
        if (isset($this->store[$rows-1][$cols-1])) {
            return $this->store[$rows-1][$cols-1];
        }
        $left = $up = 0;
        if ($rows > 0) {
            $left = $this->maxValue($rows-1, $cols);
        }
        if ($cols > 0) {
            $up = $this->maxValue($rows, $cols-1);
        }

        $max = max($left, $up) + $this->data[$rows-1][$cols-1];
        $this->store[$rows-1][$cols-1] = $max;

        return $max;
    }
}

//test
$data = [
    [1, 10, 3, 8],
    [12, 2, 9, 6],
    [5, 7, 4, 11],
    [3, 7, 16, 5]
];
$g = new Gift($data);
echo $g->maxValue(4, 4);




