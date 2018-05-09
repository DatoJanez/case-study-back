# case-study-back
### Backend application for case study Laravel
---

#### PHP 7.1
#### Laravel 5.5
#### GuzzleHttp


If composer and Laravel are installed, it takes few command to create project.

`composer create-project --prefer-dist laravel/laravel`

Require guzzle to project 

`composer require guzzlehttp/guzzle`
`composer global require laravel/installer`

to create new job 

php artisan make:command FetchRates

implemented handle method to fetch data
```php
    $client = new Client();
    $requestFrom = $client->request('GET', 'http://data.fixer.io/api/latest?access_key={key}');
    $responseJson = $requestFrom->getBody()->getContents();
    Cache::store('file')->put('rates', $responseJson, 10);
```

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


