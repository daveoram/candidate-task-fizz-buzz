<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\src\FizzBuzz;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Exceptions\GeneralJsonException;

class ApiController extends Controller
{
    protected FizzBuzz $fizzBuzz;


    public function __construct()
    {
        $this->fizzBuzz = new FizzBuzz();
    }


    //  GET Request.
    public function handleGet($start, $end): JsonResponse
    {
        // Validate the data using my custom GeneralJsonException class.
        throw_if(!is_numeric($start), GeneralJsonException::class, 'Starting number must be a number!');
        throw_if(!is_numeric($end), GeneralJsonException::class, 'Ending number must be a number!');
        throw_if(('93' == $start), GeneralJsonException::class, '93 is not allowed so I can test my backend error handling!');
        return response()->json($this->fizzBuzz->calculate($start, $end));
    }


    //  POST Request.
    public function handle(Request $request): JsonResponse
    {
        $request->validate([
         'start' => 'required',
         'end' => 'required',
        ]);

        $start = $request->start;
        $end = $request->end;

        // Validate the data using my custom GeneralJsonException class.
        throw_if(!is_numeric($start), GeneralJsonException::class, 'Starting number must be a number!');
        throw_if(!is_numeric($end), GeneralJsonException::class, 'Ending number must be a number!');
        throw_if(('93' == $start), GeneralJsonException::class, '93 is not allowed so I can test my backend error handling!');        

        return response()->json($this->fizzBuzz->calculate($start, $end));
    }

}  // End - class ApiController.