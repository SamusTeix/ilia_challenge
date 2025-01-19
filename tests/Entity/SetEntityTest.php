<?php

namespace App\Tests\Entity;

use App\Entity\Set;
use App\Entity\Legality;
use App\Entity\Images;
use App\Entity\Card;
use PHPUnit\Framework\TestCase;

class SetEntityTest extends TestCase
{
    public function testSetAndGetId()
    {
        $set = new Set();
        $set->setId(1);
        $this->assertEquals(1, $set->getId());
    }

    public function testSetAndGetTcgId()
    {
        $set = new Set();
        $tcgId = 'SET12345';
        $set->setTcgId($tcgId);
        $this->assertEquals($tcgId, $set->getTcgId());
    }

    public function testSetAndGetName()
    {
        $set = new Set();
        $name = 'Amazing Set';
        $set->setName($name);
        $this->assertEquals($name, $set->getName());
    }

    public function testSetAndGetSeries()
    {
        $set = new Set();
        $series = 'Series 1';
        $set->setSeries($series);
        $this->assertEquals($series, $set->getSeries());
    }

    public function testSetAndGetPrintedTotal()
    {
        $set = new Set();
        $printedTotal = 100;
        $set->setPrintedTotal($printedTotal);
        $this->assertEquals($printedTotal, $set->getPrintedTotal());
    }

    public function testSetAndGetTotal()
    {
        $set = new Set();
        $total = 110;
        $set->setTotal($total);
        $this->assertEquals($total, $set->getTotal());
    }

    public function testSetAndGetPtcgoCode()
    {
        $set = new Set();
        $ptcgoCode = 'PTC123';
        $set->setPtcgoCode($ptcgoCode);
        $this->assertEquals($ptcgoCode, $set->getPtcgoCode());
    }

    public function testSetAndGetReleaseDate()
    {
        $set = new Set();
        $releaseDate = new \DateTime('2025-01-01');
        $set->setReleaseDate($releaseDate);
        $this->assertEquals($releaseDate, $set->getReleaseDate());
    }

    public function testSetAndGetUpdatedAt()
    {
        $set = new Set();
        $updatedAt = new \DateTimeImmutable('2025-01-18');
        $set->setUpdatedAt($updatedAt);
        $this->assertEquals($updatedAt, $set->getUpdatedAt());
    }

    public function testSetAndGetImages()
    {
        $set = new Set();
        $images = new Images();
        $set->setImages($images);
        $this->assertEquals($images, $set->getImages());
    }

    public function testAddAndRemoveLegality()
    {
        $set = new Set();
        $legality = new Legality();
        $set->addLegality($legality);

        $this->assertTrue($set->getLegalities()->contains($legality));
        $this->assertTrue($legality->getSets()->contains($set));

        $set->removeLegality($legality);
        $this->assertFalse($set->getLegalities()->contains($legality));
        $this->assertFalse($legality->getSets()->contains($set));
    }

    public function testAddAndRemoveCard()
    {
        $set = new Set();
        $card = new Card();
        $set->addCard($card);
        $this->assertTrue($set->getCards()->contains($card));
        $this->assertTrue($card->getCardSet() === $set);

        $set->removeCard($card);
        $this->assertFalse($set->getCards()->contains($card));
        $this->assertFalse($card->getCardSet() === $set);
    }
}
