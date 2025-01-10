<?php

class Solution {
    function DailyTemperatures($temperatures) {
        $n = count($temperatures);
        $answer = array_fill(0, $n, 0);
        $stack = [];

        for ($i = 0; $i < $n; $i++) {
            while (!empty($stack) && $temperatures[$i] > $temperatures[end($stack)]) {
                $preIndex = array_pop($stack);
                $answer[$preIndex] = $i - $preIndex;
            }
            $stack[] = $i;
        }

        return $answer;
    }
}

$solution = new Solution();
$temperatures = [73,74,75,71,69,72,76,73];
$result = $solution->DailyTemperatures($temperatures);
print_r($result);
echo "<br>";

$temperatures1 = [73,74,75,71,69,72,76,73];
$result1 = $solution->DailyTemperatures($temperatures1);
print_r($result1);
echo "<br>";

$temperatures2 = [73,74,75,71,69,72,76,73];
$result2 = $solution->DailyTemperatures($temperatures2);
print_r($result2);
echo "<br>";
