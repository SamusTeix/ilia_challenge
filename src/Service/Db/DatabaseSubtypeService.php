<?php

namespace App\Service\Db;

use App\Interface\ServiceDataInterface;
use App\Repository\SubtypeRepository;

final class DatabaseSubtypeService implements ServiceDataInterface
{
    public function __construct(private readonly SubtypeRepository $repository) {}

    public function index(): array
    {
        return $this->repository->all();
    }
}
