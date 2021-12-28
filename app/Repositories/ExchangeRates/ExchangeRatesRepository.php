<?php

namespace App\Repositories\ExchangeRates;

use App\Repositories\ExchangeRatesRepositoryContract;
use App\Services\ExchangeRatesServiceContract;
use Error;
use Illuminate\Support\Collection;

class ExchangeRatesRepository implements ExchangeRatesRepositoryContract
{
    private ExchangeRatesServiceContract $service;

    private array $valuteCodes;

    public function __construct(ExchangeRatesServiceContract $ratesService)
    {
        $this->service = $ratesService;

        $this->valuteCodes = config('exchangeRates.valuteCodes');
    }

    public function getRates(): Collection
    {
        try {
            return cache()->remember($this->getRatesCacheKey($this->valuteCodes), 600, function () {
                return $this->service->getRates($this->valuteCodes);
            });
        } catch (Error $e) {
            throw new Error($e->getMessage());
        }
    }

    private function getRatesCacheKey(array $valuteCodes): string
    {
        return "valute_codes|" . implode('|', $valuteCodes);
    }
}
