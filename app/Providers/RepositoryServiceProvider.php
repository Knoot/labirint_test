<?php

namespace App\Providers;

use App\Repositories\ExchangeRates\ExchangeRatesRepository;
use App\Repositories\ExchangeRatesRepositoryContract;
use App\Repositories\Weather\WeatherRepository;
use App\Repositories\WeatherRepositoryContract;
use App\Services\ExchangeRates\ExchangeRatesService;
use App\Services\ExchangeRatesServiceContract;
use App\Services\WeatherServiceContract;
use App\Services\Weather\WeatherService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(WeatherServiceContract::class, WeatherService::class);
        $this->app->singleton(ExchangeRatesServiceContract::class, ExchangeRatesService::class);
        $this->app->singleton(WeatherRepositoryContract::class, WeatherRepository::class);
        $this->app->singleton(ExchangeRatesRepositoryContract::class, ExchangeRatesRepository::class);
    }
}
