<?php

class Solution {
    function largestAltitude($gain){
        $altitude = 0;
        $maxAltitude = 0;

        foreach($gain as $g){
            $altitude +=$g;
            $maxAltitude = max($maxAltitude, $altitude);
        }

        return $maxAltitude;
    }
}
$solution = new Solution();
echo $solution->largestAltitude([-5,1,5,0,-7]);
echo "\n";
echo $solution->largestAltitude([-4,-3,-2,-1,4,3,2]);
