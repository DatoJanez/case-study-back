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

implemented method to fetch data

added it to kernel 

set it to run every minute

and execute 

php artisan DeleteInActiveUsers:deleteusers


