<?php

namespace App\Tests\Entity;

use App\Entity\Attack;
use App\Entity\Card;
use PHPUnit\Framework\TestCase;

class AttackEntityTest extends TestCase
{
    public function testSetNameAndGetters(): void
    {
        $attack = new Attack();
        $attack->setName('Fire Blast');

        $this->assertEquals('Fire Blast', $attack->getName());
    }

    public function testSetGetCost(): void
    {
        $attack = new Attack();
        $cost = ['R', 'R'];
        $attack->setCost($cost);

        $this->assertEquals($cost, $attack->getCost());
    }

    public function testSetGetConvertedEnergyCost(): void
    {
        $attack = new Attack();
        $attack->setConvertedEnergyCost(2);

        $this->assertEquals(2, $attack->getConvertedEnergyCost());
    }

    public function testSetGetDamage(): void
    {
        $attack = new Attack();
        $attack->setDamage('30');

        $this->assertEquals('30', $attack->getDamage());
    }

    public function testSetGetText(): void
    {
        $attack = new Attack();
        $text = 'Deal 30 damage to the Active Pokémon.';
        $attack->setText($text);

        $this->assertEquals($text, $attack->getText());
    }

    public function testAddCard(): void
    {
        $attack = new Attack();
        $card = new Card(); // Assuming Card entity has a default constructor

        $attack->addCard($card);

        $this->assertContains($card, $attack->getCards());
    }

    public function testRemoveCard(): void
    {
        $attack = new Attack();
        $card = new Card();

        $attack->addCard($card);
        $attack->removeCard($card);

        $this->assertEmpty($attack->getCards());
    }
}