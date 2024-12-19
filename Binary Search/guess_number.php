<?php

class Solution extends GuessGame {
    function guessNumber($n) {
        $low = 1;
        $high = $n;

        while ($low <= $high) {
            $mid = intval(($low + $high) / 2);
            $result = $this->guess($mid);

            if ($result == 0) {
                return $mid;
            } elseif ($result == -1) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        return -1;
    }
}

