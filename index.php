<?php

class solution {

    function twoSum($nums, $target)
    {
        $map = [];

        for($i = 0; $i < count($nums); $i++){
           $complement = $target - $nums[$i];

           if(isset($map[$complement])){
               return [$map[$complement],$i];
           }
           $map[$nums[$i]] = $i;
        }

        return null;
    }
}

$solution = new solution();
print_r($solution->twoSum([2,7,11,15],9));

