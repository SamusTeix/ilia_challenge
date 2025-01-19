<?php

namespace App\Service\Seeders;

use App\Entity\Subtype;
use Doctrine\ORM\EntityManagerInterface;
use Pokemon\Pokemon;

final class SubtypeSeederService {
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function seed() : void
    {
        foreach(Pokemon::Subtype()->all() as $subtypesName) {
            $subtypes = new Subtype();
            $subtypes->setName($subtypesName);
            
            $this->entityManager->persist($subtypes);
        }
    }
}
