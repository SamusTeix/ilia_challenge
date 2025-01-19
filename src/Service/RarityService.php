<?php

namespace App\Service;

use App\Interface\ServiceDataInterface;
use App\Service\Api\ApiRarityService;

final class RarityService implements ServiceDataInterface
{
    public function __construct(
        private readonly ApiRarityService $apiService,
    ){}

    public function index(): array 
    {
        return $this->apiService->index();
    }
}