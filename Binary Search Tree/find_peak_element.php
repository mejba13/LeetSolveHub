<?php

class Solution {

    function findPeakElement($nums) {

        $left = 0;
        $right = count($nums) - 1;

        while ($left < $right) {

            $mid = intval(($left + $right) / 2);

            if ($nums[$mid] > $nums[$mid + 1]) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }

        return $left;
    }
}


$solution = new Solution();
echo $result = $solution->findPeakElement([1,2,3,1]);
echo "<br>";
echo $result = $solution->findPeakElement([1,2,1,3,5,6,4]);