<?php

namespace App\Service;

use App\Interface\ServiceDataInterface;
use App\Service\Api\ApiTypeService;
use App\Service\Db\DatabaseTypeService;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final class TypeService implements ServiceDataInterface
{
    public function __construct(
        private readonly ApiTypeService $apiService,
        private readonly DatabaseTypeService $dbService,
        private readonly ParameterBagInterface $params,
    ){}

    public function index(): array 
    {
        return $this->apiService->index();
    }
}