<?php

class Solution {

    function singleNumber($nums)
    {
        $result = 0;
        foreach ($nums as $num) {
            $result ^= $num;
        }
        return $result;
    }
}

$solution = new Solution();
$result =  $solution->singleNumber([2,2,1]);
print_r($result);
echo "<br>";
$result2 =  $solution->singleNumber([4,1,2,1,2]);
print_r($result2);
