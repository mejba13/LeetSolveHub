<?php

class StockSpanner {
    private $stack;

    function __construct() {
        $this->stack = [];
    }

    function next($price) {
        $span = 1;

        while (!empty($this->stack) && $this->stack[count($this->stack) - 1][0] <= $price) {
            $span += array_pop($this->stack)[1];
        }

        $this->stack[] = [$price, $span];

        return $span;
    }
}

$stockSpanner = new StockSpanner();
echo $stockSpanner->next(100) . "\n";
echo $stockSpanner->next(80) . "\n";
echo $stockSpanner->next(60) . "\n";
echo $stockSpanner->next(70) . "\n";
echo $stockSpanner->next(60) . "\n";
echo $stockSpanner->next(75) . "\n";
echo $stockSpanner->next(85) . "\n";
