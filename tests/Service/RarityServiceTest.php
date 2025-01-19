<?php

namespace App\Tests\Service;

use App\Service\Api\ApiRarityService;
use App\Service\RarityService;
use PHPUnit\Framework\TestCase;

final class RarityServiceTest extends TestCase
{
    private RarityService $rarityService;
    private ApiRarityService $apiRarityService;

    protected function setUp(): void
    {
        $this->apiRarityService = $this->createMock(ApiRarityService::class);
        $this->rarityService = new RarityService($this->apiRarityService);
    }

    public function testIndex(): void
    {
        $expectedRarities = ['Common', 'Rare', 'Ultra Rare'];
        $this->apiRarityService
            ->expects($this->once())
            ->method('index')
            ->willReturn($expectedRarities);

        $this->assertEquals($expectedRarities, $this->apiRarityService->index());
    }
}