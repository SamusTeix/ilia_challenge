<?php

namespace App\Service\Api;

use App\Interface\ServiceDataInterface;
use Pokemon\Pokemon;
use Pokemon\Resources\Interfaces\ResourceInterface;

final class ApiTypeService implements ServiceDataInterface
{
    private ResourceInterface $service;

    public function __construct()
    {
        $this->service = Pokemon::Type();
    }

    public function index(): array
    {
        return $this->service->all();
    }
}
