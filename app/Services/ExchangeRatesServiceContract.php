<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface ExchangeRatesServiceContract
{
    public function getRates(array $valuteCodes): Collection;
}
