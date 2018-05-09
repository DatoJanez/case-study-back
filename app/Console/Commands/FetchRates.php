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
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();
        $request = $client->get('example.com');
        $response = $request->getBody()->getContents();
        Cache::store('file')->put('rates', $response, 10);
        // $value = Cache::store('file')->get('rates');
        // return dd($value);

        // $this->info('asdasd');
    }   
}
