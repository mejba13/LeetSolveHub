<?php

class Solution {

    function asteroidCollisions($asteroids){

        $stack = [];

        foreach ($asteroids as $asteroid) {
            while (!empty($stack) && $asteroid < 0 && end($stack) > 0) {
                if(abs($asteroid) > end($stack)){
                    array_pop($stack);
                }elseif (abs($asteroid) === end($stack)) {
                    array_pop($stack);
                    $asteroid = 0;
                }else {
                    $asteroid = 0;
                }
            }

            if ($asteroid !== 0) {
                $stack[] = $asteroid;
            }
        }

        return $stack;
    }
}

$solution = new Solution();
$result = $solution->asteroidCollisions([5,10,-5]);
print_r($result);
echo "<br>";
$result1 = $solution->asteroidCollisions([8,-8]);
print_r($result1);
echo "<br>";
$result2 = $solution->asteroidCollisions([10,2,-5]);
print_r($result2);
