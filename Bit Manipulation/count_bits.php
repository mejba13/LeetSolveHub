<?php

class Solution {

    function countBits($n) {
        $dp = array_fill(0, $n + 1, 0);

        for($i = 0; $i <= $n; $i++) {
            $dp[$i] = $dp[$i >> 1] + ($i & 1);
        }

        return $dp;
    }
}

$solution = new Solution();
$result = $solution->countBits(2);
print_r($result);
echo "<br>";
$result1 = $solution->countBits(5);
print_r($result1);