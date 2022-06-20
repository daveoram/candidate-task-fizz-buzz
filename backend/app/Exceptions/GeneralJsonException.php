<?php

namespace App\Exceptions;

use Exception;

use Symfony\Component\HttpFoundation\JsonResponse;

class GeneralJsonException extends Exception
{
    //  Set my preferred Response Status Code.
    protected $code = 422;

    /**
    * Report the exception.
    * 
    * @return void
    * 
    */

    public function report() {

        //
    }

    /**
    * Render the exception as an HTTP response.
    * 
    * @param \Illuminate\Http\Request  $request
    */
    public function render($request) {
        return new JsonResponse([[
            'number' => 'error',
            'result' => $this->getMessage(),
        ]], $this->code);
    }
}
