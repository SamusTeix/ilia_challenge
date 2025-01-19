<?php

namespace App\Repository;

use App\Entity\Supertype;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Supertype>
 */
class SupertypeRepository extends ServiceEntityRepository
{
    public function __construct(
        private readonly ManagerRegistry $registry,
        private readonly EntityManagerInterface $entityManager
    ) {
        parent::__construct($registry, Supertype::class);
    }

    public function all(): array
    {
        return $this->findAll();
    }

    public function create(Supertype $supertype): void
    {
        $this->entityManager->persist($supertype);
        $this->entityManager->flush();
    }
}
