<?php
class Solution {

    function maxArea ($height){
        $left = 0;
        $right = count($height) - 1;
        $maxArea = 0;

        while($left < $right){
            $width = $right - $left;
            $currentHeight = min($height[$left], $height[$right]);
            $area = $width * $currentHeight;

            $maxArea = max($maxArea, $area);

            if ($height[$left] < $height[$right]) {
                $left++;
            } else {
                $right--;
            }
        }

        return $maxArea;
    }
}

$solution = new Solution();
echo $solution->maxArea([1,8,6,2,5,4,8,3,7]);