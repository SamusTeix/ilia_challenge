<?php

namespace App\Tests\Entity;

use App\Entity\Legality;
use App\Entity\Set;
use App\Entity\Card;
use PHPUnit\Framework\TestCase;

class LegalityEntityTest extends TestCase
{
    public function testSetAndGetId()
    {
        $legality = new Legality();
        $legality->setId(1);
        $this->assertEquals(1, $legality->getId());
    }

    public function testSetAndGetType()
    {
        $legality = new Legality();
        $type = 'Standard';
        $legality->setType($type);
        $this->assertEquals($type, $legality->getType());
    }

    public function testSetAndGetValue()
    {
        $legality = new Legality();
        $value = 'Legal';
        $legality->setValue($value);
        $this->assertEquals($value, $legality->getValue());
    }

    public function testAddAndRemoveSet()
    {
        $legality = new Legality();
        $set = new Set();
        $legality->addSet($set);
        $this->assertTrue($legality->getSets()->contains($set));
        $this->assertTrue($set->getLegalities()->contains($legality));
        
        $legality->removeSet($set);
        $this->assertFalse($legality->getSets()->contains($set));
        $this->assertFalse($set->getLegalities()->contains($legality));
    }

    public function testAddAndRemoveCard()
    {
        $legality = new Legality();
        $card = new Card();
        $legality->addCard($card);
        $this->assertTrue($legality->getCards()->contains($card));
        $this->assertTrue($card->getLegalities()->contains($legality));
        
        $legality->removeCard($card);
        $this->assertFalse($legality->getCards()->contains($card));
        $this->assertFalse($card->getLegalities()->contains($legality));
    }
}
