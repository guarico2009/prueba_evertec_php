<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dnetix\Redirection\PlacetoPay;

class PlaceToPayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $baseUrl = env('PLACE_TO_PAY_BASE_URL');
      $login = env('PLACE_TO_PAY_LOGIN');
      $key = env('PLACE_TO_PAY_KEY');

      $this->app->singleton('PlacetoPay', function($api) use ($baseUrl, $login, $key) {
        return new PlacetoPay([
            'login' => $login,
            'tranKey' => $key,
            'url' => $baseUrl,
            'rest' => [
              'timeout' => 45, // (optional) 15 by default
              'connect_timeout' => 30, // (optional) 5 by default
            ]
        ]);
      });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
