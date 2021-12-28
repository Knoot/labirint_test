<?php

namespace App\Services\ExchangeRates;

use App\Services\ExchangeRatesServiceContract;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class ExchangeRatesService implements ExchangeRatesServiceContract
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('exchangeRates.baseUrl');
    }

    public function getRates(array $valuteCodes): Collection
    {
        $xml = simplexml_load_string($this->loadRates());

        $json = json_encode($xml);

        return $this->filter(json_decode($json, true), $valuteCodes);
    }

    private function filter(array $rates, array $valuteCodes): Collection
    {
        return collect($rates['Valute'] ?? [])->whereIn('NumCode', $valuteCodes);
    }

    private function loadRates(): string
    {
        $response = Http::get($this->baseUrl . '/scripts/XML_daily.asp');
        return $response->ok() ? $response->body() : '';
    }
}
