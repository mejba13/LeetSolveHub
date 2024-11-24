<?php

class Solution {

    function minimumSumSubarray($nums, $l, $r) {
        $n       = count($nums);
        $miniSum = PHP_INT_MAX;
        $found   = false;

        for($lenght = $l; $lenght <= $r; $lenght++ ) {
            $currentSum = 0;

            for ($i = 0; $i < $lenght; $i++) {
                $currentSum += $nums[$i];
            }

            if($currentSum > 0) {
                $miniSum = min($miniSum,  $currentSum);
                $found = true;
            }

            for($i = $lenght; $i < $n; $i++) {
                $currentSum += $nums[$i] - $nums[$i - $lenght];
                if($currentSum > 0) {
                    $miniSum = min($miniSum, $currentSum);
                    $found = true;
                }
            }
        }

        return $found ?  $miniSum : -1;
    }
}

$solution = new Solution();
echo $solution->minimumSumSubarray([3, -2, 1, 4], 2, 3);
echo "<br>";
echo $solution->minimumSumSubarray([-2, 2, -3, 1], 2, 3);
echo "<br>";
echo $solution->minimumSumSubarray([1, 2, 3, 4], 2, 4);