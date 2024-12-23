<?php

class Solution {

    function letterCombinations($digits) {

        if(empty($digits)) {
            return [];
        }

        $digitToLetters = [
            '2' => ['a', 'b', 'c'],
            '3' => ['d', 'e', 'f'],
            '4' => ['g', 'h', 'i'],
            '5' => ['j', 'k', 'l'],
            '6' => ['m', 'n', 'o'],
            '7' => ['p', 'q', 'r', 's'],
            '8' => ['t', 'u', 'v'],
            '9' => ['w', 'x', 'y', 'z']
        ];

        $result = [];

        $backtrack = function($combination, $nextDigits) use (&$backtrack, &$digitToLetters, &$result) {
            if (empty($nextDigits)) {
                $result[] = $combination;
                return;
            }

            $currentDigit = $nextDigits[0];
            $letters = $digitToLetters[$currentDigit];

            foreach ($letters as $letter) {
                $backtrack($combination . $letter, substr($nextDigits, 1));
            }
        };

        $backtrack("", $digits);

        return $result;

    }
}

$solution = new Solution();
$result =  $solution->letterCombinations("23");
print_r($result);