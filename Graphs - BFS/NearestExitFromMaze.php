<?php

class Solution {


    function nearestExit($maze, $entrance) {
        $rows = count($maze);
        $cols = count($maze[0]);
        $directions = [[1, 0], [-1, 0], [0, 1], [0, -1]];
        $queue = [[$entrance[0], $entrance[1], 0]];

        $maze[$entrance[0]][$entrance[1]] = '+';

        while (!empty($queue)) {
            [$x, $y, $steps] = array_shift($queue);

            foreach ($directions as $dir) {
                $nx = $x + $dir[0];
                $ny = $y + $dir[1];

                if ($nx >= 0 && $nx < $rows && $ny >= 0 && $ny < $cols && $maze[$nx][$ny] === '.') {
                    if ($nx === 0 || $ny === 0 || $nx === $rows - 1 || $ny === $cols - 1) {
                        return $steps + 1;
                    }

                    $maze[$nx][$ny] = '+';
                    $queue[] = [$nx, $ny, $steps + 1];
                }
            }
        }

        return -1; // No exit found
    }
}

$solution = new Solution();
echo $solution->nearestExit([["+","+",".","+"],[".",".",".","+"],["+","+","+","."]], [1,2]);
echo "<br>";
echo $solution->nearestExit([["+","+","+"],[".",".","."],["+","+","+"]], [1,0]);
echo "<br>";
echo $solution->nearestExit([[".","+"]], [0,0]);
