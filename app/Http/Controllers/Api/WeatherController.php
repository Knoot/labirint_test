<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeatherResource;
use App\Repositories\WeatherRepositoryContract;

class WeatherController extends Controller
{
    private WeatherRepositoryContract $repository;

    public function __construct(WeatherRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return new WeatherResource($this->repository);
    }
}
