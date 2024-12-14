<?php

class Solution {

    function orangesRotting($grid) {

        $rows = count($grid);
        $cols = count($grid[0]);
        $queue = [];
        $fresh = 0;

        for($r = 0; $r < $rows; $r++) {
            for($c = 0; $c < $cols; $c++) {
                if($grid[$r][$c] == "2") {
                    $queue[] = [$r, $c];
                }elseif ($grid[$r][$c] == "1") {
                    $fresh++;
                }
            }
        }

        if($fresh == 0) return 0;

        $minutes = 0;
        $directions = [[1, 0], [-1, 0], [0, 1], [0, -1]];

        while(!empty($queue)) {
            $size = count($queue);
            $hasRotten = false;

            for($i = 0; $i < $size; $i++) {
                [$x, $y] = array_shift($queue);

                foreach($directions as $dir) {
                    $nx = $x + $dir[0];
                    $ny = $y + $dir[1];

                    if ($nx >= 0 && $ny >= 0 && $nx < $rows && $ny < $cols && $grid[$nx][$ny] == 1) {
                        $grid[$nx][$ny] = 2;
                        $queue[] = [$nx, $ny];
                        $fresh--;
                        $hasRotten = true;
                    }
                }
            }

            if($hasRotten) $minutes++;
        }

        return $fresh == 0 ? $minutes : -1;

    }
}

$solution = new Solution();
echo $solution->orangesRotting([[2,1,1],[1,1,0],[0,1,1]]);
echo "<br>";
echo $solution->orangesRotting([[2,1,1],[0,1,1],[1,0,1]]);
echo "<br>";
echo $solution->orangesRotting([[0,2]]);
