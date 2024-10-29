<?php

class Solution {

    function canPlaceFlowers($flowerbed, $n){
        $lenght = count($flowerbed);

        for($i = 0; $i < $lenght; $i++){
            if($flowerbed[$i] == 0){
                $emptyLeft = ($i == 0) || ($flowerbed[$i - 1] == 0);
                $emptyRight = ($i == $lenght - 1) || ($flowerbed[$i + 1] == 0);

                if ($emptyLeft && $emptyRight) {
                    $flowerbed[$i] = 1;
                    $n--;

                    if($n <= 0) {
                        return true;
                    }
                }
            }
        }

        return $n <= 0;
    }
}

$solution = new Solution();
echo $solution->canPlaceFlowers([1,0,0,0,1],1) ? "true" : "false";
echo "\n";
echo $solution->canPlaceFlowers([1, 0, 0, 0, 0, 0, 1], 2) ? "true" : "false";  // Output: false