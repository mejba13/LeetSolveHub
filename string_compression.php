<?php

class Solution {

    function compress(&$chars)
    {
        $write = 0;
        $i = 0;

        while ($i < count($chars)) {
            $char = $chars[$i];
            $count = 0;

            while($i < count($chars) && $chars[$i] == $char) {
                $i++;
                $count++;
            }

            $chars[$write] = $char;
            $write++;

            if ($count > 1) {
                foreach (str_split((string)$count) as $digit) {
                    $chars[$write] = $digit;
                    $write++;
                }
            }
        }

        return $write;
    }
}

$solution = new Solution();
$chars = ["a", "a", "b", "b", "c", "c", "c"];
echo $newLength = $solution->compress($chars);
echo implode('', array_slice($chars, 0, $newLength)) . "\n";