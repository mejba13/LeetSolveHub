<?php

class Solution {

    function pairSum($head) {
        $slow = $head;
        $fast = $head;

        while ($fast !== null && $fast->next != null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        $prev = null;

        while ($slow !== null) {
            $nextNode = $slow->next;
            $slow->next = $prev;
            $prev = $slow;
            $slow = $nextNode;
        }

        $maxSum = 0;
        $fast = $head;
        $second = $prev;

        while ($second !== null) {
            $maxSum = max($maxSum, $fast->val + $second->val);
            $fast = $fast->next;
            $second = $second->next;
        }

        return $maxSum;
    }
}

$solution = new Solution();
$result =  $solution->pairSum([5,4,2,1]);
print_r($result);
