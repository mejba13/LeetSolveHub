<?php

class Solution {
    function removeDuplicates(&$nums) {
        $n = count($nums);
        if ($n == 0) return 0;

        $i = 0;

        for ($j = 1; $j < $n; $j++) {
            if ($nums[$j] != $nums[$i]) {
                $i++;
                $nums[$i] = $nums[$j];
            }
        }

        return $i + 1;
    }
}

// Example usage:
$solution = new Solution();
$nums = [1, 1, 2];
$k = $solution->removeDuplicates($nums);

echo "Length of array after removing duplicates: $k\n";
print_r(array_slice($nums, 0, $k));
