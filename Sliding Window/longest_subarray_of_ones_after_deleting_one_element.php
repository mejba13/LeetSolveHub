<?php

class Solution {

    function longestSubarray($nums)
    {

        $left = 0;
        $zeroCount = 0;
        $maxlength = 0;

        for($right = 0; $right < count($nums); $right++){
            if($nums[$right] == 0){
                $zeroCount++;
            }
            while($zeroCount > 1){
                if($nums[$left] == 0){
                    $zeroCount--;
                }
                $left++;
            }
            $maxlength = max($maxlength,$right - $left);
        }

        return $maxlength;
    }
}

$solution = new Solution();
echo $solution->longestSubarray([1,1,0,1]);
echo "\n";
echo $solution->longestSubarray([0,1,1,1,0,1,1,0,1]);
echo "\n";
echo $solution->longestSubarray([1,1,1]);