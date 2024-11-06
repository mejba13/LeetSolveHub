<?php
class Solution {

    function findMaxAverage($nums, $k)
    {
        $window_sum = array_sum(array_slice($nums, 0, $k));
        $max_sum = $window_sum;

        for ($i = $k; $i < count($nums); $i++) {
            $window_sum = $window_sum - $nums[$i-$k] + $nums[$i]; //51 42
            $max_sum = max($max_sum, $window_sum);
        }

        return $max_sum / $k;
    }
}

$solution = new Solution();
echo $solution->findMaxAverage([1,12,-5,-6,50,3],4);
echo "\n";
echo $solution->findMaxAverage([5],1);
