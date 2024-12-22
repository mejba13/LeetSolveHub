<?php

class Solution {
    /**
     * @param Integer[] $piles
     * @param Integer $h
     * @return Integer
     */
    function minEatingSpeed($piles, $h) {
        $left = 1;
        $right = max($piles);

        while ($left < $right) {
            $mid = intval(($left + $right) / 2);

            if ($this->canEatAll($piles, $h, $mid)) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }

        return $left;
    }

    private function canEatAll($piles, $h, $k) {
        $hours = 0;

        foreach ($piles as $pile) {
            $hours += ceil($pile / $k);
        }

        return $hours <= $h;
    }
}


$solution = new Solution();
echo $solution->minEatingSpeed([3, 6, 7, 11], 8) . "\n";
echo $solution->minEatingSpeed([30, 11, 23, 4, 20], 5) . "\n";
echo $solution->minEatingSpeed([30, 11, 23, 4, 20], 6) . "\n";
