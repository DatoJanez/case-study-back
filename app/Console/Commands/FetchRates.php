<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;

class FetchRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch rates and store';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * Fetches data from API and stores it into cache
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();
        $requestFrom = $client->request('GET', 'http://data.fixer.io/api/latest?access_key=8d981abfaca9f2e4162521b9ecf540db');
        $responseJson = $requestFrom->getBody()->getContents();
        Cache::store('file')->put('rates', $responseJson, 10);
    }   
}
