<?php

use Illuminate\Support\Facades\Route;

Route::get('/weather', 'App\Http\Controllers\Api\WeatherController@index');

Route::get('/valute', 'App\Http\Controllers\Api\ExchangeRatesController@index');
