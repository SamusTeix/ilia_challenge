<?php

namespace App\Tests\Entity;

use App\Entity\Resistance;
use App\Entity\Card;
use PHPUnit\Framework\TestCase;

class ResistanceEntityTest extends TestCase
{
    public function testSetAndGetId()
    {
        $resistance = new Resistance();
        $resistance->setId(1);
        $this->assertEquals(1, $resistance->getId());
    }

    public function testSetAndGetType()
    {
        $resistance = new Resistance();
        $type = 'Fire';
        $resistance->setType($type);
        $this->assertEquals($type, $resistance->getType());
    }

    public function testSetAndGetValue()
    {
        $resistance = new Resistance();
        $value = '-20';
        $resistance->setValue($value);
        $this->assertEquals($value, $resistance->getValue());
    }

    public function testAddAndRemoveCard()
    {
        $resistance = new Resistance();
        $card = new Card();
        $resistance->addCard($card);
        $this->assertTrue($resistance->getCards()->contains($card));
        $this->assertTrue($card->getResistances()->contains($resistance));
        
        $resistance->removeCard($card);
        $this->assertFalse($resistance->getCards()->contains($card));
        $this->assertFalse($card->getResistances()->contains($resistance));
    }
}
