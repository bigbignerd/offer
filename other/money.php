<?php
/**
 * 给定1 2 5 10 四种面额，求获得10元总金额有多少种组合 
 */

class Money 
{
    public $money = [1, 2, 5, 10];
    public $count = 0;

    public function getMoney(int $total, array $current) {
       if ($total == 0) {
           $this->count++;
           $this->printArray($current);           
       } elseif ($total < 0) {
           return 0;    
       } else {
           foreach ($this->money as $k => $v) {
               array_push($current, $v);
               $this->getMoney($total - $v, $current);
           }    
       }  
    }

    public function printArray(array $arr) {
       foreach ($arr as $k => $v) {
           echo $v. " ";    
       }     
       echo PHP_EOL;
    }
}
//test
$money = new Money();
$money->getMoney(10, []);
echo "total:" . $money->count . PHP_EOL;


