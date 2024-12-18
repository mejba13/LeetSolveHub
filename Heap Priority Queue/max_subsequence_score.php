<?php

class Solution {

    function maxScore($nums1, $nums2, $k) {

        $n = count($nums1);
        $pairs = [];
        for ($i = 0; $i < $n; $i++) {
            $pairs[] = [$nums2[$i], $nums1[$i]];
        }
        rsort($pairs);
        $heap = new SplMinHeap();
        $currentSum = 0;
        $maxScore = 0;

        foreach ($pairs as [$currentMin, $val]) {
            $heap->insert($val);
            $currentSum += $val;
            if ($heap->count() > $k) {
                $currentSum -= $heap->extract();
            }
            if ($heap->count() == $k) {
                $maxScore = max($maxScore, $currentSum * $currentMin);
            }
        }
        return $maxScore;
    }

}

$solution = new Solution();
echo $solution->maxScore([1,3,3,2],[2,1,3,4], 3);
echo "<br>";
echo $solution->maxScore([4,2,3,1,1],[7,5,10,9,6], 1);