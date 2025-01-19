<?php

namespace App\Tests\Entity;

use App\Entity\Weakness;
use App\Entity\Card;
use PHPUnit\Framework\TestCase;

class WeaknessEntityTest extends TestCase
{
    public function testSetAndGetId()
    {
        $weakness = new Weakness();
        $weakness->setId(1);
        $this->assertEquals(1, $weakness->getId());
    }

    public function testSetAndGetType()
    {
        $weakness = new Weakness();
        $type = 'Fire';
        $weakness->setType($type);
        $this->assertEquals($type, $weakness->getType());
    }

    public function testSetAndGetValue()
    {
        $weakness = new Weakness();
        $value = '-20';
        $weakness->setValue($value);
        $this->assertEquals($value, $weakness->getValue());
    }

    public function testAddAndRemoveCard()
    {
        $weakness = new Weakness();
        $card = new Card();
        $weakness->addCard($card);
        $this->assertTrue($weakness->getCards()->contains($card));
        $this->assertTrue($card->getWeaknesses()->contains($weakness));
        
        $weakness->removeCard($card);
        $this->assertFalse($weakness->getCards()->contains($card));
        $this->assertFalse($card->getWeaknesses()->contains($weakness));
    }
}
