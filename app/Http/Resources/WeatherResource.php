<?php

namespace App\Http\Resources;

use App\Repositories\WeatherRepositoryContract;
use App\Transformers\WeatherTransformer;
use Error;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    private WeatherRepositoryContract $repository;

    public function __construct(WeatherRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        try {
            return [
                'success' => true,
                'data' => WeatherTransformer::parse($this->repository->getCurrentMoscowWeather())
            ];
        } catch (Error $e) {
            return ['success' => false, 'data' => []];
        }
    }
}
