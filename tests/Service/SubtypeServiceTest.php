<?php

namespace App\Tests\Service;

use App\Service\Api\ApiSubtypeService;
use App\Service\SubtypeService;
use PHPUnit\Framework\TestCase;

final class SubtypeServiceTest extends TestCase
{
    private ApiSubtypeService $apiSubtypeService;
    private SubtypeService $subtypeService;

    protected function setUp(): void
    {
        $this->apiSubtypeService = $this->createMock(ApiSubtypeService::class);
        $this->subtypeService = new SubtypeService($this->apiSubtypeService);
    }

    public function testIndex(): void
    {
        $expectedRarities = ['Common', 'Rare', 'Ultra Rare'];
        $this->apiSubtypeService
            ->expects($this->once())
            ->method('index')
            ->willReturn($expectedRarities);

        $this->assertEquals($expectedRarities, $this->apiSubtypeService->index());
    }
}