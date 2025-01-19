<?php

namespace App\Service\Db;

use App\Interface\ServiceDataInterface;
use App\Repository\SupertypeRepository;

final class DatabaseSupertypeService implements ServiceDataInterface
{
    public function __construct(private readonly SupertypeRepository $repository) {}

    public function index(): array
    {
        return $this->repository->all();
    }
}
