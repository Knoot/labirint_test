<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface ExchangeRatesRepositoryContract
{
    public function getRates(): Collection;
}
