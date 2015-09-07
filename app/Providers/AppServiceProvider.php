<?php

namespace App\Providers;

use GuzzleHttp\Client;
use App\Services\Analytics;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Analytics::class, function($app) {
            $client = new Client();

            return new Analytics($client, [
                'baseUrl'   => config('analytics.base_url'),
                'apiKey'    => config('analytics.X-API-KEY'),
                'apiSecret' => config('analytics.X-API-SECRET'),
            ]);
        });
    }
}
