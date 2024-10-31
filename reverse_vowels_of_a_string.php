<?php


class Solution {

    function reverseVowels($s) {

        $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        $sArray = str_split($s);

        $left =0;
        $right = count($sArray)-1;

        while ($left <= $right) {

            while ($left < $right && !in_array($sArray[$left], $vowels)) {
                $left++;
            }

            while ($left < $right && !in_array($sArray[$right], $vowels)) {
                $right--;
            }

            $temp = $sArray[$left];
            $sArray[$left] = $sArray[$right];
            $sArray[$right] = $temp;

            $left++;
            $right--;
        }

        return implode('', $sArray);

    }
}

$solution = new Solution();
echo $solution->reverseVowels('IceCreAm'); //AceCreIm
echo "\n";
echo $solution->reverseVowels('leetcode'); //leotcede
