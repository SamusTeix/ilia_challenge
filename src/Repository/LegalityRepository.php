<?php

namespace App\Repository;

use App\Entity\Legality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Legality>
 */
class LegalityRepository extends ServiceEntityRepository
{
    public function __construct(
        private readonly ManagerRegistry $registry,
        private readonly EntityManagerInterface $entityManager
    ) {
        parent::__construct($registry, Legality::class);
    }

    public function all(): array
    {
        return $this->findAll();
    }

    public function create(Legality $subtype): void
    {
        $this->entityManager->persist($subtype);
        $this->entityManager->flush();
    }
}
