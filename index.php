<?php

class Solution {

    function numTilings($n) {
        $mod = 1e9 + 7;

        if ($n == 1) return 1;
        if ($n == 2) return 2;
        if ($n == 3) return 5;

        $dp = [0, 1, 2, 5];

        for ($i = 4; $i <= $n; $i++) {
            $dp[$i] = ($dp[$i - 1] + $dp[$i - 2] + 2 * $dp[$i - 3]) % $mod;
        }

        return $dp[$n];
    }
}

$solution = new Solution();
echo $solution->numTilings(3);
echo "<br>";
echo $solution->numTilings(1);
