<?php

class Solution {

    function predictPartyVictory($senate)
    {
        $n = strlen($senate);
        $radiantQueue = [];
        $direQueue = [];

        for ($i = 0; $i < $n; $i++) {
            if($senate[$i] == 'R') {
                $radiantQueue[] = $i;
            } else {
                $direQueue[] = $i;
            }
        }

        while (!empty($radiantQueue) && !empty($direQueue)) {

            $radiantIndex = array_shift($radiantQueue);
            $direIndex = array_shift($direQueue);

            if($radiantIndex < $direIndex) {
                $radiantQueue[] = $radiantIndex + $n;
            }else {
                $direQueue[] = $direIndex + $n;
            }

        }

        return empty($radiantQueue) ? "Dire" : "Radiant";
    }
}


$solution = new Solution();
echo $solution->predictPartyVictory("RD");
echo "<br>";
echo $solution->predictPartyVictory("RDD");