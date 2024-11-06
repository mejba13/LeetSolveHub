<?php

class Solution {

    function maxOperations($num, $k) {
        $map = [];
        $operations = 0;

        foreach ($num as $num) {
            $complement = $k - $num;

            if (isset($map[$complement]) && $map[$complement] > 0) {
                $operations ++;
                echo $map[$complement]--;

                if($map[$complement] == 0) {
                    unset($map[$complement]);
                }
            } else {
                if(isset($map[$num])) {
                    $map[$num]++;
                } else {
                    $map[$num] = 1;
                }
            }
        }
        return $operations;
    }
}

$solution = new Solution();
echo $solution->maxOperations([1,2,3,4], 5) ."<br>";
//echo $solution->maxOperations([3, 1, 3, 4, 3], 6);
