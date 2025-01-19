<?php

namespace App\Tests\Controller;

use App\Controller\CardsController;
use App\Service\CardsService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CardsControllerTest extends WebTestCase
{
    public $service;
    public $controller;

    public function setUp(): void
    {
        $this->service = $this->createMock(CardsService::class);
        $this->controller = new CardsController($this->service);
    }

    public function testShowCardFound(): void
    {
        $cardId = 'dp3-1';
        $cardData = ['id' => $cardId, 'name' => 'Ampharos'];

        $client = static::createClient();
        $client->request('GET', '/cards/'.$cardId);

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('h1', $cardData['name']);
    }

    public function testShowCardNotFound(): void
    {
        $cardId = 2;

        $client = static::createClient();
        $client->request('GET', '/cards/'.$cardId);

        $this->assertEquals(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('title', 'Redirecting to /');
    }
}
