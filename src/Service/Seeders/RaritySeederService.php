<?php

namespace App\Service\Seeders;

use App\Entity\Rarity;
use Doctrine\ORM\EntityManagerInterface;
use Pokemon\Pokemon;

final class RaritySeederService {
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function seed() : void
    {
        foreach(Pokemon::Rarity()->all() as $rarityName) {
            $rarity = new Rarity();
            $rarity->setName($rarityName);
            
            $this->entityManager->persist($rarity);
        }
    }
}
