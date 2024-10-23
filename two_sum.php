<?php

class Solution {
    function twoSum($nums, $target) {
        $map = [];

        for ($i = 0; $i < count($nums); $i++) {
            $complement = $target - $nums[$i];

            if (isset($map[$complement])) {
                return [$map[$complement], $i];
            }

            $map[$nums[$i]] = $i;
        }

        return [];
    }
}

$solution = new Solution();
$result = $solution->twoSum([2, 7, 11, 15], 9);
print_r($result);