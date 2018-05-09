# case-study-back
Backend application for case study Laravel

PHP 7.1
Laravel 5.6
GuzzleHttp


If composer and Laravel are installed it takes single command to create project  

composer create-project --prefer-dist laravel/laravel .

add guzzle to project 

composer require guzzlehttp/guzzle

to create new job 

php artisan make:command FetchRates

implemented handle method to fetch data

$client = new Client();
$request = $client->get('example.com');
$response = $request->getBody()->getContents();
Cache::store('file')->put('rates', $response, 10);

added it to kernel 

set it to run every minute

and execute 

php artisan DeleteInActiveUsers:deleteusers



API Route



Route::get('/convert', function (Request $request) {
    Cache::store('file')->put('rates', $response, 10);
    $value = Cache::store('file')->get('rates');
    if($value) {
        return dd($value)
    }
    $client = new Client();
    $request = $client->get('example.com');
    $response = $request->getBody()->getContents();
    return dd($response);
});


