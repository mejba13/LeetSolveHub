<?php

class Solution {

    function reverseList($head) {

        $prev = null;
        $curr = $head;

        while ($curr != null) {
            $next = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $next;
        }

        return $prev;
    }
}

$solution = new Solution();