<?php
require("../class/heap.php");

class Median
{
    private $minHeap = null;
    private $maxHeap = null;

    public function __construct()
    {
        $this->minHeap = new MinHeap();
        $this->maxHeap = new MaxHeap();
    }

    public function insert($data)
    {
        //左边的数据用最大堆，右边的数据用最小堆   
        
        //当前数据总数若为偶数，则插入最小堆，否则插入最大堆
        if ((($this->minHeap->getSize() + $this->maxHeap->getSize()) & 1) == 0) {
            //判断当前值是否小于最大堆中的最大值，如果是则应先插入最大堆再取出最大堆中的最大值
            if ($this->maxHeap->getSize() > 0 && $data < $this->maxHeap->getTop()) {
                $this->maxHeap->pushBack($data);
                $data = $this->maxHeap->popUp();
            }
            $this->minHeap->pushBack($data);
        } else {
            //判断当前插入的值是否比最小堆中的最小值还要大
            if ($this->minHeap->getSize() > 0 && $data > $this->minHeap->getTop()) {
                $this->minHeap->pushBack($data);
                $data = $this->minHeap->popUp();
            }
            $this->maxHeap->pushBack($data);
        }
        return true;
    }

    public function getMedian()
    {
        $minSize = $this->minHeap->getSize();
        $maxSize = $this->maxHeap->getSize();
        //如果总数是奇数，那么中位数为最小堆中的堆顶元素
        if ((($minSize + $maxSize) & 1) == 1) {
            return $this->minHeap->getTop();   
        } else {
            return ($this->minHeap->getTop() + $this->maxHeap->getTop()) / 2;
        }
    }
}

$median = new Median();
$testData = range(1,11);
shuffle($testData);
foreach($testData as $data) {
    $median->insert($data);
}

echo 'The midian is:' . $median->getMedian() . PHP_EOL;



