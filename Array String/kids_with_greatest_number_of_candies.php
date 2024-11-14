<?
class Solution {

    function kidsWithCandies($candies, $extraCandies)
    {
       $maxCandies = max($candies);

       $result = [];

       foreach ($candies as $candy) {
           $result[] = ($candy + $extraCandies) >= $maxCandies;
       }

       return $result;

    }
}

$solution = new Solution();
$result1 = $solution->kidsWithCandies([2,3,5,1,3],3);
print_r($result1);
$result2 = $solution->kidsWithCandies([4,2,1,1,2],1);
print_r($result2);
$result3 = $solution->kidsWithCandies([12,1,12],10);
print_r($result3);


