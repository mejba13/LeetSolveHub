<?php

class Solution {

    function canVisitAllRooms($rooms) {
        $visited = [];
        $this->dfs(0, $rooms, $visited);
        return count($visited) === count($rooms);
    }

    private function dfs($room, $rooms, &$visited) {
        if (isset($visited[$room])) {
            return;
        }

        $visited[$room] = true;

        foreach ($rooms[$room] as $key) {
            $this->dfs($key, $rooms, $visited);
        }
    }
}