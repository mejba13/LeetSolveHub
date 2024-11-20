<?php


class RecentCounter {

    private $queue;

    public function __construct() {
        $this->queue = [];
    }

    function ping($t)
    {
        array_push($this->queue, $t);

        while ($this->queue[0] < $t - 3000) {
            array_shift($this->queue);
        }

        return count($this->queue);

    }
}

$recentCounter = new RecentCounter();
echo $recentCounter->ping(1). "<br>";
echo $recentCounter->ping(100). "<br>";
echo $recentCounter->ping(3001). "<br>";
echo $recentCounter->ping(3002). "<br>";