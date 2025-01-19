<?php

namespace App\Tests\Service;

use App\Service\Api\ApiCardsService;
use App\Service\CardsService;
use PHPUnit\Framework\TestCase;

class CardsServiceTest extends TestCase
{
    private CardsService $cardsService;
    private ApiCardsService $apiCardsService;

    protected function setUp(): void
    {
        $this->apiCardsService = $this->createMock(ApiCardsService::class);
        $this->cardsService = new CardsService($this->apiCardsService);
    }

    public function testIndex(): void
    {
        $expectedData = ['card1', 'card2'];
        $this->apiCardsService
            ->expects($this->once())
            ->method('index')
            ->willReturn($expectedData);

        $this->assertEquals($expectedData, $this->cardsService->index());
    }

    public function testShow(): void
    {
        $cardId = 'ex7-1';
        $expectedCard = ['id' => $cardId, 'name' => 'Azumarill'];
        $this->apiCardsService
            ->expects($this->once())
            ->method('find')
            ->with($cardId)
            ->willReturn($expectedCard);

        $this->assertEquals($expectedCard, $this->cardsService->show($cardId));
    }
}