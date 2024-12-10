<?php
class Solution {
    function findCircleNum($isConnected) {
        $n = count($isConnected);
        $visited = array_fill(0, $n, false);
        $provinces = 0;


        $dfs = function ($node) use (&$dfs, &$isConnected, &$visited) {
            $visited[$node] = true;
            for ($neighbor = 0; $neighbor < count($isConnected); $neighbor++) {

                if ($isConnected[$node][$neighbor] == 1 && !$visited[$neighbor]) {
                    $dfs($neighbor);
                }
            }
        };

        for ($i = 0; $i < $n; $i++) {
            if (!$visited[$i]) {
                $provinces++;
                $dfs($i);
            }
        }

        return $provinces;
    }
}
