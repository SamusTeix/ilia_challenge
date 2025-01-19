<?php

namespace App\Tests\Service;

use App\Service\Api\ApiSupertypeService;
use App\Service\SupertypeService;
use PHPUnit\Framework\TestCase;

final class SupertypeServiceTest extends TestCase
{
    private ApiSupertypeService $apiSupertypeService;
    private SupertypeService $SupertypeService;

    protected function setUp(): void
    {
        $this->apiSupertypeService = $this->createMock(ApiSupertypeService::class);
        $this->SupertypeService = new SupertypeService($this->apiSupertypeService);
    }

    public function testIndex(): void
    {
        $expectedRarities = ['Common', 'Rare', 'Ultra Rare'];
        $this->apiSupertypeService
            ->expects($this->once())
            ->method('index')
            ->willReturn($expectedRarities);

        $this->assertEquals($expectedRarities, $this->apiSupertypeService->index());
    }
}