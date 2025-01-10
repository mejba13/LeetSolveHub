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

        // Min-heaps for both sides
        $frontHeap = new SplPriorityQueue();
        $backHeap = new SplPriorityQueue();
        $frontHeap->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
        $backHeap->setExtractFlags(SplPriorityQueue::EXTR_BOTH);

        $frontIndex = 0;
        $backIndex = $n - 1;

        // Initialize heaps with candidates
        for ($i = 0; $i < $candidates && $frontIndex <= $backIndex; $i++) {
            $frontHeap->insert($frontIndex, -$costs[$frontIndex]);
            $frontIndex++;
        }

        for ($i = 0; $i < $candidates && $backIndex >= $frontIndex; $i++) {
            $backHeap->insert($backIndex, -$costs[$backIndex]);
            $backIndex--;
        }

        // Hire workers
        for ($i = 0; $i < $k; $i++) {
            if (!$frontHeap->isEmpty() && !$backHeap->isEmpty()) {
                $frontWorker = $frontHeap->extract();
                $backWorker = $backHeap->extract();

                if (-$frontWorker['priority'] < -$backWorker['priority'] ||
                    (-$frontWorker['priority'] == -$backWorker['priority'] && $frontWorker['data'] < $backWorker['data'])) {
                    $totalCost += -$frontWorker['priority'];

                    if ($frontIndex <= $backIndex) {
                        $frontHeap->insert($frontIndex, -$costs[$frontIndex]);
                        $frontIndex++;
                    }

                    // Reinsert backWorker since it wasn't used
                    $backHeap->insert($backWorker['data'], $backWorker['priority']);
                } else {
                    $totalCost += -$backWorker['priority'];

                    if ($backIndex >= $frontIndex) {
                        $backHeap->insert($backIndex, -$costs[$backIndex]);
                        $backIndex--;
                    }

                    // Reinsert frontWorker since it wasn't used
                    $frontHeap->insert($frontWorker['data'], $frontWorker['priority']);
                }
            } elseif (!$frontHeap->isEmpty()) {
                $frontWorker = $frontHeap->extract();
                $totalCost += -$frontWorker['priority'];

                if ($frontIndex <= $backIndex) {
                    $frontHeap->insert($frontIndex, -$costs[$frontIndex]);
                    $frontIndex++;
                }
            } elseif (!$backHeap->isEmpty()) {
                $backWorker = $backHeap->extract();
                $totalCost += -$backWorker['priority'];

                if ($backIndex >= $frontIndex) {
                    $backHeap->insert($backIndex, -$costs[$backIndex]);
                    $backIndex--;
                }
            }
        }

        return $totalCost;
    }
}

// Example usage
$solution = new Solution();
echo $solution->totalCost([17, 12, 10, 2, 7, 2, 11, 20, 8], 3, 4); // Output: 11
