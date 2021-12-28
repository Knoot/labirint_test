<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExchangeRatesResource;
use App\Repositories\ExchangeRatesRepositoryContract;

class ExchangeRatesController extends Controller
{
    private ExchangeRatesRepositoryContract $repository;

    public function __construct(ExchangeRatesRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return new ExchangeRatesResource($this->repository);
    }
}
