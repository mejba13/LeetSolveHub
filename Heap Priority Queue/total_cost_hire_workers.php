<?php

class Solution {

    /**
     * @param Integer[] $costs
     * @param Integer $k
     * @param Integer $candidates
     * @return Integer
     */
    function totalCost($costs, $k, $candidates) {
        $totalCost = 0;
        $n = count($costs);
        $frontHeap = new SplPriorityQueue();
        $backHeap = new SplPriorityQueue();

        // Use heaps as min-heaps by inverting priorities
        $frontHeap->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
        $backHeap->setExtractFlags(SplPriorityQueue::EXTR_BOTH);

        $frontIndex = 0;
        $backIndex = $n - 1;

        // Initialize heaps with candidates
        for ($i = 0; $i < $candidates && $frontIndex <= $backIndex; $i++) {
            $frontHeap->insert([$costs[$frontIndex], $frontIndex], -$costs[$frontIndex]);
            $frontIndex++;
        }

        for ($i = 0; $i < $candidates && $backIndex >= $frontIndex; $i++) {
            $backHeap->insert([$costs[$backIndex], $backIndex], -$costs[$backIndex]);
            $backIndex--;
        }

        // Hire workers
        for ($i = 0; $i < $k; $i++) {
            $frontWorker = !$frontHeap->isEmpty() ? $frontHeap->extract() : ['data' => [PHP_INT_MAX, -1]];
            $backWorker = !$backHeap->isEmpty() ? $backHeap->extract() : ['data' => [PHP_INT_MAX, -1]];

            if ($frontWorker['data'][0] < $backWorker['data'][0] ||
                ($frontWorker['data'][0] == $backWorker['data'][0] && $frontWorker['data'][1] < $backWorker['data'][1])) {
                // Choose front worker
                $totalCost += $frontWorker['data'][0];

                // Add the next candidate to the front heap if available
                if ($frontIndex <= $backIndex) {
                    $frontHeap->insert([$costs[$frontIndex], $frontIndex], -$costs[$frontIndex]);
                    $frontIndex++;
                }
            } else {
                // Choose back worker
                $totalCost += $backWorker['data'][0];

                // Add the next candidate to the back heap if available
                if ($backIndex >= $frontIndex) {
                    $backHeap->insert([$costs[$backIndex], $backIndex], -$costs[$backIndex]);
                    $backIndex--;
                }
            }
        }

        return $totalCost;
    }
}

// Example usage
$solution = new Solution();
echo $solution->totalCost([17,12,10,2,7,2,11,20,8], 3, 4) . "\n"; // Output: 11
echo $solution->totalCost([1,2,4,1], 3, 3) . "\n"; // Output: 4
