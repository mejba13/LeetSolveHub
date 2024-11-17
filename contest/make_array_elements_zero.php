<?php

class Solution {

    private $validPaths;

    public function countValidSelections($nums) {

        $this->validPaths = 0;
        $n = count($nums);

        for($i = 0; $i <$n; $i++) {
            $this->backtrack($nums, $i, "left");
            $this->backtrack($nums, $i, "right");
        }

        return $this->validPaths;

    }

    Private function backtrack($nums,$curr,$direction){
        $n = count($nums);

        if($curr < 0  || $curr >= $n){
            return;
        }

        if ($nums[$curr] == 0){
            if(array_sum($nums) == 0){
                $this->validPaths++;
            }
            return;
        }

        $nums[$curr]--;

        if($direction === "left") {
            $this->backtrack($nums, $curr - 1 , "left");
        }else {
            $this->backtrack($nums, $curr + 1 , "right");
        }
    }
}

$solution = new Solution();
echo $solution->countValidSelections([1,0,2,0,3]);
echo "<br>";
echo $solution->countValidSelections([2,3,4,0,4,1,0]);