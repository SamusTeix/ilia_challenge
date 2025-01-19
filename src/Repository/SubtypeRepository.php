<?php

namespace App\Repository;

use App\Entity\Subtype;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Subtype>
 */
class SubtypeRepository extends ServiceEntityRepository
{
    public function __construct(
        private readonly ManagerRegistry $registry,
        private readonly EntityManagerInterface $entityManager
    ) {
        parent::__construct($registry, Subtype::class);
    }

    public function all(): array
    {
        return $this->findAll();
    }

    public function create(Subtype $subtype): void
    {
        $this->entityManager->persist($subtype);
        $this->entityManager->flush();
    }
}
