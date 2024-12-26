<?php

class Solution {

    function minCostClimbingStairs($cost) {
        $n = count($cost);
        $prev2 = $cost[0];
        $prev1 = $cost[1];

        for ($i = 2; $i < $n; $i++) {
            $current = $cost[$i] + min($prev1, $prev2);
            $prev2 = $prev1;
            $prev1 = $current;
        }

        return min($prev1, $prev2);
    }
}


$solution = new Solution();
echo $result1 = $solution->minCostClimbingStairs([10,15,20]);
echo "<br>";
echo $result2 = $solution->minCostClimbingStairs([1,100,1,1,1,100,1,1,100,1]);