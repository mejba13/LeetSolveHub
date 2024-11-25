<?php

class Solution {

    function oddEvenList($head) {

        if($head === null || $head->next === null) {
            return $head;
        }

        $odd = $head;
        $event = $head->next;
        $evenHead = $event;

        while($event  != null && $event->next !== null) {
            $odd->next = $odd->next->next;
            $odd = $odd->next;

            $event->next = $event->next->next;
            $event = $event->next;
        }

        $odd->next = $evenHead;
        return $head;
    }
}

$solution = new Solution();
$solution->oddEvenList([1,2,3,4,5]);