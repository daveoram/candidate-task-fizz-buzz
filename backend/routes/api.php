<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/results/{start}/{end}', 'App\Http\Controllers\Api\ApiController@handleGET');
Route::post('/results', 'App\Http\Controllers\Api\ApiController@handle');
Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. Invalid url.'], 404);
});
