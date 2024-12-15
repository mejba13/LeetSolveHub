<?php

class Solution {

    /**
     * @param Integer[][] $events
     * @return Integer
     */
    function buttonWithLongestTime($events) {
        $maxTime = 0;
        $resultButton = -1;

        for($i = 0; $i < count($events); $i++) {
            $currentTime = ($i == 0) ? $events[$i][1] : $events[$i][1] - $events[$i - 1][1];

            if($currentTime > $maxTime || ($currentTime == $maxTime && $events[$i][0] < $resultButton)){
                $maxTime = $currentTime;
                $resultButton = $events[$i][0];
            }
        }

        return $resultButton;
    }
}

$solution = new Solution();
echo $solution->buttonWithLongestTime([[1,2],[2,5],[3,9],[1,15]]);
echo "<br>";
echo $solution->buttonWithLongestTime([[10,5],[1,7]]);©leetcode