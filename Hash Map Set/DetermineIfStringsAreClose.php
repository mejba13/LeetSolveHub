<?php

class Solution {
    function closeStrings($word1, $word2) {

        if (strlen($word1) != strlen($word2)) {
            return false;
        }

        $count1 = array_count_values(str_split($word1));
        $count2 = array_count_values(str_split($word2));

        if(count(array_diff_key($count1, $count2)) !== 0 || count(array_diff_key($count2, $count1)) !== 0) {
            return false;
        }

        $value1 = array_values($count1);
        $value2 = array_values($count2);

        print_r( sort($value1));
        print_r( sort($value2));

        return $value1 == $value2;
    }
}

$solution = new Solution();
echo $solution->closeStrings('abc', 'bca') ? "true" : "false";
echo "\n";
echo $solution->closeStrings('a', 'aa') ? "true" : "false";
echo "\n";
echo $solution->closeStrings('cabbba', 'abbccc') ? "true" : "false";
