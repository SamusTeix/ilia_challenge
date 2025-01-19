<?php

namespace App\Tests\Entity;

use App\Entity\Subtype;
use App\Entity\Card;
use PHPUnit\Framework\TestCase;

class SubtypeEntityTest extends TestCase
{
    public function testSetAndGetId()
    {
        $subtype = new Subtype();
        $subtype->setId(1);
        $this->assertEquals(1, $subtype->getId());
    }

    public function testSetAndGetName()
    {
        $subtype = new Subtype();
        $name = 'Subtype Name';
        $subtype->setName($name);
        $this->assertEquals($name, $subtype->getName());
    }

    public function testAddAndRemoveCard()
    {
        $subtype = new Subtype();
        $card = new Card();
        $subtype->addCards($card);
        $this->assertTrue($subtype->getCards()->contains($card));
        $this->assertTrue($card->getSubtypes()->contains($subtype));
        
        $subtype->removeCards($card);
        $this->assertFalse($subtype->getCards()->contains($card));
        $this->assertFalse($card->getSubtypes()->contains($subtype));
    }
}
