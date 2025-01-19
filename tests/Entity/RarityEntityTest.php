<?php

namespace App\Tests\Entity;

use App\Entity\Rarity;
use PHPUnit\Framework\TestCase;

class RarityEntityTest extends TestCase
{
    public function testSetNameAndGetters(): void
    {
        $rarity = new Rarity();
        $rarity->setName('Rare');

        $this->assertEquals('Rare', $rarity->getName());
    }

    public function testAddCard(): void
    {
        $rarity = new Rarity();
        $card1 = $this->createMock(\App\Entity\Card::class);
        $card2 = $this->createMock(\App\Entity\Card::class);

        $rarity->addCard($card1);
        $rarity->addCard($card2);

        $this->assertContains($card1, $rarity->getCards());
        $this->assertContains($card2, $rarity->getCards());
    }

    public function testRemoveCard(): void
    {
        $rarity = new Rarity();
        $card1 = $this->createMock(\App\Entity\Card::class);

        $rarity->addCard($card1);
        $rarity->removeCard($card1);

        $this->assertEmpty($rarity->getCards());
    }
}
