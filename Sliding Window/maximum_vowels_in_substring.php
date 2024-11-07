<?php

class Solution {

    function maxVowels($s, $k)
    {
        $Vowels = ['a','e','i','o','u'];
        $max_vowel = 0;
        $current_vowel = 0;

        for ($i = 0; $i < $k; $i++) {
            if (in_array($s[$i], $Vowels)) {
                $current_vowel++;
            }
        }

        $max_vowel = $current_vowel;

        for ($i = $k ; $i < strlen($s); $i++) {
            if (in_array($s[$i - $k], $Vowels)) {
                $current_vowel--;
            }
            if(in_array($s[$i], $Vowels)){
                $current_vowel++;
            }
            $max_vowel = max ($max_vowel, $current_vowel);
        }

        return $max_vowel;

    }

}

$solution = new Solution();
echo $result = $solution->maxVowels('abciiidef',3);
echo "\n";
echo $result = $solution->maxVowels('aeiou',2);
echo "\n";
echo $result = $solution->maxVowels('leetcode',3);
