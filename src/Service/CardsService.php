<?php

namespace App\Service;

use App\Interface\ServiceDataInterface;
use App\Service\Api\ApiCardsService;

class CardsService implements ServiceDataInterface
{
    public function __construct(private readonly ApiCardsService $service) {}

    public function index() : array
    {
        return $this->service->index();
    }

    public function show(string $id)
    {
        return $this->service->find($id);
    }
}