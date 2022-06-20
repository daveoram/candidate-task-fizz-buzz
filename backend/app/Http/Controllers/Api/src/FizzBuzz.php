<?php

namespace App\Http\Controllers\Api\src;

use LogicException;

class FizzBuzz
{
    public function calculate(int $start, int $end): array
    {
        $multiA = 3;
        $multiB = 5;

        for ($i=$start; $i <= $end; $i++) {
            $result = "";
            if ( $i % $multiA === 0 ) { $result .= "Fizz"; }
            if ( $i % $multiB === 0 ) { $result .= "Buzz"; }
            if ( $result === "" ) { $result = "-"; }
            $fbArray[] = $result = array("number"=>$i, "result"=>$result);
        }  // End - for loop

        return $fbArray;
    }  // End - function calculate.
    
}  // End  - class FizzBuzz