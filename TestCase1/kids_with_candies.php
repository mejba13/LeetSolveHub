<?php

class Solution {

    function KidsWithCandies($candies, $extraCandies) {
        $maxCandies = max($candies);
        $result = [];

        foreach ($candies as $candie) {
            $result[] = ($candie + $extraCandies) >= $maxCandies;
        }
        return $result;
    }
}

$solution = new Solution();

$result1 = $solution->KidsWithCandies([2,3,5,1,3], 3);
print_r($result1);
echo "<br>";

$result2 = $solution->KidsWithCandies([4,2,1,1,2], 1);
print_r($result2);
echo "<br>";

$result3 = $solution->KidsWithCandies([12,1,12], 10);
print_r($result3);
echo "<br>";
