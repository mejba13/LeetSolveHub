<?php

class Solution {

    function minimumOperations($grid) {
        $rows = count($grid);
        $cols = count($grid[0]);
        $operations = 0;

        for($col = 0; $col < $cols; $col++) {
            for($row = 1; $row < $rows; $row++){
                if($grid[$row][$col] <= $grid[$row - 1][$col]) {
                    $neededIncrement = $grid[$row - 1][$col] - $grid[$row][$col] + 1;
                    $operations += $neededIncrement;
                    $grid[$row][$col] += $neededIncrement;
                }
            }
        }

        return $operations;
    }
}

$solution = new Solution();
echo $result1 = $solution->minimumOperations([[3,2],[1,3],[3,4],[0,1]]);
echo "<br>";
echo $result2 = $solution->minimumOperations([[3,2,1],[2,1,0],[1,2,3]]);