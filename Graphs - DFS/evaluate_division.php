<?php

class Solution {

    function calcEquation($equations, $values, $queries) {
        $graph = [];

        for ($i = 0; $i < count($equations); $i++) {
            $u = $equations[$i][0];
            $v = $equations[$i][1];
            $graph[$u][$v] = $values[$i];
            $graph[$v][$u] = 1 / $values[$i];
        }

        $results = [];

        foreach ($queries as $query) {
            [$start, $end] = $query;
            if (!isset($graph[$start]) || !isset($graph[$end])) {
                $results[] = -1.0;
                continue;
            }
            $visited = [];
            $results[] = $this->dfs($graph, $start, $end, 1.0, $visited);
        }

        return $results;
    }

    private function dfs($graph, $current, $target, $product, &$visited) {
        if ($current === $target) return $product;

        $visited[$current] = true;
        foreach ($graph[$current] as $neighbor => $value) {
            if (!isset($visited[$neighbor])) {
                $result = $this->dfs($graph, $neighbor, $target, $product * $value, $visited);
                if ($result !== -1.0) return $result;
            }
        }

        return -1.0;
    }
}
