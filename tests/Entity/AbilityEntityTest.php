<?php

namespace App\Tests\Entity;

use App\Entity\Ability;
use App\Entity\Card;
use PHPUnit\Framework\TestCase;

class AbilityEntityTest extends TestCase
{
    public function testSetNameAndGetters(): void
    {
        $ability = new Ability();
        $ability->setName('Fire Blast');

        $this->assertEquals('Fire Blast', $ability->getName());
    }

    public function testAddCard(): void
    {
        $ability = new Ability();
        $card = new Card(); // Create a real Card instance

        $ability->addCard($card);

        $this->assertContains($card, $ability->getCards());
    }

    public function testRemoveCard(): void
    {
        $ability = new Ability();
        $card = new Card();

        $ability->addCard($card);
        $ability->removeCard($card);

        $this->assertEmpty($ability->getCards());
    }
}