<?php

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
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
    $client = new Client();
    $request = $client->get('example.com');
    $response = $request->getBody()->getContents();
    Cache::store('file')->put('rates', $response, 10);
    $value = Cache::store('file')->get('rates');
    return dd($value);
});