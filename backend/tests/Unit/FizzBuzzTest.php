<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\src\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }


    private FizzBuzz $fizzBuzz;

    public function setUp(): void
    {
        $this->fizzBuzz = new FizzBuzz();
    }

    public function testCalculatesFizzBuzz(): void
    {
        $this->assertEquals([
            [ 'number' => 1, 'result' => '-' ],
            [ 'number' => 2, 'result' => '-' ],
            [ 'number' => 3, 'result' => 'Fizz' ],
            [ 'number' => 4, 'result' => '-' ],
            [ 'number' => 5, 'result' => 'Buzz' ],
            [ 'number' => 6, 'result' => 'Fizz' ],
            [ 'number' => 7, 'result' => '-' ],
            [ 'number' => 8, 'result' => '-' ],
            [ 'number' => 9, 'result' => 'Fizz' ],
            [ 'number' => 10, 'result' => 'Buzz' ],
            [ 'number' => 11, 'result' => '-' ],
            [ 'number' => 12, 'result' => 'Fizz' ],
            [ 'number' => 13, 'result' => '-' ],
            [ 'number' => 14, 'result' => '-' ],
            [ 'number' => 15, 'result' => 'FizzBuzz' ],
        ], $this->fizzBuzz->calculate(1, 15));
    }  // End - function testCalculatesFizzBuzz.

}  // End - class FizzBuzzTest.
