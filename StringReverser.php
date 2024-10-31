<?php


class Solution
{
    public function reverseWords($s){

        $trimmedString = trim($s);
        $words = explode(" ", $trimmedString);
        $filteredWords = array_filter($words, fn($words) => $words !== '');
        $reversedWords = array_reverse($filteredWords);
        $result = implode(" ", $reversedWords);

        return $result;
    }
}

$solution = new Solution();
echo $solution->reverseWords("the sky is blue")."<br>";
echo $solution->reverseWords("  hello world  ")."<br>";
echo $solution->reverseWords("a good   example")."<br>";