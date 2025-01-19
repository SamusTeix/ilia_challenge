<?php

namespace App\Service;

use App\Interface\ServiceDataInterface;
use App\Repository\AbilityRepository;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final class AbilityService implements ServiceDataInterface
{
    public function __construct(
        private readonly ParameterBagInterface $params,
        private readonly RequestInterface $request,
        private readonly AbilityRepository $repository,
        private string $dataSource,
    ) {
        $this->dataSource = $params->get('env(DATA_SOURCE)');
    }

    public function index(): array
    {
        if ($this->dataSource === 'api') {
            return [];
        }


    }
}