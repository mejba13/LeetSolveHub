<?php

class Solution {
    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function minDistance($word1, $word2) {
        $m = strlen($word1);
        $n = strlen($word2);

        // Initialize the DP table
        $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

        // Base cases: transforming empty string to target string
        for ($i = 0; $i <= $m; $i++) {
            $dp[$i][0] = $i; // Cost of deleting all characters in $word1
        }
        for ($j = 0; $j <= $n; $j++) {
            $dp[0][$j] = $j; // Cost of inserting all characters in $word2
        }

        // Fill the DP table
        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                if ($word1[$i - 1] === $word2[$j - 1]) {
                    // Characters match, no operation needed
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                } else {
                    // Minimum of insert, delete, or replace
                    $dp[$i][$j] = min(
                            $dp[$i - 1][$j],   // Delete
                            $dp[$i][$j - 1],   // Insert
                            $dp[$i - 1][$j - 1] // Replace
                        ) + 1;
                }
            }
        }

        return $dp[$m][$n]; // Final answer
    }
}

// Example usage
$solution = new Solution();
$word1 = "horse";
$word2 = "ros";
echo $solution->minDistance($word1, $word2); // Output: 3
