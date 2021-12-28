<?php

namespace App\Transformers;

use Illuminate\Support\Carbon;

class WeatherTransformer
{
    public static function parse(array $weather): array
    {
        return [
            'city' => $weather['city']['name'] ?? 'err',
            'date' => $weather['date']['local'] ? (new Carbon($weather['date']['local']))->isoFormat('DD.MM') : 'err',
            'temperature' => $weather['temperature']['air']['C'] ?? 'err',
            'comfort' => $weather['temperature']['comfort']['C'] ?? 'err',
            'description' => $weather['description']['full'] ?? 'err',
        ];
    }
}
