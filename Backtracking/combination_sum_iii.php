<?php

class Solution {

    function combinationSum3($k, $n) {

        $result = [];

        $backtrack = function ($start, $remaining, $combination)  use (&$result, &$backtrack, $k) {

            if(count($combination) === $k && $remaining === 0) {
                $result[] = $combination;
            }

            if(count($combination) >= $k || $remaining < 0) {
                return;
            }

            for($i = $start; $i <= 9; $i++) {
                $backtrack($i + 1, $remaining -  $i, array_merge($combination, [$i]));
            }
        };

        $backtrack(1, $n, []);

        return $result;
    }
}

$solution = new Solution();
$result = $solution->combinationSum3(3, 7);
print_r($result);
echo "<br>";
$result1 = $solution->combinationSum3(3, 9);
print_r($result1);
echo "<br>";
$result2 =  $solution->combinationSum3(4, 1);
print_r($result2);
echo "<br>";