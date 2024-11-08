<?php

class Solution {

    function subSequence($a,$b)
    {
        $c = 0;
        $d = 0;

        while ($c < strlen($a) && $d < strlen($b)) {
            if ($a[$c] == $b[$d]) {
                $c++;
            }
            $d++;
        }

        return $c == strlen($a);
    }
}

$solution = new Solution();
echo $solution->subSequence("abc", "abcdefh") ? "ture" : "false";
echo "\n";
echo $solution->subSequence("xyz", "abcekjkd") ? "ture" : "false";