<?php

namespace App\Service;

use App\Interface\ServiceDataInterface;
use App\Service\Api\ApiSupertypeService;
use App\Service\Db\DatabaseSupertypeService;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final class SupertypeService implements ServiceDataInterface
{
    public function __construct(
        private readonly ApiSupertypeService $apiService
    ){}

    public function index(): array 
    {
        return $this->apiService->index();
    }
}