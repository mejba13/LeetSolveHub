<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function smallestNumber($n) {
        $x = 1;

        while($x < $n) {
            $x = ($x << 1) | 1;
        }

        return $x;
    }
}

$solution = new Solution();
$solution->smallestNumber(5);
echo "<br>";
$solution->smallestNumber(10);
echo "<br>";
$solution->smallestNumber(3);
echo "<br>";