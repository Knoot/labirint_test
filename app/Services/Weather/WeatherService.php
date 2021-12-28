<?php

namespace App\Services\Weather;

use App\Services\WeatherServiceContract;
use Error;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class WeatherService implements WeatherServiceContract
{
    private string $baseUrl;

    private PendingRequest $request;

    public function __construct()
    {
        $this->request = Http::withHeaders([
            'X-Gismeteo-Token' => config('weather.token'),
        ]);

        $this->baseUrl = config('weather.ApiBaseUrl');
    }

    public function getCurrentMoscowWeather(): array
    {
        $city = $this->getCityByName('Москва');
        // for test only
        // $city = [
        //     'name' => 'Москва',
        //     'id' => 123,
        // ];
        if (!empty($city)) {
            // for test only
            // return [
            //     'city' => $city,
            //     'date' => ['local' => "2016-02-01 14:00:00"],
            //     'temperature' => [
            //         'air' => ['C' => 12.1],
            //         'comfort' => ['C' => 17.1],
            //     ],
            //     'description' => ['full' => 'Возможны осадки'],
            // ];
            $response = $this->request->get($this->baseUrl . "/weather/current/{$city['id']}/");
            if (!$response->ok()) {
                throw new Error('Ошибка при получении погоды в городе');
            }
            return array_merge(['city' => $city], $response->json());
        } else {
            throw new Error('Ошибка при получении города');
        }
    }

    private function getCityByName(string $cityName): array
    {
        $response = $this->request->get("{$this->baseUrl}/search/cities/", [
            'lang' => 'ru',
            'query' => $cityName,
        ]);
        return $response->ok() ? $response->json() : [];
    }
}
