<?php

namespace App\Repositories;

interface WeatherRepositoryContract
{
    public function getCurrentMoscowWeather(): array;
}
