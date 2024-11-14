<?php

class Solution {

    function increasingTriplet($nums){

        $first = PHP_INT_MAX;
        $second = PHP_INT_MAX;

        foreach ($nums as $num) {

            if ($num <= $first) {
                $first = $num;
            }
            else if ($num <= $second) {
                $second = $num;
            } else {
                return true;
            }
        }

        return false;

    }
}

$solution = new Solution();
echo $solution->increasingTriplet([1,2,3,4,5]) ? "true" : "false";
echo "\n";
echo $solution->increasingTriplet([5, 4, 3, 2, 1]) ? "true" : "false";
echo "\n";
echo $solution->increasingTriplet([2, 1, 5, 0, 4, 6]) ? "true" : "false";
echo "\n";
