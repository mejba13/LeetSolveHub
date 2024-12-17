<?php

class Solution {

    function findKthLargest($nums, $k) {
        $minHeap = new SplMinHeap();
        foreach ($nums as $num) {
            $minHeap->insert($num);
            if ($minHeap->count() > $k) {
                $minHeap->extract();
            }
        }
        return $minHeap->top();
    }
}

$solution = new Solution();
echo $solution->findKthLargest([3, 2, 1, 5, 6, 4], 2);
echo "<br>";
echo $solution->findKthLargest([3, 2, 3, 1, 2, 4, 5, 5, 6], 4);
