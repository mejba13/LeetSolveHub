<?php

class Solution {
    function maxLevelSum($root) {
        if ($root === null) return 0;

        $queue = [$root];
        $level = 1;
        $maxSum = PHP_INT_MIN;
        $resultLevel = 1;

        while (!empty($queue)) {
            $levelSize = count($queue);
            $currentSum = 0;

            for ($i = 0; $i < $levelSize; $i++) {
                $node = array_shift($queue);
                $currentSum += $node->val;

                if ($node->left !== null) {
                    $queue[] = $node->left;
                }
                if ($node->right !== null) {
                    $queue[] = $node->right;
                }
            }

            if ($currentSum > $maxSum) {
                $maxSum = $currentSum;
                $resultLevel = $level;
            }

            $level++;
        }

        return $resultLevel;
    }
}
