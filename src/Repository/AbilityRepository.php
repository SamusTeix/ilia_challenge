<?php

namespace App\Repository;

use App\Entity\Ability;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ability>
 */
class AbilityRepository extends ServiceEntityRepository
{
    public function __construct(
        private readonly ManagerRegistry $registry,
        private readonly EntityManagerInterface $entityManager
    ) {
        parent::__construct($registry, Ability::class);
    }

    public function all(): array
    {
        return $this->findAll();
    }

    // public function find(int $id): Ability
    // {
        
    // }

    public function getAbilityKeyList(): array
    {
        $result = $this->createQueryBuilder('a')
            ->select("CONCAT(a.name, '|', a.type) as key")
            ->getQuery()
            ->getResult();

        return $result ? array_column($result, 'key') : [];
    }

    public function create(Ability $ability): void
    {
        $this->entityManager->persist($ability);
        $this->entityManager->flush();
    }
}
