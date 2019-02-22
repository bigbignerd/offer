<?php
/*
 * 田忌赛马
 */

class Match
{
    /**
     * 秦王的马跑的时间
     */
    public $qinHourseTime = [
        'q1' => 1.0,
        'q2' => 2.0,
        'q3' => 3.0,
    ];    
    /**
     * 田忌的马跑的时间
     */
    public $tianHorseTime = [
        't1' => 1.5,
        't2' => 2.5,
        't3' => 3.5,
    ]; 
    /* 秦王的马 */
    public $qinHorse = ['q1', 'q2', 'q3'];

    public function play(array $horses, array $result)
    {
        if (count($horses) == 0) {
            //compare    
            $this->compare($result);
            return;
        }    
        foreach ($horses as $k => $v) {
            $newRes = $result;
            $rest = $horses;

            array_push($newRes, $v);    
            unset($rest[$k]);

            $rest = array_values($rest);
            $newRes = array_values($newRes);

            $this->play($rest, $newRes);
        }
    }
    public function compare(array $horses)
    {
        $winCnt = 0;
        $total = count($horses);
        for ($i = 0; $i < $total; $i++) {
            echo "田:" . $horses[$i]. " vs 秦:" . $this->qinHorse[$i] . PHP_EOL;
            if ($this->tianHorseTime[$horses[$i]] < $this->qinHourseTime[$this->qinHorse[$i]]) {
                $winCnt++;    
            }    
        }
        if ($winCnt > ($total / 2)) {
            echo '田win' . PHP_EOL;    
        } else {
            echo '秦win' . PHP_EOL;    
        }
        echo PHP_EOL;
    }
}

//test 
$match = new Match();
$match->play(['t1', 't2', 't3'], []);



