<?php

class Solution {

    /**
     * @param String $word1
     * @param String $word2
     * @return String
     */

    function mergeAlternately($word1, $word2){

        $mergeString = '';

        $len1 = strlen($word1);
        $len2 = strlen($word2);
        $i = 0;

        // Merge the string alterbately
        while($i < $len1 || $i < $len2){
            if($i < $len1) {
                $mergeString .= $word1[$i];
            }
            if($i < $len2) {
                $mergeString .= $word2[$i];
            }
            $i++;
        }

        return $mergeString;

    }
}


$mergeAlternately = new Solution();
echo $result = $mergeAlternately->mergeAlternately('abc', 'pqr')."<br>";
echo $result = $mergeAlternately->mergeAlternately('ab', 'pqrs')."<br>";;
echo $result = $mergeAlternately->mergeAlternately('abcd', 'pq')."<br>";;