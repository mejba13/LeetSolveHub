<?php

class Solution {

    function pivotIndex($nums){

        $totalSum = array_sum($nums); //28
        $leftSum = 0;

        foreach ($nums as $i => $num) {

            if($leftSum == $totalSum - $leftSum - $num) {
                return $i;
            }
            $leftSum += $num;
        }

        return -1;
    }
}

$solution = new Solution();
echo $solution->pivotIndex([1,7,3,6,5,6]);
echo "\n";
echo $solution->pivotIndex([1,2,3]);
echo "\n";
echo $solution->pivotIndex([2,1,-1]);