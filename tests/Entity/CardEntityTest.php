<?php

namespace App\Tests\Entity;

use App\Entity\Ability;
use App\Entity\Attack;
use App\Entity\Card;
use App\Entity\Images;
use App\Entity\Legality;
use App\Entity\Subtype;
use App\Entity\Supertype;
use App\Entity\Type;
use App\Entity\Set;
use App\Entity\Rarity;
use App\Entity\Resistance;
use App\Entity\Weakness;
use PHPUnit\Framework\TestCase;

class CardEntityTest extends TestCase
{
    public function testSetAndGetId()
    {
        $card = new Card();
        $card->setId(1);
        $this->assertEquals(1, $card->getId());
    }

    public function testSetAndGetTcgId()
    {
        $card = new Card();
        $tcgId = "TCG12345";
        $card->setTcgId($tcgId);
        $this->assertEquals($tcgId, $card->getTcgId());
    }

    public function testSetAndGetName()
    {
        $card = new Card();
        $name = "Awesome Card";
        $card->setName($name);
        $this->assertEquals($name, $card->getName());
    }

    public function testSetAndGetSupertype()
    {
        $card = new Card();
        $supertype = new Supertype();
        $card->setSupertype($supertype);
        $this->assertEquals($supertype, $card->getSupertype());
    }

    public function testAddAndRemoveSubtype()
    {
        $card = new Card();
        $subtype = new Subtype();
        $card->addSubtype($subtype);
        $this->assertTrue($card->getSubtypes()->contains($subtype));
        $card->removeSubtype($subtype);
        $this->assertFalse($card->getSubtypes()->contains($subtype));
    }

    public function testSetAndGetLevel()
    {
        $card = new Card();
        $level = "10";
        $card->setLevel($level);
        $this->assertEquals($level, $card->getLevel());
    }

    public function testSetAndGetHp()
    {
        $card = new Card();
        $hp = "100";
        $card->setHp($hp);
        $this->assertEquals($hp, $card->getHp());
    }

    public function testAddAndRemoveType()
    {
        $card = new Card();
        $type = new Type();
        $card->addType($type);
        $this->assertTrue($card->getTypes()->contains($type));
        $card->removeType($type);
        $this->assertFalse($card->getTypes()->contains($type));
    }

    public function testSetAndGetEvolvesFrom()
    {
        $card = new Card();
        $evolvesFrom = new Card();
        $card->setEvolvesFrom($evolvesFrom);
        $this->assertEquals($evolvesFrom, $card->getEvolvesFrom());
    }

    public function testAddAndRemoveAbility()
    {
        $card = new Card();
        $ability = new Ability();
        $card->addAbility($ability);
        $this->assertTrue($card->getAbilities()->contains($ability));
        $card->removeAbility($ability);
        $this->assertFalse($card->getAbilities()->contains($ability));
    }

    public function testAddAndRemoveAttack()
    {
        $card = new Card();
        $attack = new Attack();
        $card->addAttack($attack);
        $this->assertTrue($card->getAttacks()->contains($attack));
        $card->removeAttack($attack);
        $this->assertFalse($card->getAttacks()->contains($attack));
    }

    public function testAddAndRemoveWeakness()
    {
        $card = new Card();
        $weakness = new Weakness();
        $card->addWeakness($weakness);
        $this->assertTrue($card->getWeaknesses()->contains($weakness));
        $card->removeWeakness($weakness);
        $this->assertFalse($card->getWeaknesses()->contains($weakness));
    }

    public function testAddAndRemoveResistance()
    {
        $card = new Card();
        $resistance = new Resistance();
        $card->addResistance($resistance);
        $this->assertTrue($card->getResistances()->contains($resistance));
        $card->removeResistance($resistance);
        $this->assertFalse($card->getResistances()->contains($resistance));
    }

    public function testSetAndGetRetreatCost()
    {
        $card = new Card();
        $retreatCost = ['Energy 1', 'Energy 2'];
        $card->setRetreatCost($retreatCost);
        $this->assertEquals($retreatCost, $card->getRetreatCost());
    }

    public function testSetAndGetCardSet()
    {
        $card = new Card();
        $cardSet = new Set();
        $card->setCardSet($cardSet);
        $this->assertEquals($cardSet, $card->getCardSet());
    }

    public function testSetAndGetNumber()
    {
        $card = new Card();
        $number = "123";
        $card->setNumber($number);
        $this->assertEquals($number, $card->getNumber());
    }

    public function testSetAndGetArtist()
    {
        $card = new Card();
        $artist = "John Doe";
        $card->setArtist($artist);
        $this->assertEquals($artist, $card->getArtist());
    }

    public function testSetAndGetRarity()
    {
        $card = new Card();
        $rarity = new Rarity();
        $card->setRarity($rarity);
        $this->assertEquals($rarity, $card->getRarity());
    }

    public function testSetAndGetFlavorText()
    {
        $card = new Card();
        $flavorText = "This is a test flavor text.";
        $card->setFlavorText($flavorText);
        $this->assertEquals($flavorText, $card->getFlavorText());
    }

    public function testSetAndGetNationalPokedexNumbers()
    {
        $card = new Card();
        $nationalPokedexNumbers = [123, 456];
        $card->setNationalPokedexNumbers($nationalPokedexNumbers);
        $this->assertEquals($nationalPokedexNumbers, $card->getNationalPokedexNumbers());
    }

    public function testAddAndRemoveLegality()
    {
        $card = new Card();
        $legality = new Legality();
        $card->addLegality($legality);
        $this->assertTrue($card->getLegalities()->contains($legality));
        $card->removeLegality($legality);
        $this->assertFalse($card->getLegalities()->contains($legality));
    }

    public function testSetAndGetImages()
    {
        $card = new Card();
        $images = new Images();
        $card->setImages($images);
        $this->assertEquals($images, $card->getImages());
    }

    public function testManyToOneRelationship()
    {
        $card = new Card();
        $supertype = new Supertype();
        $card->setSupertype($supertype);
        $this->assertEquals($supertype, $card->getSupertype());
        $cardSet = new Set();
        $card->setCardSet($cardSet);
        $this->assertEquals($cardSet, $card->getCardSet());
        $rarity = new Rarity();
        $card->setRarity($rarity);
        $this->assertEquals($rarity, $card->getRarity());
    }
    public function testManyToManyRelationship()
    {
        $card = new Card();
        $subtype = new Subtype();
        $card->addSubtype($subtype);
        $this->assertTrue($card->getSubtypes()->contains($subtype));
        $type = new Type();
        $card->addType($type);
        $this->assertTrue($card->getTypes()->contains($type));
        $ability = new Ability();
        $card->addAbility($ability);
        $this->assertTrue($card->getAbilities()->contains($ability));
        $attack = new Attack();
        $card->addAttack($attack);
        $this->assertTrue($card->getAttacks()->contains($attack));
        $weakness = new Weakness();
        $card->addWeakness($weakness);
        $this->assertTrue($card->getWeaknesses()->contains($weakness));
        $resistance = new Resistance();
        $card->addResistance($resistance);
        $this->assertTrue($card->getResistances()->contains($resistance));
        $legality = new Legality();
        $card->addLegality($legality);
        $this->assertTrue($card->getLegalities()->contains($legality));
    }
    public function testOneToOneRelationship()
    {
        $card = new Card();
        $images = new Images();
        $card->setImages($images);
        $this->assertEquals($images, $card->getImages());
        $evolvesFrom = new Card();
        $card->setEvolvesFrom($evolvesFrom);
        $this->assertEquals($evolvesFrom, $card->getEvolvesFrom());
    }
}
