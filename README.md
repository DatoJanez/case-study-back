# case-study-back
### Backend application for case study Laravel

#### PHP 7.1 / Laravel 5.5 / GuzzleHttp

If composer and Laravel are installed, it takes few command to create project.

`composer create-project --prefer-dist laravel/laravel`

Require guzzle to project 

`composer require guzzlehttp/guzzle`

`composer global require laravel/installer`


### Cron

We need to create new command 

`php artisan make:command FetchRates`

And implement handle method in `/app/Console/Commands/FetchRates.php` to fetch data and store it.

```php
    $client = new Client();
    $requestFrom = $client->request('GET', 'http://data.fixer.io/api/latest?access_key={key}');
    $responseJson = $requestFrom->getBody()->getContents();
    Cache::store('file')->put('rates', $responseJson, 10);
```

Than add it to `/app/Console/Kernel.php` and set it to run every minute

```php
    $schedule->command('inspire')->everyMinute();
```

And run it 

`php artisan fetch:rates`




### API Route

Single responce for `/routes/api.php` request, first it checks cache and if empty fetches new data 

```php
    $responseJson = Cache::store('file')->get('rates');
    if(!$responseJson) {
        $client = new Client();
        $requestFrom = $client->request('GET', 'http://data.fixer.io/api/latest?access_key={key}');
        $responseJson = $requestFrom->getBody()->getContents();
    }
    return response($responseJson, 200)->header('Content-Type', 'application/json');
```

