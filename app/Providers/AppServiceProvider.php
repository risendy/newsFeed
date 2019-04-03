<?php

namespace App\Providers;

use App\Http\Controllers\Helpers\GuzzleHelperController;
use App\Http\Controllers\DTO\ApiDTO;
use App\Http\Controllers\Services\GruzzleClient;
use GuzzleHttp\Client;
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
        $this->app->bind('App\Http\Controllers\Interfaces\HttpClientInterface', function () {
            return new GruzzleClient(new Client(), $_ENV['NEWS_FEED_APIKEY']);
        });
    }
}
