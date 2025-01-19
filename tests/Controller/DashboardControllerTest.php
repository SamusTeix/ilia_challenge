<?php

namespace App\Tests\Controller;

use App\Controller\DashboardController;
use App\Service\DashboardService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

class DashboardControllerTest extends WebTestCase
{
    public $service;
    public $controller;

    public function setUp(): void
    {
        $this->service = $this->createMock(DashboardService::class);
        $this->controller = new DashboardController($this->service, new RequestStack([new Request()]));
    }

    public function testIndexDataLoaded(): void
    {
        $client = static::createClient();
        $client->request('GET', '/?pageSize=2');
        
        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $this->assertSelectorCount(2, '.card.mb-3');
    }
}
