<?php

namespace App\Service;

use App\Interface\ServiceDataInterface;
use App\Service\Api\ApiSubtypeService;

final class SubtypeService implements ServiceDataInterface
{
    public function __construct(
        private readonly ApiSubtypeService $apiService,
    ){}

    public function index(): array 
    {
        return $this->apiService->index();
    }
}