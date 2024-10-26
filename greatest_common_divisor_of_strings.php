<?php

class Solution {

    function gcdOfStrings($str1, $str2) {
        // Check if str1 and str2 have a common divisor
        if ($str1 . $str2 !== $str2 . $str1) {
            return "";
        }

        // Calculate the GCD of the lengths of str1 and str2
        $gcdLength = $this->gcd(strlen($str1), strlen($str2));

        // Return the substring of str1 from 0 to gcd length
        return substr($str1, 0, $gcdLength);
    }

    private function gcd($a, $b) {
        return $b == 0 ? $a : $this->gcd($b, $a % $b);
    }
}

// Example usage:
$solution = new Solution();
echo $solution->gcdOfStrings("ABCABC", "ABC")."<br>";  // Output: "ABC"
echo $solution->gcdOfStrings("ABABAB", "ABAB")."<br>"; // Output: "AB"
echo $solution->gcdOfStrings("LEET", "CODE")."<br>";   // Output: ""
