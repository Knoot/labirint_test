<?php

namespace App\Http\Controllers;

use App\Repositories\ExchangeRatesRepositoryContract;
use App\Repositories\WeatherRepositoryContract;
use App\Transformers\ExchangeRatesTransformer;
use App\Transformers\WeatherTransformer;
use Error;

class HomeController extends Controller
{
    public function index(
        WeatherRepositoryContract $weatherRepository,
        ExchangeRatesRepositoryContract $exchangeRatesRepository
    ) {
        try {
            $weather =  WeatherTransformer::parse($weatherRepository->getCurrentMoscowWeather());
        } catch (Error $error) {
            $weather = ['error' => $error];
        }
        $rates = ExchangeRatesTransformer::parse($exchangeRatesRepository->getRates());

        return view('pages.home', compact('weather', 'rates'));
    }
}
