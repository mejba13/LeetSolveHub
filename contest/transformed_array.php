<?php

class Solution {

    function constructTransformedArray($nums) {
        $n = count($nums);
        $result = array_fill(0, $n, 0);

        for ($i = 0; $i < $n; $i++) {
            if($nums[$i] > 0) {
                $newIndex = ($i + $nums[$i]) % $n;
                $result[$i] = $nums[$newIndex];
            } elseif ($nums[$i] < 0) {
                $newIndex = ($i - abs($nums[$i]) + $n ) % $n ;
                if($newIndex < 0){
                    $newIndex += $n;
                }
                $result[$i] = $nums[$newIndex];
            }else {
                $result[$i] = 0;
            }
        }

        return $result;
    }
}

$solution = new Solution();
$result = $solution->constructTransformedArray([3,-2,1,1]);
print_r($result);