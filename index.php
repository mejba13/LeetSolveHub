<?php

class Solution {
    // Property to hold the input string

    // Method to reverse the words in the string
    public function reverseWords($s) {
        // Trim the input string to remove any leading or trailing spaces
        $trimmedString = trim($s);

        // Split the trimmed string by spaces to get an array of words
        $words = explode(' ', $trimmedString);

        // Filter out any empty elements (caused by multiple spaces)
        $filteredWords = array_filter($words, fn($word) => $word !== '');

        // Reverse the array of words
        $reversedWords = array_reverse($filteredWords);

        // Join the reversed words with a single space
        $result = implode(' ', $reversedWords);

        return $result;
    }
}


$solution = new Solution();
$output = $solution->reverseWords("the sky is blue");
echo $output;

