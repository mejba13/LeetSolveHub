<?php

class Solution {

    function minReorder($n, $connections) {
        $graph = [];
        $visited = array_fill(0, $n, false);
        $reorders = 0;

        foreach ($connections as $connection) {
            $from = $connection[0];
            $to = $connection[1];

            $graph[$from][] = [$to, true];
            $graph[$to][] = [$from, false];
        }

        $dfs = function($node) use (&$dfs, &$graph, &$visited, &$reorders) {
            $visited[$node] = true;

            foreach ($graph[$node] as [$neighbor, $isOutward]) {
                if (!$visited[$neighbor]) {
                    if ($isOutward) {
                        $reorders++;
                    }
                    $dfs($neighbor);
                }
            }
        };

        $dfs(0);

        return $reorders;
    }
}
