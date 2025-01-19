<?php

namespace App\Tests\Entity;

use App\Entity\Type;
use App\Entity\Card;
use PHPUnit\Framework\TestCase;

class TypeEntityTest extends TestCase
{
    public function testSetAndGetId()
    {
        $type = new Type();
        $type->setId(1);
        $this->assertEquals(1, $type->getId());
    }

    public function testSetAndGetName()
    {
        $type = new Type();
        $name = 'Type Name';
        $type->setName($name);
        $this->assertEquals($name, $type->getName());
    }

    public function testAddAndRemoveCard()
    {
        $type = new Type();
        $card = new Card();
        $type->addCards($card);
        $this->assertTrue($type->getCards()->contains($card));
        $this->assertTrue($card->getTypes()->contains($type));

        $type->removeCards($card);
        $this->assertFalse($type->getCards()->contains($card));
        $this->assertFalse($card->getTypes()->contains($type));
    }
}
