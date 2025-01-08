<?php

class Solution {

    function eraseOverlapIntervals($intervals) {

        usort($intervals, function($a, $b) {
            return $a[1] <=> $b[1];
        });

        $nonOverlappingCount = 0;
        $prevEnd = PHP_INT_MIN;

        foreach ($intervals as $interval) {
            if ($interval[0] >= $prevEnd) {
                $prevEnd = $interval[1];
                $nonOverlappingCount++;
            }
        }

        return count($intervals) - $nonOverlappingCount;
    }
}

$solution = new Solution();
echo $solution->eraseOverlapIntervals([[1,2], [2,3], [3,4], [1,3]]);
echo "<br>";
echo $solution->eraseOverlapIntervals([[1,2],[1,2],[1,2]]);
echo "<br>";
echo $solution->eraseOverlapIntervals([[1,2],[2,3]]);

