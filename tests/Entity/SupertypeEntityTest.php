<?php

namespace App\Tests\Entity;

use App\Entity\Supertype;
use App\Entity\Card;
use PHPUnit\Framework\TestCase;

class SupertypeEntityTest extends TestCase
{
    public function testSetAndGetId()
    {
        $supertype = new Supertype();
        $supertype->setId(1);
        $this->assertEquals(1, $supertype->getId());
    }

    public function testSetAndGetName()
    {
        $supertype = new Supertype();
        $name = 'Supertype Name';
        $supertype->setName($name);
        $this->assertEquals($name, $supertype->getName());
    }

    public function testAddAndRemoveCard()
    {
        $supertype = new Supertype();
        $card = new Card();
        $supertype->addCards($card);
        $this->assertTrue($supertype->getCards()->contains($card));
        $this->assertSame($supertype, $card->getSupertype());

        $supertype->removeCards($card);
        $this->assertFalse($supertype->getCards()->contains($card));
        $this->assertNull($card->getSupertype());
    }
}
