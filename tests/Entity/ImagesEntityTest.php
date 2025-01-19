<?php

namespace App\Tests\Entity;

use App\Entity\Images;
use App\Entity\Card;
use App\Entity\Set;
use PHPUnit\Framework\TestCase;

class ImagesEntityTest extends TestCase
{
    public function testSetAndGetId()
    {
        $image = new Images();
        $image->setId(1);
        $this->assertEquals(1, $image->getId());
    }

    public function testSetAndGetSymbol()
    {
        $image = new Images();
        $symbol = 'path/to/symbol.png';
        $image->setSymbol($symbol);
        $this->assertEquals($symbol, $image->getSymbol());
    }

    public function testSetAndGetLogo()
    {
        $image = new Images();
        $logo = 'path/to/logo.png';
        $image->setLogo($logo);
        $this->assertEquals($logo, $image->getLogo());
    }

    public function testSetAndGetSmall()
    {
        $image = new Images();
        $small = 'path/to/small.png';
        $image->setSmall($small);
        $this->assertEquals($small, $image->getSmall());
    }

    public function testSetAndGetLarge()
    {
        $image = new Images();
        $large = 'path/to/large.png';
        $image->setLarge($large);
        $this->assertEquals($large, $image->getLarge());
    }

    public function testSetAndGetCardSet()
    {
        $image = new Images();
        $set = new Set();
        $image->setCardSet($set);
        $this->assertEquals($set, $image->getCardSet());
    }

    public function testSetAndGetCard()
    {
        $image = new Images();
        $card = new Card();
        $image->setCard($card);
        $this->assertEquals($card, $image->getCard());
    }
}
