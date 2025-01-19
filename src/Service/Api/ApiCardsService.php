<?php

namespace App\Service\Api;

use App\Interface\ServiceDataInterface;
use Pokemon\Pokemon;
use Pokemon\Resources\Interfaces\QueriableResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class ApiCardsService implements ServiceDataInterface
{
    private int $page;
    private int $pageSize;
    private QueriableResourceInterface $service;
    private Request $request;

    public function __construct(
        private readonly RequestStack $requestStack
    ) {
        $this->service = Pokemon::Card();
        $this->request = $requestStack->getCurrentRequest();
        $this->page = $this->request->get('page') ?? 1;
        $this->pageSize = $this->request->get('pageSize') ?? 20;
    }

    public function index(): array
    {
        $this->setWhere();

        return $this->service->page($this->page)->pageSize($this->pageSize)->all();
    }

    public function find($id)
    {
        return $this->service->find($id);
    }

    public function pagination(): array
    {
        $this->setWhere();

        return $this->service->page($this->page)->pageSize($this->pageSize)->pagination()->toArray();
    }

    private function setWhere(): void
    {   
        if($this->request->get('card_filter')) {
            foreach ($this->request->get('card_filter') as $field => $value) {
                if (! empty($value)) {
                    $fieldName = $field;
                    if (in_array($field, ['abilities', 'attacks'])) {
                        $fieldName = sprintf('%s.name', $field);
                    }

                    if (in_array($field, ['resistances'])) {
                        $fieldName = sprintf('%s.type', $field);
                    }

                    $this->service->where([$fieldName => sprintf('*%s*', $value)]);
                }
            }
        }        
    }
}
