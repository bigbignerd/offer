<?php
/**
 * 1、给定字符串，求第一个只出现一次的字符
 * 2、读取字符流，返回当前第一个只出现一次的字符
 */

function firstAppear($str)
{
    $arr = [];
    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        $c = $str[$i];
        if (isset($arr[$c])) {
            $arr[$c] += 1;
        } else {
            $arr[$c] = 1;
        }
    }
    foreach ($arr as $k => $v) {
        if ($v == 1) {
            echo 'first character is:' . $k;
            break;
        }
    }
}

//2
class First
{
    private $str = '';
    private $store = [];
    private $index = 0;
    
    public function insert($c)
    {
        $this->str .= $c;
        if (!isset($this->store[$c])) {
            $this->store[$c] = $this->index;
        } else {
            $this->store[$c] = -1;
        }
        $this->index++;
    }

    public function appear()
    {
        foreach($this->store as $k => $v) {
            if ($v >=0) {
                echo 'current str is:' . $this->str . PHP_EOL;
                echo 'current first appear character is:' . $k;
                echo PHP_EOL;
                break;
            }
        }
    }
}

//test
$str = "abaccdeff";
$str = "google";
//firstAppear($str);

//test2
$f = new First();
$len = strlen($str);
for ($i=0; $i<$len; $i++) {
    $f->insert($str[$i]);
    $f->appear();
}
