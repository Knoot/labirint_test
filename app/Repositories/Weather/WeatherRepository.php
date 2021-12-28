<?php

namespace App\Repositories\Weather;

use App\Repositories\WeatherRepositoryContract;
use App\Services\WeatherServiceContract;
use Error;

class WeatherRepository implements WeatherRepositoryContract
{
    private WeatherServiceContract $service;

    public function __construct(WeatherServiceContract $weatherService)
    {
        $this->service = $weatherService;
    }

    public function getCurrentMoscowWeather(): array
    {
        try {
            return cache()->tags(['weather'])->remember("city|moscow", 30, function () {
                return $this->service->getCurrentMoscowWeather();
            });
        } catch (Error $e) {
            throw new Error($e->getMessage());
        }
    }
}
