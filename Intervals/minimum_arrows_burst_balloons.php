<?php

class Solution {

    function findMinArrowShots($points) {
        if (empty($points)) {
            return 0;
        }

        usort($points, function($a, $b) {
            return $a[1] <=> $b[1];
        });

        $arrows = 1;
        $currentEnd = $points[0][1];

        foreach ($points as $point) {
            if ($point[0] > $currentEnd) {

                $arrows++;
                $currentEnd = $point[1];
            }
        }

        return $arrows;
    }
}

$solution = new Solution();
$points = [[10,16],[2,8],[1,6],[7,12]];
echo $solution->findMinArrowShots($points);
