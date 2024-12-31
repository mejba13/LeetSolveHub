<?php

class Solution {

    function maxProfit($prices, $fee) {
        $n = count($prices);
        if ($n == 0) return 0;
        $hold = -$prices[0];
        $cash = 0;

        for ($i = 1; $i < $n; $i++) {
            $cash = max($cash, $hold + $prices[$i] - $fee);
            $hold = max($hold, $cash - $prices[$i]);
        }

        return $cash; // Final profit when not holding a stock
    }
}

$solution = new Solution();
$prices = [1, 3, 2, 8, 4, 9];
$fee = 2;
echo $solution->maxProfit($prices, $fee);
