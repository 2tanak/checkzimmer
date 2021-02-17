<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use League\Flysystem\Adapter\Local;
use Spatie\Geocoder\Geocoder;
use App\Services\LocaleHelper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Geocoder::class, function() {
            $client = new \GuzzleHttp\Client();
            $geocoder = new Geocoder($client);
            $geocoder->setApiKey(config('geocoder.key'));
            $geocoder->setCountry(config('geocoder.country', 'US'));
            return $geocoder;
        });
        $this->app->singleton('locale', function ($app) {
            return new LocaleHelper;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
