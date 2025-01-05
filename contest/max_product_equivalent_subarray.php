<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxLength($nums) {
        $n = count($nums);
        $maxLength = 0;

        for($i = 0; $i < $n; $i++) {
            $prod = 1;
            $gcd = $nums[$i];
            $lcm = $nums[$i];

            for($j = $i; $j < $n; $j++) {
                $prod *= $nums[$j];
                $gcd = $this->findGCD($gcd, $nums[$j]);

                $lcm = ($lcm * $nums[$j]) / $this->findGCD($lcm, $nums[$j]);

                if ($prod == $lcm * $gcd) {
                    $maxLength = max($maxLength, $j - $i + 1);
                }
            }
        }
        return $maxLength;
    }

    private function findGCD($a, $b) {
        while ($b !=0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }
}


$solution = new Solution();
echo $solution->maxLength([1,2,1,2,1,1,1]);