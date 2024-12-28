<?php

class Solution {

    function uniquePaths($m, $n) {

        $dp = array_fill(0, $m, array_fill(0, $n, 0));

        for ($i = 0; $i < $m; $i++) {
            $dp[$i][0] = 1;
        }
        for ($j = 0; $j < $n; $j++) {
            $dp[0][$j] = 1;
        }

        for ($i = 1; $i < $m; $i++) {
            for ($j = 1; $j < $n; $j++) {
                $dp[$i][$j] = $dp[$i-1][$j] + $dp[$i][$j-1];
            }
        }

        return $dp[$m-1][$n-1];
    }
}

$solution = new Solution();
$uniquePaths = $solution->uniquePaths(3,7);
echo $uniquePaths;