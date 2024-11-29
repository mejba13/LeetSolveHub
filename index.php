<?php

class Solution {
    function isSubsequence($s, $t)
    {
        $i = 0;
        $j = 0;

        while ($i < strlen($s) && $j < strlen($t)) {
            if($s[$i] == $t[$j]) {
                $i++;
            }
            $j++;
        }

        return $i === strlen($s);
    }
}

$solution = new Solution();
$result = $solution->isSubsequence('fasdf','twewetwtwe');
echo $result?"yes":"no";

