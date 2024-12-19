<?php

class Solution {

    function totalCost($costs, $k, $candidates) {
        $totalCost = 0;
        $n = count($costs);
        $frontHeap = new SplMinHeap();
        $backHeap = new SplMinHeap();

        $frontIndex = 0;
        $backIndex = $n - 1;

        for ($i = 0; $i < $candidates && $frontIndex <= $backIndex; $i++) {
            $frontHeap->insert([$costs[$frontIndex], $frontIndex]);
            $frontIndex++;
        }
        for ($i = 0; $i < $candidates && $backIndex >= $frontIndex; $i++) {
            $backHeap->insert([$costs[$backIndex], $backIndex]);
            $backIndex--;
        }

        for ($i = 0; $i < $k; $i++) {
            $frontWorker = $frontHeap->isEmpty() ? [PHP_INT_MAX, -1] : $frontHeap->extract();
            $backWorker = $backHeap->isEmpty() ? [PHP_INT_MAX, -1] : $backHeap->extract();

            if ($frontWorker[0] < $backWorker[0] || ($frontWorker[0] == $backWorker[0] && $frontWorker[1] < $backWorker[1])) {
                $totalCost += $frontWorker[0];

                if ($frontIndex <= $backIndex) {
                    $frontHeap->insert([$costs[$frontIndex], $frontIndex]);
                    $frontIndex++;
                } else {
                    $backHeap->insert($backWorker);
                }
            } else {
                $totalCost += $backWorker[0];
                if ($backIndex >= $frontIndex) {
                    $backHeap->insert([$costs[$backIndex], $backIndex]);
                    $backIndex--;
                } else {
                    $frontHeap->insert($frontWorker);
                }
            }
        }

        return $totalCost;
    }
}

$solution = new Solution();
echo $solution->totalCost([17,12,10,2,7,2,11,20,8], 3, 4);
echo "<br>";
echo $solution->totalCost([1,2,4,1], 3, 3);
