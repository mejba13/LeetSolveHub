<?php


class Solution {

    function decodeString($s) {
        $stack = [];
        $currentString = "";
        $currentNumber = 0;

        for($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];

            if(is_numeric($char)) {
                $currentNumber = $currentNumber * 10 + intval($char);
            } elseif ($char === '[') {
                array_push($stack, $currentString);
                array_push($stack, $currentNumber);

                $currentString = "";
                $currentNumber = 0;

            } elseif ($char === ']') {
                $previousNumber = array_pop($stack);
                $previousString = array_pop($stack);

                $currentString = $previousString . str_repeat($currentString, $previousNumber);
            } else {
                $currentString .= $char;
            }
        }
        return $currentString;
    }
}

$solution = new Solution();
echo $result = $solution->decodeString("3[a]2[bc]");
echo "<br>";
echo $result = $solution->decodeString("3[a2[c]]");
echo "<br>";
echo $result = $solution->decodeString("2[abc]3[cd]ef");
