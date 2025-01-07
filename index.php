<?php
class Solution {

    function suggestedProducts($products, $searchWord) {

        sort($products);

        $results = [];
        $prefix = "";

        for ($i = 0; $i < strlen($searchWord); $i++) {
            $prefix .= $searchWord[$i];
            $suggestions = [];

            foreach ($products as $product) {
                if (strpos($product, $prefix) === 0) {
                    $suggestions[] = $product;
                }
                if (count($suggestions) == 3) {
                    break;
                }
            }

            $results[] = $suggestions;
        }

        return $results;
    }
}

// Example Usage
$solution = new Solution();
$products = ["mobile", "mouse", "moneypot", "monitor", "mousepad"];
$searchWord = "mouse";
$result = $solution->suggestedProducts($products, $searchWord);
echo "<pre>";
print_r($result);
echo "</pre>";

