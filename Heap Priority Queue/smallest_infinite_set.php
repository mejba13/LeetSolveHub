<?php


class SmallestInfiniteSet
{
    private $heap;
    private $set;
    private $next;

    function __construct()
    {
        $this->heap = new SplMinHeap();
        $this->set = [];
        $this->next = 1;
    }
    function popSmallest()
    {
        if (!$this->heap->isEmpty()) {
            $smallest = $this->heap->extract();
            unset($this->set[$smallest]);
            return $smallest;
        }
        return $this->next++;
    }

    function addBack($num)
    {
        if ($num < $this->next && !isset($this->set[$num])) {
            $this->heap->insert($num);
            $this->set[$num] = true;
        }
    }
}
