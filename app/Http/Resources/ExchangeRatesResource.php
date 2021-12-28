<?php

namespace App\Http\Resources;

use App\Repositories\ExchangeRatesRepositoryContract;
use App\Transformers\ExchangeRatesTransformer;
use Error;
use Illuminate\Http\Resources\Json\JsonResource;

class ExchangeRatesResource extends JsonResource
{
    private ExchangeRatesRepositoryContract $repository;

    public function __construct(ExchangeRatesRepositoryContract $repository)
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
            return ['success' => true, 'data' => ExchangeRatesTransformer::parse($this->repository->getRates())];
        } catch (Error $e) {
            return ['success' => false, 'data' => []];
        }
    }
}
