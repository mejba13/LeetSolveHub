<?php

class Solution {
    function removeStars($s)
    {
       $stack = [];

       for ($i = 0; $i < strlen($s); $i++) {
           if($s[$i] == '*'){
               array_pop($stack);
           }else {
               $stack[] = $s[$i];
           }
       }
       return implode($stack);
    }
}
$solution = new Solution();
echo $solution->removeStars('leet**cod*e');
echo "<br>";
echo $solution->removeStars('erase*****');