<?php

class Solution {

    function findDifference($num1, $num2)
    {
        $set1 = array_unique($num1);
        $set2 = array_unique($num2);

        $diff1 = array_diff($set1, $set2);
        $diff2 = array_diff($set2, $set1);

        return [array_values($diff1), array_values($diff2)];
    }
}

$solution = new Solution();
$result = $solution->findDifference([1,2,3], [2,4,6]);
print_r($result);
echo "\n";
$result = $solution->findDifference([1,2,3,3], [1,1,2,2]);
print_r($result);