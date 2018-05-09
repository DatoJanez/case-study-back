<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/convert', function (Request $request) {
    $responseJson = Cache::store('file')->get('rates'); 
    if(!$responseJson) {
        $client = new Client();
        $requestFrom = $client->request('GET', 'http://data.fixer.io/api/latest?access_key=8d981abfaca9f2e4162521b9ecf540db');
        $responseJson = $requestFrom->getBody()->getContents();
    }
    
    return response($responseJson, 200)->header('Content-Type', 'application/json');
});