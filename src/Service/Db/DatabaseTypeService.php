<?php

namespace App\Service\Db;

use App\Interface\ServiceDataInterface;
use App\Repository\TypeRepository;

final class DatabaseTypeService implements ServiceDataInterface
{
    public function __construct(private readonly TypeRepository $repository) {}

    public function index(): array
    {
        return $this->repository->all();
    }
}
