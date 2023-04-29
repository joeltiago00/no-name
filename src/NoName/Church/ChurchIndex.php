<?php

namespace NoName\Church;

use Illuminate\Pagination\LengthAwarePaginator;
use Repositories\Church\ChurchRepository;

readonly class ChurchIndex
{
    public function __construct(private ChurchRepository $churchRepository)
    {
    }

    public function handle(array $filters): LengthAwarePaginator
    {
        return $this->churchRepository->list($filters);
    }
}
