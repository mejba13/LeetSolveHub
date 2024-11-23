<?php

class Solution {

    function deleteMiddle($head){

        if($head === null || $head->next === null){
            return null;
        }

        $slow = $head;
        $fast = $head;
        $prev = null;

        while($fast !== null && $fast->next != null){
            $prev = $slow;
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        $prev->next = $slow->next;

        return $head;
    }
}

$solution = new Solution();
$solution->deleteMiddle([1,3,4,7,1,2,6]);