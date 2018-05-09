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
    $value = Cache::store('file')->get('rates');
    if($value) {
        return dd($value);
    }
    $client = new Client();
    $requestFrom = $client->request('GET', 'http://example.com');
    $response = $requestFrom->getBody()->getContents();
    return dd($response);
});