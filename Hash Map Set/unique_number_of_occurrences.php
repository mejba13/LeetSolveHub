<?php

class Solution {

    function uniqueOccurrences($arr) {
        $count = array_count_values($arr);
        $occurrences = array_values($count);
        return count($occurrences) === count(array_unique($occurrences));
    }
}

$solution = new Solution();
$result = $solution->uniqueOccurrences([1,2,2,1,1,3]) ? true : false;
print_r($result);
echo "<br>";
$result = $solution->uniqueOccurrences([1,2]) ? true : false;
print_r($result);
echo "<br>";
$result = $solution->uniqueOccurrences([-3,0,1,-3,1,1,1,-3,10,0]) ? true : false;
print_r($result);