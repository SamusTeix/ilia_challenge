<?php

namespace App\Repository;

use App\Entity\Rarity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Rarity>
 */
class RarityRepository extends ServiceEntityRepository
{
    public function __construct(
        private readonly ManagerRegistry $registry,
        private readonly EntityManagerInterface $entityManager
    ) {
        parent::__construct($registry, Rarity::class);
    }

    public function all(): array
    {
        return $this->findAll();
    }

    public function create(Rarity $subtype): void
    {
        $this->entityManager->persist($subtype);
        $this->entityManager->flush();
    }
}
