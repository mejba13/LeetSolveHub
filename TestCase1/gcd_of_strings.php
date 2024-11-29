<?php

class Solution {
    function gcdOfStrings($str1, $str2)
    {
        if($str1.$str2 != $str2.$str1 ) {
            return "";
        }

        $gcdLength = $this->gcd(strlen($str1), strlen($str2));

        return substr($str1, 0, $gcdLength );
    }

    private function gcd($a, $b){   //6,3 t divides s
        return $b === 0 ? $a : $this->gcd($b,$a % $b);
    }
}

$solution = new Solution();
echo $solution->gcdOfStrings('ABCABC','ABC'); //s , t
