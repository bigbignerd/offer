<?php

class MaxHeap
{
    /**
     * 存储堆数据
     */
    private $data = [];
    /**
     * 存储堆中元素个数
     */
    private $count = 0;
    /**
     * 堆中插入元素
     */
    public function pushBack($num)
    {
        $this->count++;
        $this->data[$this->count] = $num;
        $this->shiftUp($this->count);
        return true;
    }    
    /**
     * 新的元素插入位置为数组默认，将此元素不断与其父亲节点做比较，直到合适的位置
     */
    private function shiftUp($index)
    {
        //判断index 是否超出元素个数
        if ($index > $this->count) {
            throw new \Exception("Wrong index.");
        }
        //如果当前元素 > 其父节点，则交换
        while ($index > 1 && $this->data[$index] > $this->data[$index/2]) {
            $this->swap($index, $index/2);
            $index /= 2;
        }
        return true;
    }

    /**
     * 取出堆顶元素
     */
    public function popUp()
    {
        if ($this->count <= 0) {
            throw new \Exception("The heap is empty.");
        }
        //取出最大元素
        $max = $this->data[1];

        //交换头尾元素
        $this->data[1] = $this->data[$this->count];
        $this->count--;

        //被交换到头部的节点下移直到直到合适的位置
        $this->shiftDown(1);

        return $max;
    }

    /**
     * 取走堆顶元素要重新堆化
     */
    private function shiftDown($index)
    {
        if ($index < 0 || $index > $this->count) {
            throw new \Exception("Wrong index.");
        }
        while (2*$index <= $this->count) {
            $k = 2 * $index;
            //找出index的两个子节点中较大的那一个的索引
            if ($k + 1 <= $this->count && $this->data[$k] < $this->data[$k+1]) {
                $k += 1;
            }
            //找到了正确的位置
            if ($this->data[$index] >= $this->data[$k]) {
                break;
            }
            //没找到正确位置，交换继续下沉
            $this->swap($k, $index);
            $index = $k;
        }
    }

    /**
     * 获取堆中最大元素
     */
    public function getTop()
    {
        if ($this->count <= 0) {
            throw new \Exception("Empty head.");
        }
        return $this->data[1];
    }

    /**
     * 交换数组两个元素
     */
    private function swap($i, $j) 
    {
        list($this->data[$i], $this->data[$j]) = [$this->data[$j], $this->data[$i]];
    }
}

class MinHeap
{

}
