<?php
class Solution {
    function  longestOnes($nums, $k)
    {
        $left = 0;
        $zeroCount = 0;
        $maxlength = 0;

        for ($right = 0; $right < count($nums); $right++) {
            if ($nums[$right] == 0 ) {
                $zeroCount++;
            }
            while ($zeroCount > $k) {
                if($nums[$left] == 0){
                    $zeroCount--;
                }
                $left++;
            }
            $maxlength = max($maxlength, $right - $left + 1);
        }

        return $maxlength;
    }
}

$solution = new Solution();
echo $solution->longestOnes([1,1,1,0,0,0,1,1,1,1,0],2);
echo "<br>";
echo $solution->longestOnes([0,0,1,1,1,0,0,1,1,1,1],3);