<?php

namespace App\Service;

use App\Service\Api\ApiCardsService;

class DashboardService {
    public function __construct(private readonly ApiCardsService $apiCardsService){}

    public function index(): array
    {
        return [
            'items' => $this->apiCardsService->index(),
            'pagination' => $this->apiCardsService->pagination(),
        ];
    }
}
