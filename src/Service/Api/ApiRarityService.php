<?php

namespace App\Service\Api;

use App\Interface\ServiceDataInterface;
use Pokemon\Pokemon;
use Pokemon\Resources\Interfaces\ResourceInterface;

class ApiRarityService implements ServiceDataInterface
{
    private ResourceInterface $service;

    public function __construct()
    {
        $this->service = Pokemon::Rarity();
    }

    public function index(): array
    {
        return $this->service->all();
    }
}
