<?php

class Solution {

    function successfulPairs($spells, $potions, $success) {

        sort($potions);
        $result = [];
        $m = count($potions);

        foreach ($spells as $spell) {
            $minPotion = ceil($success / $spell);
            $left = 0;
            $right = $m - 1;

            while ($left <= $right) {
                $mid = intval(($left + $right) / 2);
                if($potions[$mid] >= $minPotion) {
                    $right = $mid - 1;
                }else {
                    $left = $mid + 1;
                }
            }
            $result[] = $m - $left;
        }

        return $result;
    }
}


$solution = new Solution();
$result = $solution->successfulPairs([5,1,3], [1,2,3,4,5],7);

foreach ($result as $value) {
    echo $value . "<br>";
}
