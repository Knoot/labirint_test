<?php

namespace App\Transformers;

use Illuminate\Support\Collection;

class ExchangeRatesTransformer
{
    public static function parse(Collection $rates): array
    {
        return $rates->map(function ($rate) {
            return [
                'charCode' => $rate['CharCode'] ?? 'err',
                'value' => $rate['Value'] ?? 'err',
                'description' => $rate['Name'] ?? 'err',
            ];
        })->toArray();
    }
}
