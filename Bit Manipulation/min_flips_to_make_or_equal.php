<?php

class Solution {

    function minFlips($a, $b, $c) {
        $flips = 0;

        while ($a > 0 || $b > 0 || $c > 0) {

            $bitA = $a & 1;
            $bitB = $b & 1;
            $bitC = $c & 1;

            if (($bitA | $bitB) != $bitC) {
                if ($bitC == 0) {
                    $flips += $bitA + $bitB;
                } else {
                    $flips += 1;
                }
            }

            $a >>= 1;
            $b >>= 1;
            $c >>= 1;
        }

        return $flips;
    }
}


$solution = new Solution();
echo $solution->minFlips(2, 6, 5);
echo "<br>";
echo $solution->minFlips(4, 2, 7);
echo "<br>";
echo $solution->minFlips(1, 2, 3);