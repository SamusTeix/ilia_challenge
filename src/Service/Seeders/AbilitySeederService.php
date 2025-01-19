<?php

namespace App\Service\Seeders;

use App\Entity\Ability;
use App\Repository\AbilityRepository;
use Pokemon\Pokemon;
use Psr\Log\LoggerInterface;

final class AbilitySeederService
{
    public function __construct(
        private readonly AbilityRepository $repository,
        private readonly LoggerInterface $logger,
    ) {}

    public function seed(): void
    {
        /** @var QueriableResourceInterface $pokemon */
        $pokemon = Pokemon::Card();

        $pageSize = 250;
        $totalCount = $pokemon->pageSize($pageSize)->pagination()->getTotalCount();
        $totalPages = ceil($totalCount / $pageSize);

        $this->logger->info(self::class . 'Iniciando seed da tabela Ability');
        $this->logger->info($totalCount . ' cards econtrados!');

        for ($page = 5; $page <= $totalPages; $page++) {
            $this->logger->info('----> Página ' . $page . ' de ' . $totalPages);

            $cards = $pokemon->page($page)->pageSize($pageSize)->all();
            $abilityList = $this->repository->getAbilityKeyList();

            foreach ($cards as $card) {
                $card = $card->toArray();

                if (empty($card['abilities'])) {
                    continue;
                }

                foreach ($card['abilities'] as $abilityData) {
                    $key = $abilityData['name'] . '|' . $abilityData['type'];

                    if (in_array($key, $abilityList)) {
                        $this->logger->info('<<<<< Habilidade já cadastrada: ' . $key);

                        continue;
                    }

                    $this->logger->info('>>>>> Nova habilidade encontrada: ' . $key);

                    $ability = new Ability();
                    $ability->setName($abilityData['name']);
                    $ability->setText($abilityData['text']);
                    $ability->setType($abilityData['type']);

                    $this->repository->create($ability);

                    $abilityList[] = $key;
                }
            }
        }
    }
}
