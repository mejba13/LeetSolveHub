<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        $n = count($nums);
        if ($n == 0) return 0;
        if ($n == 1) return $nums[0];

        $prev1 = 0;
        $prev2 = 0;

        foreach ($nums as $money) {
            $current = max($prev1, $prev2 + $money);
            $prev2 = $prev1;
            $prev1 = $current;
        }

        return $prev1;
    }
}

$solution = new Solution();
echo $solution->rob([1,2,3,1]);
echo "\n";
echo $solution->rob([2,7,9,3,1]);
