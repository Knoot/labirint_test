<?php

namespace App\Services;

interface WeatherServiceContract
{
    public function getCurrentMoscowWeather(): array;
}
